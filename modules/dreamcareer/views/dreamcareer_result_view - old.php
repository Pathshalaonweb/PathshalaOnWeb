<?php $this->load->view("top_application"); ?>

<div class="breadcrumb-area">
  <div class="breadcrumb-top bg-img breadcrumb-overly-3 pb-95" style="background-image:url(<?php echo theme_url(); ?>img/dreamcareer-tutor/dreamcareer-banner.jpg);">
  <section id="mu-slider">
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="modules/dreamcareer/views/3.jpg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        
        <span></span>
        <h2>Education For Everyone</h2>
        <p><center>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet error eius reiciendis eum sint unde eveniet deserunt est debitis corporis temporibus recusandae accusamus.</center></p>
      </div>
    </div>
    <!-- Start single slider item -->    
  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-book"></span>
              <h3>Learn Online</h3>
              <p><center>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</center></p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-users"></span>
              <h3>Expert Teachers</h3>
              <p><center>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</center></p>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <span class="fa fa-table"></span>
              <h3>Best Classrooms</h3>
              <p><center>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</center></p>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
  </section>
  
  <div class="login-register-area">
      <div class="tbl col-lg-7 col-md-12 ml-auto mr-auto">
        <center>
        <form action="<?php echo base_url(); ?>dreamcareer/studentResult" method="post" accept-charset="utf-8" onsubmit="return validate()">
          <form>
            <table cellpadding=7px>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='1'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "1 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select name="ans1" onChange="dreamcareerFilter()" id="ans1" class="form-control">
                        <option value="">Select Answer</option>
                        <?php
                        $sql = "SELECT * FROM `wl_dc_answers`  where parent_id='0'";
                        $query = $this->db->query($sql);
                        foreach ($query->result_array() as $val) :
                        ?>
                          <option value="<?php echo $val['answer_id'] ?>"><?php echo $val['answer_name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='2'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "2 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>

                      <select id="ans2" name="ans2" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='3'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "3 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans3" name="ans3" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='4'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "4 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans4" name="ans4" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='5'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "5 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans5" name="ans5" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='6'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "6 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans6" name="ans6" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='7'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "7 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans7" name="ans7" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='8'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "8 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans8" name="ans8" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='9'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "9 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans9" name="ans9" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='10'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "10 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans10" name="ans10" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <tr>
                    <td>
                      <?php
                      $sqll = "SELECT * FROM `wl_dc_questions`  where id='11'";
                      $qu = $this->db->query($sqll);
                      foreach ($qu->result_array() as $vall) :
                        echo "11 ";
                        echo $vall['question'];
                      endforeach; ?>
                    </td>
                    <td>
                      <select id="ans11" name="ans11" onChange="dreamcareerFilter()" class="form-control">
                        <option value="">Select Answer</option>
                      </select>
                    </td>
                  </tr>
                </div>
              </div>
            </table><//?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <div align="center">
    <button type="button" name="login" id="login" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Submit</button>
  </div>
  <div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="login-register-form">
            <?php echo validation_message(); ?>
            <?php echo error_message(); ?>
            <?php //echo form_open('users/register'); 
            ?>
            
              <input type="text" name="first_name" placeholder="Name" id="name" required value="<?php echo set_value('first_name'); ?>">
              <?php echo form_error('first_name'); ?>
              <input type="number" name="phone_number" placeholder="Phone" id="phone" required value="<?php echo set_value('phone_number'); ?>" min="5000000000" max="9999999999" step=1>
              <?php echo form_error('phone_number'); ?>
              <input type="email" name="user_name" placeholder="Email" id="email" required value="<?php echo set_value('user_name'); ?>">
              <input type="password" name="password" id="password" placeholder="Password" required value="<?php echo set_value('password'); ?>">


              <!-- <select id="classes" name="classes[]" multiple>
                  <option value="" selected disabled>Select Class</option>
                </select>    -->
              <br>
              <!-- <div class="requried" id="classeserror" style="display:none; color:red;">Please Select an Option.</div> -->
              <!-- <div class="required" style="color:#1b68b5;">Please refresh the page for a new category.</div> -->
              <br>
              <div class="button-box">
                <button class="default-btn" type="submit"><span>Register</span></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<div class="event-area my-acc pt-20 pb-130">
  <div class="container">
    <div class="row">

      <div class="col-xl-9 col-lg-4">


        <div class="loading" style="display: none;">
          <div class="content"> <img src="<?php echo base_url() . 'assets/developers/images/loader2.gif'; ?>" /></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var Page = ''; /*  | detail */
</script>
<?php $this->load->view("bottom_application"); ?>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='<?php echo base_url(); ?>assets/demo_wait.gif' width="64" height="64" /><br>
  Loading...</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
  function validate()
  {
    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    // console.log(name+" "+password+" "+" "+email+" "+phone);
    
    if(name.trim() == "" || name.length <= 5)
    {
      alert('Please enter Name');
      document.getElementById("name").focus();
      return false;
    }
    if(password.length < 6 || password == "")
    {
      alert('Please enter Password');
      document.getElementById("password").focus();
      return false;
    }
    if(email == "")
    {
      alert('Please enter Email');
      document.getElementById("email").focus();
      return false;
    }
    if(phone.length != 10 || isNaN(phone) || phone.trim() == "")
    {
      alert('Please enter Valid Phone Number');
      document.getElementById("phone").focus();
      return false;
    } 
  }
  </script>
<script>
  function dreamcareerFilter(page_num) {
    page_num = page_num ? page_num : 0;
    var state = $('#state').val();
    var subject = $('#subject').val();
    var city = $('#city').val();
    var ans2 = $('#ans2').val();
    var ans3 = $('#ans3').val();
    var ans4 = $('#ans4').val();
    var ans5 = $('#ans5').val();
    var keyword = $('#keyword').val();
    var pincode = $('#pincode').val();
    var bath_time = $('#bath_time').val();
    var ans1 = $('#ans1').val();
    $("#wait").css("display", "block");
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>dreamcareer/ajaxPaginationData/' + page_num,
      data: {
        page: page_num,
        state: state,
        subject: subject,
        city: city,
        ans2: ans2,
        ans3: ans3,
        ans4: ans4,
        ans5: ans5,
        keyword: keyword,
        pincode: pincode,
        sprice: $(".price1").val(),
        eprice: $(".price2").val(),
        bath_time: bath_time,
        ans1: ans1
      },
      beforeSend: function() {
        $('.loading').show();
      },
      success: function(html) {
        $('#postList').html(html);
        $('.loading').fadeOut("slow");
        $("#wait").css("display", "none");
      }
    });
  }
</script>
<script>
  var batchtime;
  $(function() {
    $('.item_filter').click(function() {
      $('.product-data').html('<div id="loaderpro" style="" ></div>');
      batchtime = multiple_values('batchtime');
      page_num = 0;
      var state = $('#state').val();
      var city = $('#city').val();
      var classes = $('#classes').val();
      var subject = $('#subject').val();
      var keyword = $('#keyword').val();
      var pincode = $('#pincode').val();
      var category = $('#category').val();
      $.ajax({
        url: "<?php echo base_url(); ?>dreamcareer/ajaxPaginationData/" + page_num,
        type: 'post',
        data: {
          batchtime: batchtime,
          page_num: page_num,
          state: state,
          city: city,
          classes: classes,
          subject: subject,
          keyword: keyword,
          pincode: pincode,
          sprice: $(".price1").val(),
          eprice: $(".price2").val(),
          category: category
        },
        beforeSend: function() {
          $('.loading').show();
        },
        success: function(html) {
          //alert(html);
          $('#postList').html(html);
          $('.loading').fadeOut("slow");
        }
      });
    });

  });

  function multiple_values(inputclass) {
    var val = new Array();
    $("." + inputclass + ":checked").each(function() {
      val.push($(this).val());
    });
    return val;
  }

  $(function() {
    $("#slider-range").slider({
      range: true,
      min: 0,
      max: 3000,
      values: [000, 3000],
      slide: function(event, ui) {
        $("#priceshow").html("" + ui.values[0] + " - " + ui.values[1]);
        $(".price1").val(ui.values[0]);
        $(".price2").val(ui.values[1]);
        $('.product-data').html('<div id="loaderpro" style="" ></div>');

        // colour = multiple_values('colour');
        //batchtime  = multiple_values('batchtime');
        // size   = multiple_values('size');

        var page_num = 0;
        var state = $('#state').val();
        var city = $('#city').val();
        var classes = $('#classes').val();
        var subject = $('#subject').val();
        var keyword = $('#keyword').val();
        var pincode = $('#pincode').val();
        var bath_time = $('#bath_time').val();
        var category = $('#category').val();
        $.ajax({
          url: "<?php echo base_url(); ?>dreamcareer/ajaxPaginationData/" + page_num,
          type: 'post',
          data: {
            sprice: ui.values[0],
            eprice: ui.values[1],
            batchtime: batchtime,
            page_num: page_num,
            state: state,
            city: city,
            classes: classes,
            subject: subject,
            keyword: keyword,
            pincode: pincode,
            bath_time: bath_time,
            category: category
          },
          beforeSend: function() {
            $('.loading').show();
          },
          success: function(html) {
            //alert(html);
            $('#postList').html(html);
            $('.loading').fadeOut("slow");
          }
        });
      }
    });
    $("#priceshow").html("" + $("#slider-range").slider("values", 0) +
      " - " + $("#slider-range").slider("values", 1));
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#state').on('change', function() {
      var stateID = $(this).val();
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (stateID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/selectstate',
          data: 'state_id=' + stateID,
          success: function(html) {
            $('#city').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        // $('#state').html('<option value="">Select country first</option>');
        $('#city').html('<option value="">Select state first</option>');
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#ans1').on('change', function() {
      var ans1ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans1ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans1ID,
          success: function(html) {
            $('#ans2').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#ans2').on('change', function() {
      var ans2ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans2ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans2ID,
          success: function(html) {
            $('#ans3').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans3').on('change', function() {
      var ans3ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans3ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans3ID,
          success: function(html) {
            $('#ans4').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans4').on('change', function() {
      var ans4ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans4ID=='34') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans4ID,
          success: function(html) {
            $('#ans5').html(html);
            $('#ans5').prop('disabled', false);
            $('#ans6').prop('disabled', false);
            $('#ans7').prop('disabled', false);
            $("#wait").css("display", "none");
          }
        });
      } 
      if (ans4ID=='35') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans4ID,
          success: function(html) {
            $('#ans5').prop('disabled', 'disabled');
            $('#ans6').prop('disabled', 'disabled');
            $('#ans7').prop('disabled', 'disabled');
            $('#ans8').html(html);
            $("#wait").css("display", "none");
          }
        });
      }else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans5').on('change', function() {
      var ans5ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans5ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans5ID,
          success: function(html) {
            $('#ans6').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans6').on('change', function() {
      var ans3ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans3ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans3ID,
          success: function(html) {
            $('#ans7').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans7').on('change', function() {
      var ans7ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans7ID=='160') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans7ID,
          success: function(html) {
            $('#ans8').html(html);
            $('#ans8').prop('disabled', 'disabled');
            $('#ans10').html(html);
            $('#ans10').prop('disabled', 'disabled');
            $("#wait").css("display", "none");
            $('#ans9').html(html);
          }
        });
      } 
      if (ans7ID=='161') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans7ID,
          success: function(html) {
            $('#ans8').html(html);
            $('#ans8').prop('disabled', false);
            $('#ans10').html(html);
            $('#ans10').prop('disabled', false);
            $("#wait").css("display", "none");
          }
        });
      }else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans8').on('change', function() {
      var ans8ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans8ID=='172') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans8ID,
          success: function(html) {
            $('#ans9').html(html);
            $('#ans9').prop('disabled', 'disabled');
            $("#wait").css("display", "none");
            $('#ans10').prop('disabled', false);
            $('#ans10').html(html);
          }
        });
      } 
      if (ans8ID=='179') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans8ID,
          success: function(html) {
            $('#ans9').prop('disabled', false);
            $('#ans9').html(html);
            $('#ans10').prop('disabled', 'disabled');
            $('#ans9').html(html);
            $("#wait").css("display", "none");
          }
        });
      }
      if (ans8ID=='183') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans8ID,
          success: function(html) {
            $('#ans9').html(html);
            $('#ans9').prop('disabled', 'disabled');
            $('#ans10').html(html);
            $("#wait").css("display", "none");
          }
        });
      }
      if (ans8ID=='184') {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans8ID,
          success: function(html) {
            $('#ans9').html(html);
            $('#ans9').prop('disabled', false);
            $('#ans10').html(html);
            $('#ans10').prop('disabled','disabled');
            $("#wait").css("display", "none");
          }
        });
      }else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#ans9').on('change', function() {
      var ans3ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans3ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans3ID,
          success: function(html) {
            $('#ans11').html(html);
            $("#wait").css("display", "none");
          }
        });
      } 
      else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#ans10').on('change', function() {
      var ans3ID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (ans3ID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getAns2',
          data: 'answer_id=' + ans3ID,
          success: function(html) {
            $('#ans11').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>
<script>
  $(document).ready(function() {
    $("body").on("click", ".notified", function(event) {
      //$(".notified").click(function(e){
      //alert();
      $("#wait").css("display", "block");
      var state = $('#state').val();
      var city = $('#city').val();
      var classes = $('#classes').val();
      var subject = $('#subject').val();
      var keyword = $('#keyword').val();
      var pincode = $('#pincode').val();
      var teacher = $(this).attr('data-teacher');
      var category = $('#category').val();
      $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: "<?php echo base_url(); ?>dreamcareer/getContent",
        data: {
          state: state,
          city: city,
          classes: classes,
          subject: subject,
          keyword: keyword,
          pincode: pincode,
          teacher: teacher,
          category: category
        },
        success: function(result) {
          if (result.sucuess == '1') {
            $("#msg").html(result.msg);
            $("#wait").css("display", "none");
          } else {
            $("#msg").html(result.msg);
            $("#wait").css("display", "none");
          }
        }
      });
    });

  });
</script>
<style>
  div.pagination {
    font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
    padding: 20px;
    margin: 7px;
  }

  div.pagination a {
    margin: 2px;
    padding: 0.5em 0.64em 0.43em 0.64em;
    text-decoration: none;
    color: #fff;

    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
  }

  div.pagination a:hover,
  div.pagination a:active {

    background-color: #de1818;
    color: #fff;
  }

  div.pagination span.current {
    padding: 0.5em 0.64em 0.43em 0.64em;
    margin: 2px;
    background-color: #f6efcc;
    color: #6d643c;
  }

  div.pagination span.disabled {
    display: none;
  }

  .pagination b {
    background-color: #1b68b5;
    color: white;
    border: 1px solid #4CAF50;
    padding: 8px 16px;
  }

  .pagination a:hover:not(.active) {
    background-color: #ddd;
  }

  .tbl {
    font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
    font-weight: bold;
    display: grid;
    background-color: #ecf0f1;
    box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.3);
    border-radius: 20px;
  }
}
</style>
<style>
	#mu-slider {
  display: inline;
  float: left;
  width: 100%;
}
#mu-slider .mu-slider-single {
  display: inline;
  float: left;
  width: 100%;
  position: relative;
}
#mu-slider .mu-slider-single .mu-slider-img {
  display: inline;
  float: left;
  width: 100%;
  height: 500px;
}
#mu-slider .mu-slider-single .mu-slider-img:after {
  background-color: rgba(0, 0, 0, 0.5);
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}
#mu-slider .mu-slider-single .mu-slider-img figure {
  height: 100%;
  width: 100%;
}
#mu-slider .mu-slider-single .mu-slider-img figure img {
  width: 100%;
  height: 100%;
}
#mu-slider .mu-slider-single .mu-slider-content {
  color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 20%;
  padding: 0 15%;
  width: 100%;
  text-align: center;
  height: 100%;
}
#mu-slider .mu-slider-single .mu-slider-content h4 {
  letter-spacing: 1px;
  margin-bottom: 0;
}
#mu-slider .mu-slider-single .mu-slider-content span {
  display: inline-block;
  height: 1px;
  width: 100px;
}
#mu-slider .mu-slider-single .mu-slider-content h2 {
  font-size: 50px;
  line-height: 80px;
  margin-bottom: 10px;
}
#mu-slider .mu-slider-single .mu-slider-content p {
  font-size: 18px;
  letter-spacing: 0.5px;
  line-height: 28px;
}
#mu-slider .mu-slider-single .mu-slider-content a {
  margin-top: 25px;
}
#mu-slider .slick-prev,
#mu-slider .slick-next {
  height: 60px;
  width: 60px;
}
#mu-slider .slick-prev:before,
#mu-slider .slick-next:before {
  color: #fff;
  font-size: 25px;
}
#mu-service {
  display: inline;
  float: left;
  margin-top: -80px;
  width: 100%;
}
#mu-service .mu-service-area {
  display: inline;
  float: left;
  width: 100%;
}
#mu-service .mu-service-area .mu-service-single {
  background-color: #01bafd;
  color: #fff;
  display: inline;
  float: left;
  padding: 35px 25px;
  text-align: center;
  width: 33.33%;
}
#mu-service .mu-service-area .mu-service-single:nth-child(2) {
  background-color: #2ecc71;
}
#mu-service .mu-service-area .mu-service-single:nth-child(3) {
  background-color: #45a0de;
}
#mu-service .mu-service-area .mu-service-single span {
  font-size: 30px;
}
#mu-service .mu-service-area .mu-service-single h3 {
  font-size: 25px;
}
#mu-service .mu-service-area .mu-service-single p {
  font-weight: lighter;
}
img {
  border: 0;
}

.mu-read-more-btn {
  border: 1px solid #fff;
  color: #fff;
  display: inline-block;
  margin-top: 10px;
  padding: 10px 20px;
  text-transform: uppercase;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -ms-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
.mu-read-more-btn:hover, .mu-read-more-btn:focus {
  color: #fff;
}
h1, h2, h3, h4, h5, h6 {
  font-family: "Montserrat", sans-serif;
}

h2 {
  font-size: 30px;
  font-weight: 700;
  line-height: 40px;
  margin: 0;
}
h3  {
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  -ms-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
h3 {
  margin-bottom: 20px;
  padding: 20px;
  border-bottom: 1px solid #ccc;
  padding-left: 0;
}
.fa {
  display: inline-block;
  font: normal normal normal;
  font-size: inherit;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.fa-book:before {
  content: "\f02d";
}
.fa-users:before {
  content: "\f0c0";
}

</style>