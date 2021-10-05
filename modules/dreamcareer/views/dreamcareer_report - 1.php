<!DOCTYPE html>
<?php $this->load->view("top_application"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <style>
        p {
            font-size: 20px;
        }

        .abc {
            font-size: 2.9rem;
            text-align: center;
        }

        .h-secondary {
            font-size: 1.8rem;
        }

        .tbl {
            font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
            font-weight: bold;
            display: grid;
            background-color: #ecf0f1;
            box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.3);
            border-radius: 20px;
        }

        li {
            font-size: 20px;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {

            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #000080;
            color: white;
        }

        .tbl {
            font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
            display: grid;
            background-color: #ecf0f1;
            box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, 0.3);
            border-radius: 30px;
            padding: 25px;


        }
    </style>
</head>

<body>
<form>
    <div class="login-register-area pt-20 pb-20">
        <h1 class="abc"> Career Suggestion Report</h1><br><br>
        <div class="tbl col-lg-12 col-md-12 ml-auto mr-auto pt-40 pb-40">
            <p> Registeration ID: </p>
            <p> Name: </p>
            <p> Email ID: </p>
            <div class="row">
                <div class="col-md-4">
                    <select name="list" onChange="resultFilter()" id="list" class="form-control">
                        <option value="">Select Programme Name</option>
                        <?php
                        $sql2 = "SELECT distinct(programme_name) FROM `wl_dc_colleges`";
                        $que1 = $this->db->query($sql2);
                        foreach ($que1->result_array() as $list) :
                        ?>
                            <option value="<?php echo $list['programme_name'] ?>"><?php echo $list['programme_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="col-md-4">
                    <select id="loc" name="loc" onChange="resultFilter()" class="form-control">
                        <option value="">Select Location</option>
                    </select>
                </div>
            </div>
<div id="postList">
<?php
if(is_array($res) && !empty($res)) {
	foreach($res as $val)
	{
            
            $sql2 = "SELECT distinct(programme_name) FROM `wl_dc_colleges`";
            $que = $this->db->query($sql2);
            foreach ($que->result_array() as $vall2) : {

                    echo "<h2>" . $vall2['programme_name'] . "</h2><br>";
                    $rs = $vall2['programme_name'];

                    $sql3 = "SELECT distinct(location_name) FROM `wl_dc_colleges` where `programme_name`='$rs' ";
                    $quee = $this->db->query($sql3);
                    foreach ($quee->result_array() as $vall3) : {

                            echo "<h2>" . $vall3['location_name'] . "</h2><br>";
                            $rs2 = $vall3['location_name'];




            ?>
                            <table id="customers">

                                <thead>

                                <tbody>

                                    <tr>
                                        <td>Courses</td>
                                        <td>Duration</td>
                                        <td>Fee</td>
                                        <td>Study Mode</td>
                                        <td>College Name</td>
                                        <td>Exams Accepted</td>
                                        <td>Location</td>
                                        <td>ApprovedBY</td>

                                    </tr>
                                    <?php
                                    $sqll = "SELECT * FROM `wl_dc_colleges` where `programme_name`='$rs' and `location_name`= '$rs2'";
                                    $qu = $this->db->query($sqll);

                                    foreach ($qu->result_array() as $row) : {


                                            echo "<tr>";
                                            echo "<td>" . $row['courses'] . "</td>";
                                            echo "<td>" . $row['duration'] . "</td>";
                                            echo "<td>" . $row['fees'] . "</td>";
                                            echo "<td>" . $row['study_mode'] . "</td>";

                                            echo "<td>" . $row['college_name'] . "</td>";
                                            echo "<td>" . $row['exams_accepted'] . "</td>";
                                            echo "<td>" . $row['location_name'] . "</td>";
                                            echo "<td>" . $row['approved_by'] . "</td>";
                                            echo "</tr>";
                                        }
                                    endforeach;

                                    ?>

                                </tbody>

                                </thead>
                            </table>
                            <br>
                            <br>
            <?php

                        }
                    endforeach;
                }
            endforeach;
            ?>
<?php } }else{?>
<div class="alert alert-warning"> <strong>Sorry !</strong> No record Found. </div>
<?php }?>
<?php echo $this->ajax_pagination->create_links(); ?> 

</div>

        </div>
    </div>
    <h2 class="h-secondary">
        Need Help? Book Free Consultation
    </h2>

    <h3 class="h-ternary">
        Print
    </h3>

    <?php $this->load->view("bottom_application"); ?>

</form>
</body>

</html>

<script>

  function resultFilter(page_num) {
    page_num = page_num ? page_num : 0;
    var state = $('#state').val();
    var subject = $('#subject').val();
    var city = $('#city').val();
    var list = $('#list').val();
    var loc = $('#loc').val();
    $("#wait").css("display", "block");
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>dreamcareer/ajaxPaginationData/' + page_num,
      data: {
        page: page_num,
        state: state,
        subject: subject,
        city:city,
        list: list,
        loc: loc,
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
<script type="text/javascript">
  $(document).ready(function() {
    $('#list').on('change', function() {
      var listID = $(this).val();
      $("#subject").val("");
      $("#wait").css("display", "block");
      //dreamcareerFilter();
      if (listID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url(); ?>dreamcareer/getloc',
          data: 'programme_name=' + listID,
          success: function(html) {
            $('#loc').html(html);
            $("#wait").css("display", "none");
          }
        });
      } else {
        $('#city').html('<option value="">Select Category</option>');
      }
    });
  });
</script>