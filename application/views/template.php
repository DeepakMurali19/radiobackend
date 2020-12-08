<?php $this->load->view('panel/header');?>
<?php $this->load->view('panel/nav');?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar teamps-sidebar">
			<?php $this->load->view('panel/sidebar');?>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		<?php echo $content;?>
		
		</div>
	</div>
</div>

<?php $this->load->view('panel/footer');?>