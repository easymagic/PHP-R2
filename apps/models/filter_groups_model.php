<?php 
 class filter_groups_model extends model{



    function table($parent_id='0'){
     $query = $this->db->get_where('filter_groups',array("parent_id"=>$parent_id));
     return $query->result_object();
    }

    function get_by_id($id=''){
     $query = $this->db->get_where('filter_groups',array("id"=>$id));
     return $query->row_object();
    }

    function get_by_parent_id($parent_id=''){
     $query = $this->db->get_where('filter_groups',array("parent_id"=>$parent_id));
     return $query->result_object();
    }

    function create($post=array()){
     $this->db->insert('filter_groups',$post);
     $this->app->lib->message->message = 'Filter group created.';
    }


    function update($id='',$post=array()){
     $this->db->where(array("id"=>$id));
     $this->db->update('filter_groups',$post);
     $this->app->lib->message->message = 'Saved';
    }

    function delete($id=''){
      $this->db->where(array("id"=>$id));
      $this->db->delete('filter_groups');
      $this->app->lib->message->message = 'Removed.';
    }



 }

?>