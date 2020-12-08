

<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">

              <?php
		       foreach($allowed_modules->result() as $module){
		       echo "<li > <a href='".site_url($module->module_name)."'><i class='".$module->module_icon."'></i><span>". $module->module_desc."</span></a></li>";
		            }
	       ?>

            </li>
            <li><a href="http://appteve.com"><i class="fa fa-circle-o text-red"></i> <span>Appteve Group</span></a></li>
            <li><a href="http://codecanyon.net/user/appteve"><i class="fa fa-circle-o text-yellow"></i> <span>CodeCanyon</span></a></li>
            <li><a href="http://dev.appteve.pro"><i class="fa fa-circle-o text-aqua"></i> <span>Support</span></a></li>



          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
