<?php 
 class dashboard extends controller{


    function get_dashboard(){
    	
    	$data = array();
    	$data['total_products'] = count($this->app->model->dashboard_model->get_total_products());
    	$data['total_order'] = count($this->app->model->dashboard_model->get_total_orders());
    	$data['completed_orders'] = count($this->app->model->dashboard_model->get_completed_orders());
    	$data['member_count'] = count($this->app->model->member_model->get_members());

    	$data['item_orders'] = $this->app->model->item_order_model->get_item_orders();
   
    	return $this->view->load('dashboard/get_dashboard',$data);
    }

 }
?>