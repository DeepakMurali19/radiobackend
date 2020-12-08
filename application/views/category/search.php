
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li><a href="<?php echo site_url('categories');?>">Categories List</a><span class="divider"></span></li>
				<li>Search Results</li>
			</ul>
			
			<div class='row'>
				<div class='col-sm-9'>
					<?php
					$attributes = array('class' => 'form-inline');
					echo form_open(site_url('category/search'), $attributes);
					?>
						<div class="form-group">
					   	<input type="text" name="searchterm" class="form-control" placeholder="Search"
					   		value="<?php echo $searchterm;?>">
					  	</div>
					  	<button type="submit" class="btn btn-default">Search</button>
					  	<a href='<?php echo site_url('categories');?>' class="btn btn-default">Reset</a>
					</form>
				</div>	
				<div class='col-sm-3'>
					<a href='<?php echo site_url('categories/add');?>' class='btn btn-primary pull-right'><span class='glyphicon glyphicon-plus'></span> Add New Category</a>
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
					<th>Image cover station</th>
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
					if(isset($categories) && count($categories->result())>0):
						foreach($categories->result() as $category):					
				?>
						<tr>
							<td><?php echo ++$count;?></td>
							<td><img src="<?php echo base_url ( 'uploads/'.$category->file)?>" class="img-rounded" width="100" height="100"/></td>
							<td><?php echo $category->name;?></td>
							<?php if(in_array('edit',$allowed_accesses)):?>
							<td><a href='<?php echo site_url("category/edit/".$category->id);?>'><i class='glyphicon glyphicon-edit'></i></a></td>
							<?php endif;?>
							
							<?php if(in_array('delete',$allowed_accesses)):?>
							<td><a href='<?php echo site_url("category/delete/".$category->id);?>'><i class='glyphicon glyphicon-trash'></i></a></td>
							<?php endif;?>
							
							
						</tr>
						<?php
						endforeach;
					else:
				?>
						<tr>
							<td colspan='7'>There is no data.</td>
						</tr>
				<?php
					endif;
				?>
			</table>
			
			<?php 
				$this->pagination->initialize($pag);
				echo $this->pagination->create_links();
			?>

			


