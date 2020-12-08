<?php $this->load->view('panel/header');?>

<?php $this->load->view('panel/nav');?>

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar teamps-sidebar">
            <?php $this->load->view('panel/sidebar');?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="page-header">Welcome, <?php echo $this->user->get_logged_in_user_info()->user_name;?>!</h2>

            <div class="row">


                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion-wifi"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Radio Stations</span>
                            <span class="info-box-number"><?php echo $this->radio_model->count_all();?></span>
                        </div>
                    </div>
                </div>
               

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-pencil"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Category Radio</span>
                            <span class="info-box-number"><?php echo $this->category_model->count_all();?></span>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Apple Music</span>
                            <span class="info-box-number"><?php echo $this->apple_model->count_all();?></span>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">News </span>
                            <span class="info-box-number"><?php echo $this->news_model->count_all();?></span>
                        </div>
                    </div>
                </div>
                </div>
            <hr/>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading clickable">

                            <h3 class="panel-title">Latest found apple music</h3>
                            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
                        </div>
                        <table class="table table-bordered">
                            <?php foreach($this->apple_model->get_all(3)->result() as $item) echo "
                            <tr>
                                <td>".$item->name_track."</td>
                            </tr>"; ?>
                            <tr>
                                <td class="text-right"><a href='<?php echo site_url(' apple ');?>'>View All</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading clickable">
                            <h3 class="panel-title">Recent Podcast</h3>
                            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
                        </div>
                        <table class="table table-bordered">
                            <?php foreach($this->podcast_model->get_all(3)->result() as $inquiry) echo '
                            <tr>
                                <td>'.$inquiry->track_name.'</td>
                            </tr>'; ?>
                            <tr>
                                <td class="text-right"><a href='<?php echo site_url(' podcast ');?>'>View All</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>


</div>

<?php $this->load->view('panel/footer');?>