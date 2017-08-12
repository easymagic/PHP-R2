# PHP-R2
MVC Framework

This is an MVC framework with a simplified approach to developing web-apps/portals

Folder Structure
----------------
The main appilcation folder is "apps" which consists of 3 main folders and 1 optional
folder, these folders are:<br />
1) models <br />
2) controllers <br />
3) views <br />
4) usecases<br />

<b>models :</b> This is where basic business/app-logic is resident, when creating a model , just extend the "model"
base class as shown below:
<br />
class foo_model extends model{}
 
<br />
You can make a call to the database, but you must specify the database-connection parameters from the config.php
in the root directory. The database engine is written on top of PDO and has a very simple API for example:

$this->db->query($sql): returns and object from which you can get the recordset , if its an SQL-select query. The object returned
will have the following methods: 
1) <b>result_object():</b> Returns an array of row-objects from the query<br />
2) <b>num_rows():</b> Return the number of rows affected by the query<br />
3) <b>row_object():</b> Returns one row from the result_object() as an object.<br />
<br />
Other database functions from the db-object include:
1) insert(table_name,associative_data) : Returns the new id of the created record.<br />
2) where(associative_data) : Changes the query "where"-filter to the data specified in the "associative_data". (You can use
   this function with both update and delete to update-where or delete-where)<br />
3) update(table,associative_data) : Updates table with associative_data.<br />
4) delete(table): Deletes records from table generally or using the criteria specified by the "where()"-function defined in
   (2) above.<br />

2)<b>controllers:</b> This is where the interactions are defined between the views and the models or plugins. When creating a controller,
just extend the "controller" base class as shown below:
class foo_controller extends controller{} 
<br />
3) <b>views:</b> This is the directory where your templates or views are defined and re-used. Whatever value you assign
to the data-array before sending to the load-method of the view , will be extracted and made visible/accessible 
to that currently loaded/rendered template.

<b>Note:</b>
You can change the default route behaviour to whatever route you choose as long as you follow the
[controller]/[controller_method] convention and this behaviour can be modified from the "config.php"
file resident in the root-directory.
<br />

In addition, you can load either of model , controller , usecase, lib or plugin using the following functions available to controllers , models, usecases and libs

<br />
1) $this->load_model($model_name,[$alias]); <br />
2) $this->load_controller($controller_name,[$alias]); <br />
3) $this->load_lib($lib_name,[$alias]); <br />
4) $this->load_plugin($plugin_name,[$alias]); <br />
5) $this->load_use_case($package,$use_case_name,[$alias]); <br />

Loading either feature, will dependently inject the feature directly in the calling instance
and can be directly accessed from the calling instance. <br />

Example:
<br />
To load a model called foo_model,

<br />
$this->load_model('foo_model');

<br />
$this->foo_model->do_stuff();

<br />
Its that simple
<br />
Though a slight change to loading usecases , a usecase should be enclosed in its own directory
e.g if we have a usecase for user called user_login, it will be a class called user_login that extends
model and is enclosed in a folder called user and will be loaded like so:
<br />

$this->load_use_case('user','user_login');
<br />
$this->user_login->do_login_stuff($username,$password);


