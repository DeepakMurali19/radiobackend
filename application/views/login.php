<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Mediatiko - Dashboard panel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
	<!-- <link href="<?php echo base_url('fonts/ptsan/stylesheet.css');?>" rel="stylesheet">-->
    
    <link href="<?php echo base_url('css/skins/_all-skins.min.css');?>" rel="stylesheet">
    
    <link href="<?php echo base_url('css/AdminLTE.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('css/ionicons.css');?>" rel="stylesheet">
    
    
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('js/jquery.js');?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('js/dashboard.js');?>"></script>
    <script src="<?php echo base_url('js/jquery.validate.js');?>"></script>
  
    <script src="<?php echo base_url('js/demo.js');?>"></script>

  </head>

  <!--	<body <body class="hold-transition login-page">
		<div class="login-box">
			<div class='login-logo'>
				<div class='col-sm-4 col-sm-offset-3'>

	        		<?php
	        		$attributes = array('id' => 'login-form','method' => 'POST');
	        		echo form_open(site_url('login'), $attributes);
	        		?>

						<h2>
						iCAST
						</h2>
						<hr/>
						<?php if($this->session->flashdata('success')):?>
							<div class='alert alert-success fade in'>
								<?php echo $this->session->flashdata('success');?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
						<?php elseif($this->session->flashdata('error')):?>
							<div class='alert alert-danger fade in'>
								<?php echo $this->session->flashdata('error');?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>							
						<?php endif;?>
						
						<div class="form-group">
							<label>Username</label>
							<input class="form-control" type="text" id="inputEmail" placeholder="Username" name='user_name'>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" id="inputPassword" placeholder="Password" name='user_pass'>
						</div>
							
						<button class="btn btn-primary" type="submit">Sign in</button>
										
					<?php echo form_close();  ?>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#login-form').validate({
				rules:{
					user_name: "required",
					user_pass: "required"
				},
				messages:{
					user_name: "Please fill username.",
					user_pass: "Please fill password"
				}
			});
		});
	</script>
  </body>-->

  <body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">

                    <?php
	        		$attributes = array('id' => 'login-form','method' => 'POST');
	        		echo form_open(site_url('login'), $attributes);
	        		?>

    <b>Cast</b>iO</a>
  </div>
                    
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to panel</p>


                        <?php if($this->session->flashdata('success')):?>
							<div class='alert alert-success fade in'>
								<?php echo $this->session->flashdata('success');?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
						<?php elseif($this->session->flashdata('error')):?>
							<div class='alert alert-danger fade in'>
								<?php echo $this->session->flashdata('error');?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>							
						<?php endif;?>

    
      <div class="form-group has-feedback">
        <input class="form-control" type="text" id="inputEmail" placeholder="Username" name='user_name'>
       
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" type="password" id="inputPassword" placeholder="Password" name='user_pass'>
        
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<
</body>
</html>