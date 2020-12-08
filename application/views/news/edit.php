<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('radio');?>">News List</a> <span class="divider"></span></li>
				<li>Update News</li>
			</ul>

			<?php
			$attributes = array('id' => 'item-form','enctype' => 'multipart/form-data');
			echo form_open(site_url("news/edit/".$item->id), $attributes);
			?>

				<legend>Radio news</legend>

				<div class="row">
					<div class="col-sm-6">
							<div class="form-group">
								<label>Title news</label>
								<input class="form-control" type="text" placeholder="News title" name='title' id='title'
								 value="<?php echo $item->title;?>">
							</div>

							<div class="form-group">
							<!--	<label>Text news</label>
								<input class="form-control" type="text" placeholder="Item Name" name='url_radio' id='url_radio'
								 value="<?php echo $item->text;?>"> -->

								<label for="comment">Text news</label>
                                <textarea class="form-control" rows="5" id="text" name="text"> <?php echo $item->text;?> </textarea>
							</div>

							<div class="form-group">
							<label>Upload Radio Cover</label><br>
							<img src="<?php echo base_url('/uploads/'.$item->image_file)?>" class="img-rounded" width="100" height="100"/><br>
							<input id="sfile" type="file" name="file">
							<?php $this->session->set_userdata('image', $item->image_file); ?>

							</div>
						</div>

				</div>

				<input type="submit" value="Update" class="btn btn-primary"/>

				<a href="<?php echo site_url('news');?>">Cancel</a>
			</form>
