
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('news');?>">News list</a> <span class="divider"></span></li>
				<li>Add News</li>
			</ul>
			
			<?php echo form_open_multipart('news/add'); ?>
				<legend>Radio news</legend>
					
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<label>Title</label>
								<input class="form-control" type="text" placeholder="Item Name" name='title' id='title'>
							</div>
							
							<!--<div class="form-group">
								<label>Category radio</label>
								<select class="form-control" name="cat_id">
								<?php
									foreach($this->category_model->get_all()->result() as $cat)
										echo "<option value='".$cat->id."'>".$cat->name."</option>";
								?>
								</select>
							</div>-->
							
							<div class="form-group">
								<!--<label>Url radio stream</label>
								
								<input class="form-control"  rows="5" type="text" placeholder="Radio Url" name='url_radio' id='url_radio'>-->
								<label for="comment">Text news</label>
                                <textarea class="form-control" rows="5" id="text" name="text"></textarea>
								
							</div>
							<div class="form-group">
							<label>Upload news image</label>
							
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
							remote: '<?php echo site_url("news/exists");?>'
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

