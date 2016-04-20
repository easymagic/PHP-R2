<?php
 class category_model extends model{
  

   
   

   function create($post){
     return $this->db->insert('category',$post);
   }

   function update($id,$post){
    $this->db->where(array("id"=>$id));
    $this->db->update('category',$post);
   }

   function delete($id){
    $this->db->where(array("id"=>$id));
    $this->db->delete('category');
   }
   
   function get_categories(){
    $query = $this->db->get('category');
    return $this->db->result_object($query);
   }

   function get_category($id=''){
    $query = $this->db->get_where('category',array("id"=>$id));
    return $this->db->result_object($query);
   }


   function best_sellers(){
    $sql = "select * from products  where id!='' AND FIND_IN_SET('Best Sellers', tags) limit 4";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);    
   }

   function deal(){
    $sql = "select * from products  where id!='' AND FIND_IN_SET('DEALS', tags) limit 4";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);    
   }
   
   function featured(){
     $sql = "select * from products  where id!='' AND FIND_IN_SET('FEATURED PRODUCTS', tags) limit 4";
     $query = $this->db->query($sql);
     return $this->db->result_object($query);
   }

   function new_arrival(){
   	$sql = "select * from products  where id!='' AND FIND_IN_SET('New Arrivals', tags) limit 4";
     $query = $this->db->query($sql);
     return $this->db->result_object($query);
   }

   function new_products(){
    $sql = "select * from products  where id!='' AND FIND_IN_SET('NEW PRODUCTS', tags) limit 4";
     $query = $this->db->query($sql);
     return $this->db->result_object($query);    
   }




   function get_similar_products($category){ //suggested products
    $sql = "select * from products  where category='$category' limit 4";
     $query = $this->db->query($sql);
     return $this->db->result_object($query);    
   }

   function get_detail($id=''){
    //$sql = "select * from products  where id!='' AND FIND_IN_SET('NEW PRODUCTS', tags) limit 4";
     //$query = $this->db->query($sql);
     $query = $this->db->get_where('products',array("id"=>$id));
     return $this->db->result_object($query);       	
   }


   function suggested_products($id){
     $sql = "select * from products where id!=$id limit 3";
     $query = $this->db->query($sql);
     return $this->db->result_object($query);       	
   }

   function get_product_category_id($product_id){
    $sql = "select * from products where (id=$product_id)";
    $query = $this->db->query($sql);
    $result = $this->db->result_object($query);
    
    if (count($result)){
      
      $result = $result[0];

      //print_r($result);

      return $result->category;

    }else{

      return 'null';

    }

   }


   function filter_by_tags($tag){
    $sql = "select * from products  where id!='' AND FIND_IN_SET('$tag', tags) limit 4";
     $query = $this->db->query($sql);
     return $this->db->result_object($query);    
   }


   function search($search_text=''){
    $sql = "SELECT * from products where product_name like '%$search_text%'";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);        
   }


   function get_all(){
    $query = $this->db->get('category');
    return $query->result_object();
   }

   function get_grouped_categories($parent_id='0'){
    $query = $this->db->get_where('category',array("parent"=>$parent_id));
    return $query->result_object();
   }



   function get_parent_categories(){
    return $this->get_grouped_categories('0');
   }

   function get_child_categories($parent_id=''){
     return $this->get_grouped_categories($parent_id);
   }

 

 }
?>
