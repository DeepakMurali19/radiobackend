<header class="main-header">
        <a href="<?php echo base_url('index.php/dashboard');?>" class="logo">
          <span class="logo-mini"><b>G</b>L</span>
          <span class="logo-lg"><b>GLO</b>bal</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('img/fokhwar.png');?>" class="user-image" alt="User Image">
                  <?php $logged_in_user = $this->user->get_logged_in_user_info();?>
                  <span class="hidden-xs"><?php echo $logged_in_user->user_name;?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo base_url('img/fokhwar.png');?>" class="img-circle" alt="User Image">
                    <p>
                      Appteve Group <small>appteve.com</small>
                    </p>
                  </li>

                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('profile');?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('logout');?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
              </li>
            </ul>
          </div>
        </nav>
      </header>
