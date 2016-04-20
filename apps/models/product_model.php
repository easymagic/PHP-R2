<?php
 class product_model extends model{
  

   
   
   
   function get_products(){
    $query = $this->db->get('products');
    return $this->db->result($query);
   }

   function get_indexed_products(){
    $query = $this->db->get('products');
    $r = $this->db->result_object($query);
    $rr = array();
    foreach ($r as $k=>$v){
      $rr[$v->id] = $v;
    }
    return $rr;
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
    //echo $sql;
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
    $sql = "select * from products  where id!='' AND FIND_IN_SET('$tag', tags)"; //limit 4
     $query = $this->db->query($sql);
     return $this->db->result_object($query);    
   }


   function search($search_text='',$filters=array()){
    
    //$category_id=_NULL_,$brand_id=_NULL_
    //
    //category_id (category)
    //brand_id (brand)

    $crit = array();

    $rr = explode('-', $search_text);
    $rr = implode('_sep_', $rr);

    $rr = explode(' ', $rr);
    $rr = implode('_sep_', $rr);

    $rr = explode('+', $rr);
    $rr = implode('_sep_', $rr);

    $rr = explode('_sep_', $rr);
    
    $rt = array();
    foreach ($rr as $k=>$v){
      if (!empty($v) && strlen($v) >= 2){ // && strlen($v) >= 4
       $rt[] = "product_name like '%$v%'";  
       $rt[] = "color like '%$v%'";  
       $rt[] = "size like '%$v%'";  

       
       //FIND_IN_SET('$tag', tags)
      }
    }

    $rt[] = "tags like '%$search_text%'";  

    //$rt[] = "FIND_IN_SET('$search_text', tags)"; // size like '%$v%'";  


    $category_id = $this->app->lib->request->category_id;
    $brand_id = $this->app->lib->request->brand_id;

    $tag_code = $this->app->lib->request->tag_code;

    //echo $brand_id;




   $skip_default_action = 0;

    if (!empty($category_id)){
     $skip_default_action = 1;     
    }

    if (!empty($brand_id)){
     $skip_default_action = 1;
    }

    if (!empty($tag_code)){
     $skip_default_action = 1;
    }


    
      //echo $skip_default_action;
        if ($search_text == 'all'){
          if ($skip_default_action !== 1){
           $rt[] = "product_name like '%%'";  
          }
        }

    


    $crit[] = '(' . implode(' or ', $rt) . ')';




    


    //echo $tag_code;

    if (!empty($category_id)){
     $crit[] = "category = '$category_id'";  
    }

    if (!empty($brand_id)){
     $crit[] = "brand = '$brand_id'";  
    }

    if (!empty($tag_code)){
     //$crit[] = " FIND_IN_SET('$tag_code', tags) ";
    }



    ///check for filters here
    //$_SESSION['dial_type']
    //$_SESSION['strap_type']
    //$_SESSION['dial_color']
    //$_SESSION['strap_color']
    
    if ($filters['dial_type'] != 'null'){
      $crit[] = "dial_type = '{$filters['dial_type']}'";
    }

    if ($filters['strap_type'] != 'null'){
      $crit[] = "strap_type = '{$filters['strap_type']}'";
    }

    if ($filters['dial_color'] != 'null'){
      $crit[] = "dial_color = '{$filters['dial_color']}'";
    }

    if ($filters['strap_color'] != 'null'){
      $crit[] = "strap_color = '{$filters['strap_color']}'";
    }



    $where = implode(' and ', $crit);

    $sql = "SELECT * from products where ($where)";

    //echo $sql;
    $query = $this->db->query($sql);
    return $this->db->result_object($query);        

   }



   function get_product($id){
    $query = $this->db->get_where("products",array("id"=>$id));
    return $this->db->result_object($query);
   }


   function get_cart_products(){
    $list = implode(',', $this->app->plugin->cart->get_product_ids());
    $sql = "select * from products where (id in ($list))";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);
   }

   function get_order_detail_products($order_id){
    $sql = "select * from products,item_order_detail where 
                                      (products.id=item_order_detail.product_id and
                                       item_order_detail.item_order_id='$order_id')";
   
    $query = $this->db->query($sql);
    return $this->db->result_object($query);
   }





 

 }

?>