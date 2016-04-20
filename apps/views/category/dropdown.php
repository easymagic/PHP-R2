<option value="0">--No Parent---</option>
<?php 
 foreach ($dropdown as $k=>$v){
?>
 <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
<?php 
 }
?>