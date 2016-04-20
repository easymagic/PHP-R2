<?php 
  
  session_start();

  require_once("config.php");

//$dbh = new PDO("mysql:host=localhost;dbname=vanbed_db","root","");

  class xconnection{
    private static $inst = null;
    private $conn;

    private $pdo_obj;

    const DRIVER = 'mysql';


    function __construct(){
      try {
        $this->pdo_obj = new PDO(self::DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME,DB_USER,DB_PASS);  
      } catch (PDOException $e) {
        throw new Exception($e->getMessage());
      }
      
    }

    static function gi(){
      if (self::$inst == null){
        self::$inst = new xconnection();
      }
      return self::$inst;
    }

    function get_connection(){
      $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Error in db-connection!');
                       //mysql_select_db(DB_NAME,$db_connection);
      return $this->conn;
    }    

    function pdo(){
      return $this->pdo_obj;
    }



  }
  

  function get_connection(){
    $db_connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Error in db-connection!');
                     //mysql_select_db(DB_NAME,$db_connection);
    return $db_connection;
  }    
  
  class loader{
    
    private $load_path = 'base';
    private $data = array();
    protected $app = null;

    //function setLoadPath()
    function __construct($load_path='',&$app){
     $this->load_path = $load_path;
     $this->app =& $app;
    }


    function __get($k){
     if (!isset($this->data[$k])){
       $file = $this->load_path . '/' . $k . '.php';
       //echo $file;
       if (file_exists($file)){
        //echo 'seen' . $file;
         
        
        require_once($file);

        //echo 'activated<br />';


         $obj = new $k($this->app);

         //echo 'created<br />';
        //if ($k == 'netpluspay_model'){
          //echo $k . $file . 'done';
        //}

         //if ($k == 'netpluspay_model'){
          //print_r($obj);
         //}
         
         $this->data[$k] = $obj;
         return $this->data[$k];
       }else{
         return 'null';
       }
     }else{
      return $this->data[$k];
     }
    }




  }



  class registry{
    
    private $data = array();


    function __set($k,$v){
      if (!isset($this->data[$k])){
       $this->data[$k] = $v;
      }
    }

    function __get($k){
      if (isset($this->data[$k])){
           return $this->data[$k];
      }else{
        return 'null';
      }
    }


  }

 


















?>