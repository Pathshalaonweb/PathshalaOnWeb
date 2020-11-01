<?php $this->load->view("top_application");?>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">
      <?php $this->load->view("myaccount_left");?>
      <div class="col-xl-9 col-lg-4">
        <div class="blog-all-wrap mr-40">
          <div class="col-lg-9 col-md-12 ml-auto mr-auto">
            <div class="login-register-wrapper">
              <div class="login-register-tab-list nav"> <a class="active" data-toggle="tab" href="#lg1">
                <h4>Credit History</h4>
                </a> </div>
              <div class="table-responsive">
              <table class="table table-striped">
              <thead>
              <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Credits Used</th>
              <th>Order ID</th>
              <th>Time</th>
              <thead>
              </tr>
              <?php 
              $ch = curl_init();  
              $url = "https://www.pathshala.co/decore/new/api.php?action=Studentorderhistory&id=".$this->session->userdata('user_id')."&key=0adbf2be-ff5e-11ea-adc1-0242ac120002";
              //echo $url;
              curl_setopt($ch,CURLOPT_URL,$url);
              curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
              $output=curl_exec($ch);
              $jsonOutput = json_decode($output, true);
              // echo $jsonOutput['Result']['data'];
              if(isset($jsonOutput['Result']['data']))
              {
                $sno =1;
                echo "<tbody>";
                for($i=0; $i<count($jsonOutput['Result']['data']);$i++)
                {

                  echo "<tr>";
                  echo "<td>$sno</td>";
                  echo "<td>".$jsonOutput['Result']['data'][$i]['name']."</td>";
                  echo "<td>".$jsonOutput['Result']['data'][$i]['credits']."</td>";
                  echo "<td>".$jsonOutput['Result']['data'][$i]['id']."</td>";
                  echo "<td>".$jsonOutput['Result']['data'][$i]['time']."</td>";
                  echo "</tr>";
                  $sno++;
                }
                echo "</tbody>";
              }
              else
              {
                echo "No Data To Display";
              }
              ?>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view("bottom_application");?>
<style>.button-box {
    text-align: center;
}</style>