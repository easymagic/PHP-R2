<?php
 class products_model extends model{




   function create($post){
     $done_upload = false;

     if ($this->do_upload('image',$post)){
      $done_upload = true;
     }

     if ($this->do_upload('image2',$post)){
      $done_upload = true;
     }

     if ($this->do_upload('image3',$post)){
      $done_upload = true;
     }

     if ($done_upload){
       return $this->db->insert('products',$post);
     }else{
       throw new Exception("Upload at least one image before creating an item!");
     }

   }


   private function do_upload($uploader_name,&$post){
    //product_images
    $tmp = $_FILES[$uploader_name]['tmp_name'];
    $name = $_FILES[$uploader_name]['name'];
    $salt = substr(md5(time() . microtime()), -5);

    $target = $salt . $name;

    

    $done = false;

    if (move_uploaded_file($tmp, "product_images/$target")){
      $done = true;
      $post[$uploader_name] = $target;
    }

    return $done;

   }

   
   private function remove_old_and_reupload($uploader_name,$old_name,&$post){
     if (!empty($_FILES[$uploader_name]['name'])){
       
       $delete_file = "product_images/$old_name";
       @unlink($delete_file);

       $this->do_upload($uploader_name,$post);

     }
   }



   function update($id,$post){
    
    $this->remove_old_and_reupload('image',$post['image'],$post); //checks if there is an existing file to upload.
    $this->remove_old_and_reupload('image2',$post['image2'],$post); //checks if there is an existing file to upload.
    $this->remove_old_and_reupload('image3',$post['image3'],$post); //checks if there is an existing file to upload.

    $this->db->where(array("id"=>$id));
    $this->db->update('products',$post);

   }

   function delete($id){
    $query_get = $this->db->get_where('products',array("id"=>$id));
    $result = $this->db->result_object($query_get);
    $result = $result[0];
    
    $image = $result->image;
    $image2 = $result->image2;
    $image3 = $result->image3;

    @unlink("product_images/$image");
    @unlink("product_images/$image2");
    @unlink("product_images/$image3");

    $this->db->where(array("id"=>$id));
    $this->db->delete('products');
   }


   
   
   
   
   function get_products(){
   	$sql = "select * from products";
    $query = $this->db->query($sql);
    return $this->db->result_object($query);
   }

   function get_product($id){
   	//echo $code;
    $query = $this->db->get_where('products',array("id"=>$id));
    return $this->db->result_object($query);
   }


 

 }

?>