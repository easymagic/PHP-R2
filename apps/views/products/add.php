<style type="text/css">
	.media-box{
		margin-bottom: 33px;
	}

	#img-preview{
		width: 128px;
		height: 128px;
		margin-top: 6px;
	}

</style>
<section class="content">
	

<form method="post" enctype="multipart/form-data">
<div class="panel panel-primary">
	<div class="panel-heading">
		<b>Create Product</b>
		<a href="<?php echo BASE_URL; ?>admin/panel/products/manage_products" class="pull-right" style="color:white;">Back</a>
	</div>
	<div class="panel-body">
		<div class="col-xs-12">
			
			<div class="col-xs-12">
				<label>Product Name</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="product_name" />
			</div>


			<div class="col-xs-12">
				<label>Category</label>
			</div>
			<div class="col-xs-12 col-md-5">
			  <select class="form-control" name="category" id="category">
			     <option value="">--Select--</option>
			     <?php 
                  foreach ($categories as $k=>$v){
			     ?>
                  <option value="<?php echo $v->id; ?>"><?php echo $v->category_name; ?></option>
			     <?php 
                  }
			     ?>				  	
			  </select>
			</div>

			<script type="text/javascript">
				(function($){
					$(function(){
                       

                       $('#category').on('change',function(){
                          var vl = $(this).val();
                          $.ajax({
                          	url:'<?php echo BASE_URL; ?>category/ajax_dropdown/' + vl,
                          	success:function(dt){
                          		$('#sub-category').html(dt);
                          	}
                          });

                       });


					});
				})(jQuery);
			</script>

			<div class="col-xs-12">
				<label>Sub-Category</label>
			</div>
			<div class="col-xs-12 col-md-5">
			  <select class="form-control" name="sub_category" id="sub-category">
			  </select>
			</div>


			<div class="col-xs-12">
				<label>Product Price</label>
			</div>
			<div class="col-xs-12 col-md-5">
				<input class="form-control" name="product_price" />
			</div>


			<div class="col-xs-12">
				<label>Discount Price</label>
			</div>
			<div class="col-xs-12 col-md-5">
				<input class="form-control" name="discount_price" />
			</div>



			<div class="col-xs-12">
				<label>Product Detail</label>
			</div>
			<div class="col-xs-12">
			   <textarea id="product_detail" name="product_detail" class="form-control" style="min-height: 200px;"></textarea>
			</div>

			<script type="text/javascript">
				CKEDITOR.replace('product_detail');
			</script>


			<div class="col-xs-12">
				<label>Product Qty</label>
			</div>
			<div class="col-xs-12 col-md-5">
				<input class="form-control" name="product_quantity" />
			</div>


           <!-- Color and Size attributes start//-->

<!-- 			<div class="col-xs-12">
				<label>Product Color</label>
			</div>
			<div class="col-xs-12 col-md-5">
				<input class="form-control" name="color" />
			</div>
 -->


			<div class="col-xs-12">
				<label>Dial Type</label>
			</div>
			<div class="col-xs-12 col-md-5">

				<select name="dial_type" class="form-control">
					<option value="null">Dial Types</option>
					<?php 
                     foreach ($dial_types as $k1=>$v1){
					?>
                     <option value="<?php echo $v1->id; ?>"><?php echo $v1->filter_name; ?></option>
					<?php 
                     }
					?>
				</select>

			</div>

			<div class="col-xs-12">
				<label>Strap Type</label>
			</div>
			<div class="col-xs-12 col-md-5">
				
				<select name="strap_type" class="form-control">
					<option value="null">Strap Types</option>
					<?php 
                     foreach ($strap_types as $k1=>$v1){
					?>
                     <option value="<?php echo $v1->id; ?>"><?php echo $v1->filter_name; ?></option>
					<?php 
                     }
					?>
				</select>

			</div>

			<div class="col-xs-12">
				<label>Dial Color</label>
			</div>
			<div class="col-xs-12 col-md-5">
				
				<select name="dial_color" class="form-control">
					<option value="null">Dial Colors</option>
					<?php 
                     foreach ($dial_colors as $k1=>$v1){
					?>
                     <option value="<?php echo $v1->id; ?>"><?php echo $v1->filter_name; ?></option>
					<?php 
                     }
					?>
				</select>

			</div>

			<div class="col-xs-12">
				<label>Strap Color</label>
			</div>
			<div class="col-xs-12 col-md-5">

				<select name="strap_color" class="form-control">
					<option value="null">Strap Colors</option>
					<?php 
                     foreach ($strap_colors as $k1=>$v1){
					?>
                     <option value="<?php echo $v1->id; ?>"><?php echo $v1->filter_name; ?></option>
					<?php 
                     }
					?>
				</select>

			</div>




			<div class="col-xs-12">
				<label>Product Size</label>
			</div>
			<div class="col-xs-12 col-md-5">
				<input class="form-control" name="size" />
			</div>


           <!-- Color and Size attributes stop//-->


			<div class="col-xs-12">
				<label>Tags</label>
			</div>
			<div class="col-xs-12">
			  <div class="col-xs-6">
			  	<input id="tags_" class="form-control" name="tags"  value="<?php echo $v->tags; ?>"/>
			  </div>
			  <div class="col-xs-6">
			  	<select class="form-control" id="tag">
			  		<option>--select tag---</option>
			  		<?php foreach ($tags as $k2=>$v2){?>
                     <option value="<?php echo $v2->code; ?>"><?php echo $v2->name; ?></option>
			  		<?php } ?>

			  	</select>

			  	<script type="text/javascript">
			  		(function($){
			  			$(function(){

                       $('#tag').on('change',function(){
                         
                          var r = $(this).val();
                          var rr = $('#tags_').val();
                          rr = rr.split(r).join('') + ',' + r;

                          rr = rr.split(',');
                          var t = [];
                          $.each(rr,function(k,v){
                          	if (v.length > 0){
                              t.push(v);
                          	}
                          });

                          $('#tags_').val(t.join(','));

                       });

			  			});
			  		})(jQuery);
			  	</script>

			  </div>



				<!--<input class="form-control" name="tags" />//-->
			</div>


			<div class="col-xs-12">
				<label>Image</label>
			</div>
			<div class="col-xs-12 img-group">
			<input type="file" name="image" />
			<!--
			  <select class="form-control" id="img-picker" name="image">
			  	<?php 
                 foreach ($images as $k=>$v){
			  	?>
                  <option value="<?php echo $v['value']; ?>"><?php echo $v['label']; ?></option>
			  	<?php 
                 }
			  	?>			  	
			  </select>
			  <div style="width: 128px;height: 128px;">
			    <div class="col-xs-12" id="img-preview"></div>
			  </div>
			  //-->
			</div>


			<div class="col-xs-12">
				<label>Image - 2</label>
			</div>
			<div class="col-xs-12 img-group">
			 <input type="file" name="image2" />
			</div>


			<div class="col-xs-12">
				<label>Image - 3</label>
			</div>
			<div class="col-xs-12 img-group">
			 <input type="file" name="image3" />
			</div>



			<div class="col-xs-12">
				<label>Brand</label>
			</div>
			<div class="col-xs-12">
			    <select class="form-control" name="brand">
			     <?php 
                  foreach ($brands as $k=>$v){
			     ?>
                  <option value="<?php echo $v->id; ?>"><?php echo $v->brand_name; ?></option>
			     <?php 
                  }
			     ?>	
			    </select>
			</div>


            <!--
			<div class="col-xs-12">
				<label>Color</label>
			</div>
			<div class="col-xs-12">
				<input class="form-control" name="color" />
			</div>
			//-->




		</div>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button class="btn btn-success" type="submit">Create</button>
		    <input name="cmd" value="products-create"  type="hidden" />
			
		</div>
	</div>
</div>
</form>



</section>




<div style="clear: both;"></div>


<script type="text/javascript">
	(function($){
		$(function(){
			$('.img-group').each(function(){

				var $obj = $(this).find('#img-preview');

				$(this).find('#img-picker').on('change',function(){
				  $obj.html('loading ... ');	
                  var img_obj = new Image();
                      img_obj.onload = function(){
                        $obj.html('<img src="' + this.src + '" style="mmax-width:100%;max-height:100%;" />');
                      };
                      img_obj.src = "<?php echo BASE_URL; ?>/product_images/" + $(this).val();

				});

				$(this).find('#img-picker').trigger('change');

				



			});
		});
	})(jQuery);
</script>