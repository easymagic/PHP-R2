<?php 
 //print_r($child_categories);
 foreach ($child_categories as $k=>$v){
?>
<div class="col-xs-12 breadcrumb-category-link-container" style="padding: 0">
	<a href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $v->id; ?>"><?php echo $v->category_name; ?></a>
</div>
<?php 
 }
?>
