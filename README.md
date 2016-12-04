# PHP-R2
MVC Framework

This is an MVC framework with a simplified approach to developing web-apps/portals

Folder Structure
----------------
The main appilcation folder is "apps" which consists of 3 main folders and 1 optional
folder, these folders are:
1) models <br />
2) controllers <br />
3) views <br />
4) rules (optional) <br />

1) models : This is where basic business/app-logic is resident, when creating a model , just extend the "model"
base class as shown below:

class foo_model extends model{
  
  /** 
    
    App logic goes in here to include database or any other user-defined functions.
  
  **/

}

You can make a call to the database, but you must specify the database-connection parameters from the config.php
in the root directory. The database engine is written on top of PDO and has a very simple API for example:

$this->db->query($sql): returns and object from which you can get the recordset , if its an SQL-select query. The object returned
will have the following methods: 
1) result_object(): Returns an array of row-objects from the query
2) num_rows(): Return the number of rows affected by the query
3) row_object(): Returns one row from the result_object() as an object.

Other database functions from the db-object include:
1) insert(table_name,associative_data) : Returns the new id of the created record.
2) where(associative_data) : Changes the query "where"-filter to the data specified in the "associative_data". (You can use
   this function with both update and delete to update-where or delete-where)
3) update(table,associative_data) : Updates table with associative_data.
4) delete(table): Deletes records from table generally or using the criteria specified by the "where()"-function defined in
   (2) above.

2) controllers: This is where the interactions are defined between the views and the models or plugins. When creating a controller,
just extend the "controller" base class as shown below:

class foo_controller extends controller{ 
 /** 
   
   Its advisable to use naming conventions when defining your models or controller in order to
   prevent class name collisions. For example if you have a "user_model" as model , then the controller
   should be just "user" or "user_ctrl".
   
   The first method to be called by default in the controller is the index-function.
  
 **/ 
  
  function index(){
    $data = array();
    $data['a'] = 'some data';
    return $this->view->load('home/views',$data); 
    /** 
     always return what you are rendering to the screen do not echo, the framework renders to the browser
     based on returns from the controller
     the view->load helps to load user-defined views from the views directory , which is illustrated in
     the view definition given below
    **/
  }
  
  function some_function(){
    $data = array();
    $data['var'] = 'some data';
    return $this->view->load('views/view_file',$data);
    
  }
 
 
}

3) views: This is the directory where your templates or views are defined and re-used. Whatever value you assign
to the data-array before sending to the load-method of the view , will be extracted and made visible/accessible 
to that currently loaded/rendered template.


N.B:
---
You can change the default route behaviour to whatever route you choose as long as you follow the
[controller]/[controller_method] convention and this behaviour can be modified from the "config.php"
file resident in the root-directory.


