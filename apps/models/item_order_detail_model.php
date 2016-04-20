<?php
 class item_order_detail_model extends model{
  

   
   function batch_create_order_detail($item_order_id,$cart_data=array()){
    foreach ($cart_data as $k=>$v){
     
     $qty = $v['qty'];
     $price = $v['price'];
     $price_tot = $v['price_tot'];

     $data = array();
     $data['item_order_id'] =  $item_order_id;
     
     $data['qty'] = $qty;
     $data['price'] = $price;
     $data['price_tot'] = $price_tot;
     $data['product_id'] = $k;

     $this->db->insert('item_order_detail',$data);

    }
   }


   function create($post){
    return $this->db->insert('item_order',$post);
   }  


   function get_item_order_detail($item_order_id){
    $query = $this->db->get_where('item_order_detail',array("item_order_id"=>$item_order_id));
    return $this->db->result_object($query);
   }

   
   
   


 

 }

?>