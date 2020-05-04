<?php $this->load->view('includes/header'); ?>
<!-- page content -->
<div class="right_col" role="main"> 
  <!-- top tiles -->
  <?php
	$db2 = $this->load->database('database2', TRUE);
	$sel_q		= "SELECT * FROM wl_customers";
	$user_res	= $db2->query($sel_q);
	$count_user	= '';
	if($user_res->num_rows() > 0) {
		$user_res   = $user_res->result_array();
		$count_user = count($user_res);
	} else {
		$count_user='0';
	}
?>
  <div class="row tile_count">
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Student</span>
      <div class="count"><?php echo $count_user;?></div>
    </div>
    <?php
		$sel_q="SELECT * FROM tbl_department";
		$user_res=$this->db->query($sel_q);
		$count_user='';
		if($user_res->num_rows() > 0)
		{
			$user_res=$user_res->result_array();
			$count_user=count($user_res);
		} else {
			$count_user='0';
		}
		?>
    <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count"> <span class="count_top"><i class="fa fa-user"></i> Total Department</span>
      <div class="count"><?php echo $count_user;?></div>
    </div>
  </div>
   <!-- /top tiles -->
  
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
        <div class="row x_title">
          <div class="col-md-6">
            <h3>Network Activities <small>Graph title sub-title</small></h3>
          </div>
          <div class="col-md-6">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc"> <i class="glyphicon glyphicon-calendar fa fa-calendar"></i> <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b> </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <div id="chart_plot_01" class="demo-placeholder"></div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
          <div class="x_title">
            <h2>Top Campaign Performance</h2>
            <div class="clearfix"></div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-6">
            <div>
              <p>Facebook Campaign</p>
              <div class="">
                <div class="progress progress_sm" style="width: 76%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                </div>
              </div>
            </div>
            <div>
              <p>Twitter Campaign</p>
              <div class="">
                <div class="progress progress_sm" style="width: 76%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-6">
            <div>
              <p>Conventional Media</p>
              <div class="">
                <div class="progress progress_sm" style="width: 76%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                </div>
              </div>
            </div>
            <div>
              <p>Bill boards</p>
              <div class="">
                <div class="progress progress_sm" style="width: 76%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<!-- /page content -->

<?php $this->load->view('includes/footer'); ?>
