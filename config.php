<?php 

  if ($_SERVER['HTTP_HOST'] == 'localhost') {

      $database_hostname = "localhost";
      $database_username = "root";
      $database_password = "";
      $database_name = "vanbed_db";


  }else {

      $database_hostname = "localhost";
      $database_username = "vanbed_db";
      $database_password = "kN?4m!R**Fdx";
      $database_name = "vanbed";

  }


  define('DB_HOST',$database_hostname);
  define('DB_NAME',$database_name);
  define('DB_USER',$database_username);
  define('DB_PASS',$database_password);


  define('DEFAULT_ROUTE', 'home/index');
  define('NOT_FOUND', '<h2>404 Not Found</h2>');
  define('CONTROLLER_MISSING','<h3>Controller not found</h3>');
  define('METHOD_MISSING', ''); //<h3>Method not found</h3>
  define('_NULL_', '');

  define('STATUS_PENDING', 'pending');

  //define('');



 //$serverUrl ='http://'.$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '/';
 //$localUrl = 'http://localhost/vanbed/';
 
 //print_r($_SERVER);

//if ($_SERVER['HTTP_HOST'] == 'localhost') {
 //define('BASE_URL', $localUrl);
//}else {
 //define('BASE_URL', $serverUrl);
//}

define('BASE_URL', 'http://www.vanbedng.com/');

define('ABSOLUTE_URL', BASE_URL);

//echo ABSOLUTE_URL;

define('ON', 'on');
define('OFF', 'off');

define('_TRUE_', 'true');
define('_FALSE_', 'false');



//echo BASE_URL;
 
?>