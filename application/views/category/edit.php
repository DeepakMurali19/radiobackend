<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('category');?>">Category List</a> <span class="divider"></span></li>
				<li>Update category</li>
			</ul>

			<?php echo form_open_multipart('category/edit/'.$category->id); ?>
				<div class="row">
					<div class="col-sm-6">
						<legend>Category Information</legend>

						<div class="form-group">
							<label>Category Name</label>
							<input class="form-control" type="text" placeholder="Category Name" name='name' id='name' value='<?php echo $category->name;?>'>
						</div>
						<div class="form-group">
							<label>Image Cover</label>
							<img src="<?php echo base_url( 'uploads/'.$category->url_covercat)?>" class="img-rounded" width="100" height="100"/>

						</div>
						<div class="form-group">
							<label>Upload Style Cover</label>
							<input id="sfile" type="file" name="file">
							<?php $this->session->set_userdata('image', $category->url_covercat); ?>

							</div>
					</div>
				</div>


				<hr/>

				<button type="submit" class="btn btn-primary">Submit</button>
				<a href="<?php echo site_url('category');?>" class="btn">Cancel</a>
				<?php echo form_close(); ?>


			<script>
				$(document).ready(function(){
					$('#category-form').validate({
						rules:{
							name:{
								required: true,
								minlength: 4,
								remote: '<?php echo site_url('category/exists/'.$category->id);?>'
							}
						},
						messages:{
							name:{
								required: "Please fill category name.",
								minlength: "The length of category name must be greater than 4",
								remote: "Category name is already existed in the system"
							}
						}
					});
				});
			</script>
