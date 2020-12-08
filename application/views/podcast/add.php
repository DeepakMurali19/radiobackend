
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('podcast');?>">Podcast list</a> <span class="divider"></span></li>
				<li>Add Podcast</li>
			</ul>
			
			<?php echo form_open_multipart('podcast/add'); ?>
				<legend>Radio podcast</legend>
					
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<label>Title podcast</label>
								<input class="form-control" type="text" placeholder="Podcast Name" name='title' id='title'>
							</div>
							
							<div class="form-group">
							<label>Upload mp3 podcast</label>
							
							<input id="sfile" type="file" name="file">

							</div>
					</div>
					
					
				</div>
				
				<input type="submit" name="save" value="Save" class="btn btn-primary"/>
				<a href="<?php echo site_url('news');?>" class="btn">Cancel</a>

			<?php echo form_close(); ?>

			<script>
			$(document).ready(function(){
				$('#item-form').validate({
					rules:{
						name:{
							required: true,
							minlength: 4,
							remote: '<?php echo site_url("podcast/exists");?>'
						}
					},
					messages:{
						name:{
							required: "Please fill title.",
							minlength: "The length of item Name must be greater than 4",
							remote: "News title is already existed in the system"
						}
					}
				});
			});
			</script>

