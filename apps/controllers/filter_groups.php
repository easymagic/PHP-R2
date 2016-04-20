<?php 
 class filter_groups extends controller{
 


    function create($parent_id='0'){
     $data = array();
     $data['parent_id'] = $parent_id;

     return $this->view->load('filter_groups/create',$data);
    }

    function update($id=''){
     $data = array();
     $data['data'] = $this->model->filter_groups_model->get_by_id($id);
     $data['id'] = $id;
     $data['filter_groups_id'] = $id;
     $data['me'] = $this;
     //echo 'Called...';

     return $this->view->load('filter_groups/update',$data);
    }

    function table($parent_id='0'){
      $data = array();
      $data['table'] = $this->model->filter_groups_model->table($parent_id);
      $data['parent_id'] = $parent_id;
      return $this->view->load('filter_groups/table',$data);
    }

    function create_action(){
      $this->model->filter_groups_model->create($_REQUEST);
    }

    function update_action($id=''){
      $this->model->filter_groups_model->update($id,$_REQUEST);
    }

    function delete_action($id=''){
      $this->model->filter_groups_model->delete($id);
    }


 }
?>