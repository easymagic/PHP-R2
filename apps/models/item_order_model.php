<?php
 class item_order_model extends model{
  

   function create($post){
    return $this->db->insert('item_order',$post);
   }

   function update_transaction_id($item_order_id){
    $this->db->where(array("id"=>$item_order_id));
    $data = array();
    $data['transaction_id'] = $this->get_transaction_id($item_order_id);
    $this->app->lib->sess->transaction_id = $data['transaction_id'];//store the transaction-id to a session.
    $query = $this->db->update('item_order',$data);
   }  

   function update($post){
    $item_order_id = $this->app->lib->sess->item_order_id;
    $this->db->where(array("id"=>$item_order_id));
    $query = $this->db->update('item_order',$post);
    return 'ok';
   }

   function get_transaction_id($item_order_id){
    $r = md5($item_order_id);
    $r = substr($r, -7);
    return $r;
   }








   //function create($post){
     //return $this->db->insert('tag',$post);
   //}

   function update_manual($id,$post){
    $this->db->where(array("id"=>$id));
    $this->db->update('item_order',$post);
   }

   function delete($id){
    $this->db->where(array("id"=>$id));
    $this->db->delete('item_order');
   }   
   
   
   function get_item_orders(){
    $sql = "select * from item_order";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);
   }

   function get_item_order($id){
    //echo $code;
    $query = $this->db->get_where('item_order',array("id"=>$id));
    return $this->db->result_object($query);
   }

   



 }

?>