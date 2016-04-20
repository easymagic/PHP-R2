<style type="text/css">
	.nav-link:hover{
      background-color: #F72525;
      cursor: pointer;
	}
</style>
       <div class="col-xs-12 col-md-2 nav-link" style="padding-top: 11px; padding-bottom: 11px;" align="center">
         <a style="color: #fff;font-size: 13px;" href="<?php echo BASE_URL; ?>product/search_by_tags?tag_code=TG_HD">HOT DEALS</a>
       </div>
<?php 
 foreach ($nav as $k=>$v){
?>
       <div class="col-xs-12 col-md-2 nav-link" style="padding-top: 11px; padding-bottom: 11px;" align="center">
         <a style="color: #fff;font-size: 13px;text-transform: uppercase;" href="<?php echo BASE_URL; ?>product/search_by_tags?category_id=<?php echo $v->id; ?>"><?php echo $v->category_name; ?></a>
       </div>

<?php 
 }
?>




