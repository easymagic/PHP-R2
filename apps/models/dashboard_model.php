<?php 
 class dashboard_model extends model{

     const COMPLETED = "completed";

     function get_total_products(){
      $query = $this->db->get('products');
      return $this->db->result_object($query);
     }

     function get_total_orders(){
      $query = $this->db->get('item_order');
      return $this->db->result_object($query);
     }

     function get_completed_orders(){
      $query = $this->db->get_where("item_order",array("payment_status"=>self::COMPLETED));
      return $this->db->result_object($query);
     }


 }
?>