
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('radio');?>">Radio station List</a> <span class="divider"></span></li>
				<li>Add New Radio</li>
			</ul>
			
			<?php echo form_open_multipart('radio/add'); ?>
				<legend>Radio Information</legend>
					
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<label>Radio Name</label>
								<input class="form-control" type="text" placeholder="Item Name" name='name' id='name'>
							</div>
							
							<div class="form-group">
								<label>Category radio</label>
								<select class="form-control" name="cat_id">
								<?php
									foreach($this->category_model->get_all()->result() as $cat)
										echo "<option value='".$cat->id."'>".$cat->name."</option>";
								?>
								</select>
							</div>
							
							<div class="form-group">
								<label>Url radio stream</label>
								
								<input class="form-control" type="text" placeholder="Radio Url" name='url_radio' id='url_radio'>
							</div>
							<div class="form-group">
							<label>Upload Radio Cover</label>
							
							<input id="sfile" type="file" name="file">

							</div>
					</div>
					
					
				</div>
				
				<input type="submit" name="save" value="Save" class="btn btn-primary"/>
				<a href="<?php echo site_url('radio');?>" class="btn">Cancel</a>

			<?php echo form_close(); ?>

			<script>
			$(document).ready(function(){
				$('#item-form').validate({
					rules:{
						name:{
							required: true,
							minlength: 4,
							remote: '<?php echo site_url("radio/exists");?>'
						}
					},
					messages:{
						name:{
							required: "Please fill item Name.",
							minlength: "The length of item Name must be greater than 4",
							remote: "item Name is already existed in the system"
						}
					}
				});
			});
			</script>

