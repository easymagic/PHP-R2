<?php
 class tag_controller extends controller{
  
 

    function get_tags(){
     $data = array(); 
     
     $data['table'] = $this->app->model->tag_model->get_tags();

     return $this->view->load('tag/get_tags',$data);
    }

    function get_home_page_tags(){
    	$data = array();
    	$tag_table = $this->app->model->tag_model->get_tags();
    	$data['tags'] = '';
    	
        $allowed = array('4');

    	foreach ($tag_table as $k=>$v){
            if (in_array($v->id, $allowed)){
              $data['tags'].= $this->app->controller->product->filter_by_tags($v->code,$v->name);
            }
    	}

    	return $this->view->load('tag/home_page_tags',$data);
    }

 

 }


/*

     echo app()->controller->product->filter_by_tags('FEATURED PRODUCTS','FEATURED PRODUCTS'); //tag,title


     //new
     //echo app()->controller->product_controller->new_products();
     echo app()->controller->product->filter_by_tags('NEW PRODUCTS','NEW PRODUCTS'); //tag,title

     //deals
     //echo app()->controller->product_controller->deal();
     echo app()->controller->product->filter_by_tags('DEALS','DEALS'); //tag,title

     
     //new_arrivals
     //new_arrival
     //echo app()->controller->product_controller->new_arrival();
     echo app()->controller->product->filter_by_tags('New Arrivals','NEW ARRIVALS'); //tag,title



     //best_sellers
     //echo app()->controller->product_controller->best_sellers();
     echo app()->controller->product->filter_by_tags('Best Sellers','BEST SELLERS'); //tag,title



*/
?>