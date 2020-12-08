
			<ul class="breadcrumb">
				<li><a href="<?php echo site_url();?>">Dashboard</a> <span class="divider"></span></li>
				<li>Podcast List</li>
			</ul>
			
			<div class='row'>
				<div class='col-sm-9'>
					<?php
					$attributes = array('class' => 'form-inline');
					echo form_open(site_url('news/search'), $attributes);
					?>
						<div class="form-group">
					   	<input type="text" name="searchterm" class="form-control" placeholder="Search">
					  	</div>
					  	<button type="submit" class="btn btn-default">Search</button>
					</form>
				</div>	
				<div class='col-sm-3'>
					<a href='<?php echo site_url('podcast/add');?>' class='btn btn-primary pull-right'><span class='glyphicon glyphicon-plus'></span> Add Podcast</a>
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
					<th>Track name</th>
					<th>Track file</th>
					
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
							<td><?php echo $item->track_name; ?></td>
							<td width="400" ><audio src="<?php echo base_url('music/'.$item->file) ?>" controls></audio></td>
							
							
							
							
							<?php if(in_array('delete',$allowed_accesses)):?>
							<td><a href='<?php echo site_url("podcast/delete/".$item->id);?>'><i class='glyphicon glyphicon-trash'></i></a></td>
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
				
				
				function custom_echo($x, $length)
                      {
                          if(strlen($x)<=$length)
                              {
                                  echo $x;
                                }
                          else
                               {
                                $y=substr($x,0,$length) . '...';
                      echo $y;
                      }
                    }
			?>
			
			
				
			

			

