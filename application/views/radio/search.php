
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('radio');?>">Radio list</a> <span class="divider"></span></li>
				<li>Search Result</li>
			</ul>
			
			<div class='row'>
				<div class='col-sm-9'>
					<?php
					$attributes = array('class' => 'form-inline');
					echo form_open(site_url('radio/search'), $attributes);
					?>
						<div class="form-group">
					   	<input type="text" name="searchterm" class="form-control" placeholder="Search"
					   		value="<?php echo $searchterm;?>">
					  	</div>
					  	<div class="form-group">
					  		<select class="form-control" name="cat_id">
					  		<?php
					  			foreach($this->category_model->get_all()->result() as $cat){
					  				echo "<option value='".$cat->id."'";
					  				if($cat_id == $cat->id) echo " selected ";
					  				echo ">".$cat->name."</option>";
					  			}
					  		?>
					  		</select>
					  	</div>
					  	<button type="submit" class="btn btn-default">Search</button>
					  	<a href='<?php echo site_url('radio');?>' class="btn btn-default">Reset</a>
					</form>
				</div>	
				<div class='col-sm-3'>
					<a href='<?php echo site_url('radio/add');?>' class='btn btn-primary pull-right'><span class='glyphicon glyphicon-plus'></span> Add New Item</a>
				</div>
			</div>
			
			<br/>
			
			<!-- Message -->
			<?php if($this->session->flashdata('success')): ?>
				<div class="alert alert-success fade in">
					<?php echo $this->session->flashdata('success');?>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				</div>
			<?php elseif($this->session->flashdata('error')):?>
				<div class="alert alert-danger fade in">
					<?php echo $this->session->flashdata('error');?>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				</div>
			<?php endif;?>
			
			<table class="table table-striped table-bordered">
				<tr>
					<th>No</th>
					<th>Cover radio</th>
					<th>Radio Name</th>
					<th>Category Name</th>
					
					<?php if(in_array('edit',$allowed_accesses)):?>
					<th>Edit</th>
					<?php endif;?>
					
					<?php if(in_array('delete',$allowed_accesses)):?>
					<th>Delete</th>
					<?php endif;?>
					
					
					
				</tr>
				<?php
					if(!$count=$this->uri->segment(3))
						$count = 0;
					if(isset($items) && count($items->result())>0):
						foreach($items->result() as $item):					
				?>
						<tr>
							<td><?php echo ++$count;?></td>
							<td><img src="<?php echo base_url ('uploads/'. $item->image_file)?>" class="img-rounded" width="100" height="100"/></td>
							<td><?php echo $item->name;?></td>
							<td><?php echo $this->category_model->get_info($item->cat_id)->name;?></td>
							
						
							
							
							<?php if(in_array('edit',$allowed_accesses)):?>
							<td><a href='<?php echo site_url("radio/edit/".$item->id);?>'><i class='glyphicon glyphicon-edit'></i></a></td>
							<?php endif;?>
							
							
							<?php if(in_array('delete',$allowed_accesses)):?>
							<td><a href='<?php echo site_url("radio/delete/".$item->id);?>'><i class='glyphicon glyphicon-trash'></i></a></td>
							<?php endif;?>
							
							
							
							
						</tr>
						<?php
						endforeach;
					else:
				?>
						<tr>
							<td colspan='7'>There is no data for item.</td>
						</tr>
				<?php
					endif;
				?>
			</table>
			
			<?php 
				$this->pagination->initialize($pag);
				echo $this->pagination->create_links();
			?>
			
			
