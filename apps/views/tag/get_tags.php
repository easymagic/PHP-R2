<style type="text/css">
	.nav-link:hover{
      background-color: #F72525;
      cursor: pointer;
	}
</style>
<?php 
 foreach ($table as $k=>$v){
?>
       <div class="col-xs-12 col-md-2 nav-link" style="padding-top: 11px; padding-bottom: 11px;" align="center">
         <a style="color: #fff;font-size: 13px;" href="<?php echo BASE_URL; ?>product/search_by_tags?tag_code=<?php echo $v->code; ?>"><?php echo $v->name; ?></a>
       </div>

<?php 
 }
?>




