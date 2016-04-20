<?php
 class payment extends controller{
  
   const ACCESS_ERROR = 'Access Restricted!';

    function choose_payment_option(){
      $data = array();
      $content = $this->view->load('payment/get_payment_option',$data);
      return $this->app->controller->home->index($content);
    }

    function is_on_domain(){
     
      if ($_SERVER['PHP_SELF'] == '/r2.php' && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
        return true;
      }else{
        return false;
      }

    }


    function get_payment_gateway(){
      if ($this->is_on_domain()){


        //application/x-www-form-urlencoded

        $cart_metta = $this->app->plugin->cart->get_count();

        //get_transaction_id($item_order_id)

        $item_order_id = $this->app->lib->sess->item_order_id;

        $transaction_id = $this->app->model->item_order_model->get_transaction_id($item_order_id);

        $this->model->gtpay_model->gtpay_tranx_id = $transaction_id;
        $this->model->gtpay_model->gtpay_tranx_amt = $cart_metta['tot_price'];
        $this->model->gtpay_model->gtpay_cust_id = $item_order_id;
        $this->model->gtpay_model->gtpay_tranx_memo = 'Payment For ' . $cart_metta['tot'] . ' - Items.';
        $this->model->gtpay_model->gtpay_tranx_noti_url = BASE_URL . 'payment/feedback';
        //$this->model->gtpay_model->gtpay_gway_name = '';
        $this->model->gtpay_model->gtpay_echo_data = 'Payment For ' . $cart_metta['tot'] . ' - Items.';
        $this->model->gtpay_model->gtpay_cust_name = $_REQUEST['full_name'];
        //$this->model->gtpay_model->gtpay_hash = '';

        //render_api
        //$this->app->plugin->cart->clear_cart();//clear the cart - basket here ....


        

        //echo $r;

        return $this->model->gtpay_model->render_api();


      }else{
        return self::ACCESS_ERROR;
      }

    }

    function get_payment_gateway_netplus(){

        if ($this->is_on_domain()){

                $cart_metta = $this->app->plugin->cart->get_count();

                //get_transaction_id($item_order_id)

                $item_order_id = $this->app->lib->sess->item_order_id;



                $transaction_id = $this->app->model->item_order_model->get_transaction_id($item_order_id);

                $item_order_object = $this->app->model->item_order_model->get_item_order($item_order_id);
                $item_order_object = $item_order_object[0];



                //get_item_order

                

                 //print_r($item_order_object);
                //return 'ok2...31';

                //print_r($this->model->gtpay_model);

                 //print_r($this->model);

                //print_r($this->model->netpluspay_model);


                $this->model->netpluspay_model->full_name = $item_order_object->full_name;

                $this->model->netpluspay_model->email = $item_order_object->email;

                //$this->model->netpluspay_model->merchant_id = '';
                //$this->model->netpluspay_model->currency_code = '';
                $this->model->netpluspay_model->narration = 'Payment For ' . $cart_metta['tot'] . ' - Items.';
                $this->model->netpluspay_model->order_id = $transaction_id;
                $this->model->netpluspay_model->total_amount = $cart_metta['tot_price'];
                //$this->model->netpluspay_model->return_url = '';


                

                //print_r($this->model->netpluspay_model);



                return $this->model->netpluspay_model->render_api();
         }else{
            return self::ACCESS_ERROR;
         }       
    }

    function handle_gtpay(){
        //print_r($_SESSION);
        //print_r($_REQUEST);


        $data = array();
        $data['error'] = true;
        $data['message'] = 'Invalid page access!';

        



        if (isset($_REQUEST['gtpay_tranx_id']) && isset($_REQUEST['gtpay_tranx_amt'])){


            $transaction_id = $_REQUEST['gtpay_tranx_id'];
            //$amount = $_REQUEST['gtpay_tranx_amt'];

            $data['transaction_id_'] = $transaction_id;
            //echo $transaction_id;

            $response = $this->model->gtpay_model->requeryTransaction($transaction_id); //4800
            //print_r($response);
            //foreach ($response as $k=>$v){
              //echo $k . '<br />';
              //echo $v;
            //}
            $payment_status = $response->ResponseCode; //MerchantReference
            $payment_response = $response->ResponseDescription;

            if ($payment_status == '00'){
             $data['error'] = false;
            }

            $data['message'] = $payment_response;


            //echo $payment_status . ',';
            //echo $payment_response . ',';
            //echo $transaction_id;

            $this->model->gtpay_model->update_payment_status($transaction_id,$payment_status,$payment_response);

           
        }

        $data['response'] = $response;

        if ($data['error']){
          $data['cls'] = 'danger';
        }else{
          $data['cls'] = 'primary';
        }

        

        //$r = $this->model->gtpay_model->requeryTransaction($transaction_id,$amount);dae521b
        //$data = $this->model->gtpay_model->requeryTransaction('fefdc9c','0'); //4800

        $v = $this->view->load('payment/feedback',$data);

        //print_r($data);

        return $this->controller->home->index($v);
    }

    function handle_netpluspay(){

        //print_r($_SESSION);
        //print_r($_REQUEST);


        $data = array();
        $data['error'] = true;
        $data['message'] = 'Invalid page access!';

        



        if (isset($_POST['bank'])){


            $transaction_id = $_REQUEST['order_id'];
            //$amount = $_REQUEST['gtpay_tranx_amt'];
            $order_id = $_REQUEST['order_id'];
            $transaction_id = $_REQUEST['transaction_id'];
            $bank = $_REQUEST['bank'];
            //requeryTransaction($order_id,$transaction_id,$bank)
            //$response = $this->model->netpluspay_model->requeryTransaction($order_id,$transaction_id,$bank); //4800
            //echo $response . 'r.';
            //print_r($response);
            //foreach ($response as $k=>$v){
              //echo $k . '<br />';
              //echo $v;
            //}
            $payment_status = $_REQUEST['code'];//$response->ResponseCode; //MerchantReference
            $payment_response = $_REQUEST['description']; //$response->ResponseDescription;

            if ($payment_status == '00'){
             $data['error'] = false;
            }

            $data['message'] = $payment_response;


            //echo $payment_status . ',';
            //echo $payment_response . ',';
            //echo $transaction_id;

            $this->model->netpluspay_model->update_payment_status($order_id,$payment_status,$payment_response,$transaction_id);
           
        }


        $data['response'] = $response;

        if ($data['error']){
          $data['cls'] = 'danger';
        }else{
          $data['cls'] = 'primary';
        }

        

        //$r = $this->model->gtpay_model->requeryTransaction($transaction_id,$amount);dae521b
        //$data = $this->model->gtpay_model->requeryTransaction('fefdc9c','0'); //4800

        $v = $this->view->load('payment/feedback',$data);

        //print_r($data);

        return $this->controller->home->index($v);

    }


    function feedback(){
        //print_r($_REQUEST);

        if (isset($_POST['gtpay_tranx_id']) && isset($_REQUEST['gtpay_tranx_amt'])){
          $_REQUEST['gway_type'] = 'gtpay';
          return $this->handle_gtpay();
        }else if (isset($_POST['bank'])){
          $_REQUEST['gway_type'] = 'netpluspay';
          return $this->handle_netpluspay();
        }
    }



 

 }

?>