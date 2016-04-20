<?php 
 class company_config_model extends model{

  const ID = '1';
   
    function get_rec(){
     $query = $this->db->get_where('company_config',array("id"=>self::ID));
     return $this->db->result_object($query);
    }

    function update($id,$post){
     $this->db->where(array("id"=>$id));
     $this->db->update('company_config',$post);
    }

    function get_logo(){
     $r = $this->get_rec(self::ID);
     $r = $r[0];
     return $r->company_logo;
    }


 }
?>