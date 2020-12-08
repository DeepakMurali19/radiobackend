            <ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li>Apple Music List</li>
			</ul>
			
			<div class='row'>
				<div class='col-sm-9'>
					<?php
					$attributes = array('class' => 'form-inline');
					echo form_open(site_url('apple/search'), $attributes);
					?>
						<div class="form-group">
					   	<input type="text" name="searchterm" class="form-control" placeholder="Search">
					  	</div>
					  	<button type="submit" class="btn btn-default">Search</button>
					</form>
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
					<th>Track name</th>
					<th>Radio Station</th>
					<?php if(in_array('delete',$allowed_accesses)):?>
					<th>Delete</th>
					<?php endif;?>
					
					
				</tr>
				<?php
					if(!$count=$this->uri->segment(3))
						$count = 0;
					if(isset($apples) && count($apples->result())>0):
						foreach($apples->result() as $apple):					
				?>
						<tr>
							<td><?php echo ++$count;?></td>
							<td><img src="<?php echo $apple->cover_url;?>" class="img-rounded" width="100" height="100"/></td>
							<td><?php echo $apple->name_track;?></td>
							<td><?php echo $apple->name_radio;?></td>
							
							
							
							<?php if(in_array('delete',$allowed_accesses)):?>
							<td><a href='<?php echo site_url("apple/delete/".$apple->id);?>'><i class='glyphicon glyphicon-trash'></i></a></td>
							<?php endif;?>
							
							
						</tr>
						<?php
						endforeach;
					else:
				?>
						<tr>
							<td colspan='7'>There is no data for category.</td>
						</tr>
				<?php
					endif;
				?>
			</table>
			
			<?php 
				$this->pagination->initialize($pag);
				echo $this->pagination->create_links();
			?>

			
            

			

			
