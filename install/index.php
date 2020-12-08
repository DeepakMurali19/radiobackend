<?php

error_reporting(0);

$db_config_path = '../application/config/database.php';

// Only load the classes in case the user submitted the form
if($_POST) {

	// Load the classes and create the new objects
	require_once('includes/core_class.php');
	require_once('includes/database_class.php');

	$core = new Core();
	$database = new Database();


	// Validate the post data
	if($core->validate_post($_POST) == true)
	{

		// First create the database, then create tables, then write config file
		if($database->create_database($_POST) == false) {
			$message = $core->show_message('error',"The database could not be created, please verify your settings.");
		} else if ($database->create_tables($_POST) == false) {
			$message = $core->show_message('error',"The database tables could not be created, please verify your settings.");
		} else if ($core->write_config($_POST) == false) {
			$message = $core->show_message('error',"The database configuration file could not be written, please chmod application/config/database.php file to 777");
		}

		// If no errors, redirect to registration page
		if(!isset($message)) {
		  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
	      $redir .= "://".$_SERVER['HTTP_HOST'];
	      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	      $redir = str_replace('install/','',$redir);
			header( 'Location: ' . $redir . '' ) ;
		}

	}
	else {
		$message = $core->show_message('error','The Hostname, Username, Password, and Database name are required.');
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Install || Appteve</title>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <style type="text/css">
	  	.mt-5{
	  		margin-top: 5px !important;
	  	}
	  	.mt-10{
	  		margin-top: 10px !important;
	  	}
	  	.install-box{
	  		margin: 30px auto;
	  		width: 400px;
	  	}
	  	.cw{
	  		color: #fff !important;
	  	}
	  </style>


	</head>
	<body style="background-image: url('assets/bg.jpg');">


    <?php if(is_writable($db_config_path)){?>

		<div class="container" >

			<div class="row">
				<div class="install-box">


					<center><h2 class="mt-10 cw">Welcome</center>
					<center><h2 class="mt-5 cw">Backend Installer</h2></center> <br>

					<?php if(isset($message)) { ?>
						<div class="alert alert-danger">
						  <?php echo $message; ?>
						</div>
					<?php }?>

					<div class="panel panel-default">
					  	<div class="panel-heading"><i class="fa fa-cog"></i> Install Your App</div>

						<div class="panel-body">

						  <form id="install_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					        <fieldset>

					          <div class="form-group">
					          	<label for="hostname">Hostname</label><input type="text" id="hostname" value="localhost" class="input_text form-control" name="hostname" />
					          </div>

					          <div class="form-group">
					          	<label for="username">Username</label><input type="text" id="username" class="input_text form-control" name="username" />
					          </div>

					          <div class="form-group">
					          	<label for="password">Password</label><input type="password" id="password" class="input_text form-control" name="password" />
					          </div>

					          <div class="form-group">
					          	<label for="database">Database Name</label><input type="text" id="database" class="input_text form-control" name="database" />
					          </div>

					          <button class="btn btn-success btn-block mt-10" type="submit" id="submit"><i class="fa fa-check"></i> Install </button>
					        </fieldset>
						  </form>

						</div>

					</div>
				</div>
			</div>
		</div>

	<?php } else { ?>

      <p class="error">Please make the application/config/database.php file writable. <strong>Example</strong>:<br /><br /><code>chmod 777 application/config/database.php</code></p>

	<?php } ?>

	</body>
</html>
