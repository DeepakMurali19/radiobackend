<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('radio');?>">Radio List</a> <span class="divider"></span></li>
				<li>Update Radio</li>
			</ul>
		
			<?php
			$attributes = array('id' => 'item-form','enctype' => 'multipart/form-data');
			echo form_open(site_url("radio/edit/".$item->id), $attributes);
			?>
			
				<legend>Radio Information</legend>
					
				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<label>Radio Name</label>
								<input class="form-control" type="text" placeholder="Item Name" name='name' id='name'
								 value="<?php echo $item->name;?>">
							</div>
							
							<div class="form-group">
								<label>Category</label>
								<select class="form-control" name="cat_id">
								<?php
									foreach($this->category_model->get_all()->result() as $cat){
										echo "<option value='".$cat->id."'";
										if($item->cat_id == $cat->id) 
											echo " selected ";
										echo ">".$cat->name."</option>";
									}
								?>
								</select>
							</div>
							
							<div class="form-group">
								<label>Radio stream url</label>
								<input class="form-control" type="text" placeholder="Item Name" name='url_radio' id='url_radio'
								 value="<?php echo $item->radio_url;?>">
							</div>

							<div class="form-group">
							<label>Upload Radio Cover</label><br>
							<img src="<?php echo base_url('uploads/'. $item->image_file)?>" class="img-rounded" width="100" height="100"/><br>
							<input id="sfile" type="file" name="file">
							<?php $this->session->set_userdata('image', $item->image_file); ?>

							</div>
						</div>
						
				</div>
				
				<input type="submit" value="Update" class="btn btn-primary"/>
				
				<a href="<?php echo site_url('items');?>">Cancel</a>
			</form>

			<script>
				$(document).ready(function(){
					$('#item-form').validate({
						rules:{
							name:{
								required: true,
								minlength: 4,
								remote: '<?php echo site_url('radio/exists/'.$item->id);?>'
							}
						},
						messages:{
							name:{
								required: "Please fill item name.",
								minlength: "The length of item name must be greater than 4",
								remote: "item name is already existed in the system"
							}
						}
					});
				});
			</script>

