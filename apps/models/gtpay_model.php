<?php 
 class gtpay_model extends model{

  /*
       Your configuration details are provided below :
       1.    Your Interswitch WebPAY Merchant ID is :  GTB260228469110

       2.    Your GTPay assigned Merchant ID is     :  4870

       3.    You are to post all transaction requests to URL: https://ibank.gtbank.com/GTPay/Tranx.aspx:

       4.    You may check status of your transactions at the URL: https://ibank.gtbank.com/GTPay/Login.aspx:

       You are required to perform SHA 512 hash of 
       [gtpay_mert_id,gtpay_tranx_id,gtpay_tranx_amt,gtpay_tranx_curr,gtpay_cust_id,gtpay_tranx_noti_url,hash]

  */



   const MERCHANT_ID = '4870';

   const WEBPAY_MERCHANT_ID = 'GTB260228469110';

   const GATEWAY_URL = 'https://ibank.gtbank.com/GTPay/Tranx.aspx';  

   const GATEWAY_TRANX_CHECK_URL = 'https://ibank.gtbank.com/GTPayService/gettransactionstatus.xml?';//'https://www.ibank.gtbank.com/GTPayService/gettransactionstatus.json';
   //https://ibank.gtbank.com/GTPay/Login.aspx';
   //https://ibank.gtbank.com/GTPayService/gettransactionstatus.xml?
   //https://ibank.gtbank.com/GTPayService/gettransactionstatus.xml

   const CURRENCY_CODE_NAIRA =   '566'; //'null'; //'566';

   const CURRENCY_CODE_DOLLAR = '840';
   
   const HASH_KEY = 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F';



   private $data = array();

   function __construct(&$app){
    parent::__construct($app);
   	$this->init_config();
   }



   function __set($k,$v){
   	if ($k == 'gtpay_tranx_amt'){
     $this->data[$k] = $v * 100;
     //parent::__set($k,$v * 100); 
   	}else{
     //parent::__set($k,$v); 
     $this->data[$k] = $v;
   	}
    
   }

   function __get($k){
    //return parent::__get($k);
    if (isset($this->data[$k])){
      return $this->data[$k];
    }else{
      return 'null';	
    }
   }


   function __isset($k){
    return isset($this->data[$k]);
   }

   function get_config(){
   	$r = array();
   	foreach ($this->data as $k=>$v){
      $r[] = '<input type="hidden" name="' . $k . '" value="' . $v . '" />';
   	}
   	return implode('', $r);
   }

   function render_api(){
   
   	$this->gtpay_hash = $this->get_computed_hash();
   	$r = '<form id="gtpay-id" name="submit2gtpay_form" action="' . self::GATEWAY_URL . '" target="_self" method="post">';
    $r.= $this->get_config();
   	$r.= '</form>';

   	return $r;

   }



   function init_config(){
    
    $this->gtpay_tranx_curr = self::CURRENCY_CODE_NAIRA;
    $this->gtpay_mert_id = self::MERCHANT_ID;

    //gtpay_tranx_id
    //gtpay_tranx_amt
    //gtpay_cust_id
    //gtpay_tranx_memo
    //gtpay_tranx_noti_url
    //gtpay_gway_name***
    //gtpay_echo_data
    //gtpay_cust_name
    //gtpay_hash
   }

   function get_computed_hash(){
   	//gtpay_mert_id,gtpay_tranx_id,gtpay_tranx_amt,gtpay_tranx_curr,gtpay_cust_id,gtpay_tranx_noti_url,hash
   	
   	//$r = '';
   	$r = $this->gtpay_mert_id;
   	$r.= $this->gtpay_tranx_id;
   	$r.= $this->gtpay_tranx_amt;
   	$r.= $this->gtpay_tranx_curr;
   	$r.= $this->gtpay_cust_id;
   	$r.= $this->gtpay_tranx_noti_url;
   	$r.= self::HASH_KEY;

    //echo $r;

    $r = trim($r);

    

   	$hsh = hash('sha512', $r);

    //echo $r;
    
    return $hsh;

   }





    function compute_hash_for_requery($transaction_id){
    	//mertid + tranxid + hashkey
    	$r = self::MERCHANT_ID . $transaction_id . self::HASH_KEY;
    	$hsh = hash('SHA512', $r);

    	return $hsh;
    }


    function requeryTransaction($transaction_id){
     
     $data = array();	

     $row = $this->get_transaction_row($transaction_id);

     //print_r($row);
     
     $data['mertid'] = self::MERCHANT_ID;
     $data['amount'] = 100 * $row->grand_total;
     $data['tranxid']  = $transaction_id;

     //$data['currency'] = 

     $data['hash'] = $this->compute_hash_for_requery($transaction_id);

     //$data['url'] = self::GATEWAY_TRANX_CHECK_URL;
     //gtpay_mert_id,gtpay_tranx_id,gtpay_tranx_amt,gtpay_tranx_curr,gtpay_cust_id,gtpay_tranx_noti_url,hash
     $t = array();

     foreach ($data as $k=>$v){
       $t[] = "$k=$v";
     }

    $url = self::GATEWAY_TRANX_CHECK_URL . implode('&', $t);
     //echo $url;



     $response = simplexml_load_file($url);
     //$data['response'] = $response;

     return $response;
    }

    function get_transaction_row($transaction_id){
      $query = $this->db->get_where('item_order',array("transaction_id"=>$transaction_id));
      $result = $this->db->result_object($query);
      $result = $result[0];
      return $result;
    }

    function update_payment_status($transaction_id,$payment_status,$payment_response){
      //
      
      $post = $_REQUEST;
      
      $post['payment_response'] = $payment_response;
      $post['payment_status'] = $payment_status;

      $post['member_id'] = $this->app->lib->auth->id;

      //print_r($this->db);

      $this->db->where(array("transaction_id"=>$transaction_id));
      $this->db->update('item_order',$post);

      $this->check_success($transaction_id,$payment_status,$payment_response);

    }




    function check_success($transaction_id,$payment_status,$payment_response){
            
         $obj = $this->get_transaction_row($transaction_id);   

            if ($payment_status == '00'){
               //send mail;
              if ($_REQUEST['gtpay_tranx_amt'] != $obj->grand_total){
                return;
              }
              

              //log to saddle from here ... 
              /*

     $this->app->plugin->httprequest->url = 'http://goole.com'; // 'http://goole.com';
     $this->app->plugin->httprequest->set_data(array("debug"=>"on"));
     return $this->app->plugin->httprequest->post();

     $this->app->plugin->httprequest->enable_payload();
     $this->app->plugin->httprequest->url = 'http://www.vanbedng.com/category/recieve_payload'; // 'http://goole.com';
     $this->app->plugin->httprequest->set_data(array("debug"=>"on","fname"=>"AKL"));
     return $this->app->plugin->httprequest->post();    


              */

             //get that particular record
             $query = $this->db->get_where('item_order',array("transaction_id"=>$transaction_id)); 

             $data = $query->row_object();

             //echo $transaction_id;

             $this->app->lib->sess->success_detail = get_object_vars($data);



              $post_data = array();
              
              $post_data['client_id'] = 'vanbedng';
              $post_data['courier_id'] = 'ksixga9'; //fedex
              $post_data['pickup_address'] = '';
              $post_data['pickup_location'] = '';
              $post_data['pickup_contactname'] = '';
              $post_data['pickup_contactnumber'] = '';
              $post_data['pickup_contactemail'] = '';
              $post_data['delivery_address'] = $data->delivery_address1 . ' , ' . $data->delivery_address2;
              $post_data['delivery_location'] = '';
              $post_data['delivery_contactname'] = $data->full_name;
              $post_data['delivery_contactnumber'] = $data->phone;
              $post_data['delivery_contactemail'] = $data->email;
              $post_data['item_name'] = '';
              $post_data['item_size'] = '';
              $post_data['item_color'] = '';
              $post_data['item_cost'] = $data->grand_total;
              $post_data['item_quantity'] = $data->total_qty;
              $post_data['image_location'] = '';
              $post_data['fragile'] = '0';
              $post_data['perishable'] = '0';
              $post_data['POD'] = '0';
              $post_data['delivery_cost'] = '0';
              $post_data['status'] = '0';
              $post_data['transaction_id'] = $data->transaction_id;
              $post_data['transaction_time'] = date('Y-m-d h:i:s');


              $this->app->plugin->httprequest->enable_payload();
              $this->app->plugin->httprequest->url = 'http://webmallnglab.com/courier_service/v1/delivery';//http://saddleng.com/v1/delivery';
              $this->app->plugin->httprequest->set_data($post_data);
              //print_r($post_data);
              ob_start();
              $rt = $this->app->plugin->httprequest->post();
              ob_end_clean();

               //$to = 

              $query = $this->db->get_where('item_order',array("transaction_id"=>$transaction_id));

              if ($this->db->num_rows($query) > 0){
               $result = $this->db->result_object($query);
               
               //print_r($result);

               $result = $result[0];

               $email = $result->email;
               $full_name = $result->full_name;
               $grand_total = $result->grand_total;
               $total_qty = $result->total_qty;

               

               //echo $to;

               //echo $transaction_id;

               $this->app->plugin->cart->clear_cart(); //clear the cart after success



               $from = 'info@vanbedng.com ';
               $to = $email . ',' . $from;

               $subject = 'PAYMENT SUCCESS AT VANBEDNG.COM';
               $msg = '<b>Congratulations ' . $full_name . '</b>,<br />
                 <p align="justify">
                  You have just made a successful transaction at vanbedng.com <br />
                  with transaction-ID (#<b>' . $transaction_id . '</b>) and amount <b>=N= ' . $grand_total  . '</b><br />
                  of <b>' . $total_qty . '</b> items. <br />
                 </p>

                 <div align="right">Thank You for choosing vanbedng.</div>


                 ';

                 $this->app->lib->vmail->to = $to;
                 $this->app->lib->vmail->subject = $subject;
                 $this->app->lib->vmail->msg = $msg;
                 $this->app->lib->vmail->from = $from;

                 $this->app->lib->vmail->send();
              }

            }else{

               //get that particular record
             $query = $this->db->get_where('item_order',array("transaction_id"=>$transaction_id)); 

             $data = $query->row_object();

             //echo $transaction_id;

             $this->app->lib->sess->success_detail = get_object_vars($data);

              
            }

    }





/*

[2/22/2016 2:01:34 AM] Mayowa Anibaba:   $url = 'https://ibank.gtbank.com/GTPayService/gettransactionstatus.xml?mertid='.$gtb->gtpay_id.'&amount=' . $post_data->gtpay_tranx_amt . '&tranxid=' . $_REQUEST['gtpay_tranx_id'] . '&hash=' . $hash;
    $sxml = simplexml_load_file($url);
[2/22/2016 2:02:01 AM] Mayowa Anibaba:       $hash_to_be_shaed = $this->gtpay_id.$data['trans_id'] . $hash_key;
            return hash('sha512', $hash_to_be_shaed);

*/
   




 }

?>