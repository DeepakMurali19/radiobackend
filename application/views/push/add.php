
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('push');?>">Push List</a> <span class="divider"></span></li>
				<li>Add New Radio</li>
			</ul>
			
			<?php echo form_open_multipart('push/add'); ?>
				<legend>Send push </legend>
					
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<label>New push text</label>
								<input class="form-control" type="text" placeholder="push text" name='pushtext' id='pushtext'>
							</div>
							
							
					</div>
					
					
				</div>
				
				<input type="submit" name="save" value="Save" class="btn btn-primary"/>
				<a href="<?php echo site_url('push');?>" class="btn">Cancel</a>

			<?php echo form_close(); ?>

			<script>
			$(document).ready(function(){
				$('#item-form').validate({
					rules:{
						name:{
							required: true,
							minlength: 4,
							remote: '<?php echo site_url("push/exists");?>'
						}
					},
					messages:{
						name:{
							required: "Please fill Push text.",
							minlength: "The length of item Name must be greater than 4",
							remote: "item Name is already existed in the system"
						}
					}
				});
			});
			</script>

