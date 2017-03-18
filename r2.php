<?php 
 //r2 is back.....

 require_once "loader.php"; 


function __autoload($cls){
  $fl = "base/core/$cls.php";
  if (file_exists($fl)){
    require_once($fl);
  }
}
 


 $obj_app = new registry();

 //$stored_queries = new external_query();

 $obj_app->controller = new loader("apps/controllers",$obj_app);
 $obj_app->model = new loader("apps/models",$obj_app);
 $obj_app->plugin = new loader("plugin",$obj_app);
 $obj_app->lib = new loader("base/libs",$obj_app);
 $obj_app->core = new loader("base/core",$obj_app);
 $obj_app->rule = new loader("apps/rules",$obj_app);
 $obj_app->startup = new loader("apps/startup",$obj_app);

 //$obj_app->sql = $stored_queries;

 //get use case definition
 $use_case_domains = scandir('apps/use_cases');
 $use_case_domains = array_diff($use_case_domains, array('.','..'));

 foreach ($use_case_domains as $k=>$v){

    $obj_app->$v = new loader("apps/use_cases/$v",$obj_app);

 }


//check for command actions here...
 try {
 
		 if ($obj_app->lib->request->cmd !== _NULL_ && !empty($obj_app->lib->request->cmd)){
		  $cmd = $obj_app->lib->request->cmd;
		  if (is_array($cmd)){
		   foreach ($cmd as $k=>$v){
		     $obj_app->lib->route->exec($v,'-');
		   }
		  }else{
		   $obj_app->lib->route->exec($cmd,'-');
		  }
		 }

		 $obj_app->lib->message->error = false;

  } catch (Exception $e) {

      $obj_app->lib->message->error = true;

  	  $obj_app->lib->message->message = $e->getMessage();

  }
  

//extract the route and execute it ...

// $obj_app->startup->config->init();  //startup called here ...  

 $q = $obj_app->lib->request->__q;
 if ($q === _NULL_ || empty($q)){
  $q = DEFAULT_ROUTE;
 }

 try {
  	 echo $obj_app->lib->route->exec($q,'/');
  } catch (Exception $e) {
  	 echo $e->getMessage();
  } 


 
?>
