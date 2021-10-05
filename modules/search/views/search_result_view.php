<?php $this->load->view('top_application'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto+Condensed:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merriweather&display=swap');

        * {
            padding: 0;
            margin: 0;

        }



        .div3big {
            height: 10vh;
            width: 7vw;
        }

        .div3bigbig {
            height: 10vh;
            width: 10vw;
        }

        .h_type {
            color: #253263;
            font-weight: bold;
            font-size: 15px;
        }




        header {
            height: 50px;
        }

        .mainc_dg {
            margin-top: 50px;
            display: flex;
        }

        .content-left_dg {
            float: left;
            width: 40%;
            text-align: center;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            margin: 100px auto;

        }

        .onlineTutor {
            color: #3C5186;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 5px;
            font-size: 70px;

            letter-spacing: 5px;
        }

        .heading_m2_1 {
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 2.2rem;
            font-weight: bold;
            word-spacing: 4px;
            letter-spacing: 2px;
            color: #5E8B7E;
        }

        .get-started_dg {
            text-transform: uppercase;
            font-family: 'Roboto', sans-serif;
            border-radius: 20px;
            font-size: 15px;
            color: white;
            background: rgb(250, 0, 0);
            font-weight: 500;
            letter-spacing: 3px;
            padding: 15px 55px 15px 55px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .content-right_dg {
            float: right;
            width: 50%;
            margin-right: auto;
        }

        .content-right_dg img {
            width: 800px;
            height: 500px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .row10 {
            display: flex;
        }

        .info-class_dg {

            margin-left: 30px;
            flex: 2;
            width: 60%;
            height: auto;
        }
        .add_view{
            width: 40%;
        }

        .filter-area {
            flex: 1;

            width: 20%;
        }

        .tutor_dg {

            margin: 30px 70px 0px 0px;
            border-radius: 25px;
            background: #ffffff;
            box-shadow: 27px 27px 56px #c7c7c7, -27px -27px 56px #ffffff;
            padding: 20px;
            height: auto;
            padding-bottom: 55px;
            display: block;
        }




        .view-profile_dg {
            float: right;
            border-radius: 8px;
            font-size: 12px;
            color: white;
            background: #50C878;
            font-weight: 500;
            letter-spacing: 1px;
            padding: 8px 8px 8px 8px;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 1px solid black;
        }


        .filter-area button {
            background-color: #ffffff;
            border-radius: 8px 8px 0px 0px;
            width: 80px;
            height: 1.9em;
            font-size: 17px;
            color: #3A6351;
            margin-bottom: 2px;
            border-bottom: none;
        }

        .filter-area h4 {
            font-family: 'Merriweather', serif;
            letter-spacing: 1px;
        }

        input[type=text] {
            vertical-align: middle;
            position: relative;
            width: 150px;
            height: 30px;
            border: none;
            border-bottom: 1px solid black;
            margin-bottom: 10px;
        }

        .menudrop1 {
            border-radius: 10px;
            border: none;
            background-color: #fff;
            color: black;
            width: 80%;
            background-color: #f8f8f8;
            height: 45px;
            font-size: 1rem;
        }

        label {
            display: none;
            font-family: 'Roboto Condensed', sans-serif;
            letter-spacing: 1px;
            margin: 10px;
        }

        #category label {
            display: block;
        }

        #class label {
            display: block;
        }

        #subject:hover label {
            display: block;
        }

        #city:hover label {
            display: block;
        }
    

        @media screen and (max-width:768px) {
            .mainc_dg {
                margin-top: 0px;
                flex-direction: column-reverse;
                align-items: center;
            }

            .content-left_dg {
                float: none;
                width: 100%;
            }

            .content-right_dg {
                float: none;
                margin: 0px;

            }

            .content-right_dg img {
               height: 500px;
            }

            .content-left_dg h1 {

                letter-spacing: 1px;
                font-size: 50px;
            }

            .content-left_dg h3 {

                font-size: 1.2rem;

            }

            .get-started_dg {

                font-size: 10px;
            }

            .row10 {
                flex-direction: column;
            }

            .filter-area {

                width: 100%;
            }

            .info-class_dg {

                width: 100%;
                
                display: flex;
            
            }

            .add_view{
                width: 100%;
            }

            .tutor_dg {

                    width: 100%;
                border-radius: 15px;
                background: #ffffff;
                box-shadow: 27px 27px 56px #c7c7c7, -27px -27px 56px #ffffff;
               
                height: auto;
            }
            .div3big {
           
            width: 100%;
        }

        .div3bigbig {
         
            width: 100%;
        }
        div.pagination{
            padding: 0px;
            margin: 0px;
        }
    
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row mainc_dg">
            <div class="d-flex flex-column content-left_dg">
                <h1 class="onlineTutor">Online Tutor</h1>
                <h3 class="heading_m2_1">Easy access to Top <br> Online Tutors from pan India</h3>
               <a href="<?php echo base_url(); ?>account/welcome/student"> <button class="get-started_dg">Get Started</button></a>
				  
            </div>

            <img class="content-right_dg" src="<?php echo base_url(); ?>uploaded_files/userfiles/images/tutor2.png" alt="hi">
        </div>
    </div>
    <hr style="width:100%" , size="3">
    <div class="container-fluid">
        <div class="row">
            <div class="add_view">
            <?php $this->load->view("advance_search_view"); ?>
    </div>
            <div class="col-6 info-class_dg">

                <form method="post">
                    <div id="postList">
                        <?php
                        if (is_array($res) && !empty($res)) {
                            foreach ($res as $val) {
                        ?>

                                <div class="tutor_dg">

                                    <div class="d-flex flex-row">
                                        <div class="ml-1 mt-1"> <a href="<?php echo base_url(); ?>teacher/profile/<?php echo $val['teacher_id']; ?>/<?php echo url_title($val['first_name']); ?>">
                                                <img class="mr-2" style="width:80px;height:80px;border-radius:50px;border:1px solid grey;" src="<?php echo get_image('teacher', $val['picture'], 190, 190, 'AR'); ?>" alt="img" class="img-responsive img-rounded"> </a>

                                        </div>
                                        <div class="d-flex flex-column mt-1 ml-1">
                                            <h4 class="h_type"><a href="<?php echo base_url(); ?>teacher/profile/<?php echo $val['teacher_id']; ?>/<?php echo url_title($val['first_name']); ?>"> <?php echo $val['first_name']; ?></a></h4>
                                            <div class="row ml-1">
                                                <?php for ($x = 1; $x <= 5; $x++) { ?>
                                                    <i class="fa fa-star<?php if ($x > $rating) {
                                                                            echo "-o";
                                                                        } ?> text-info"></i>
                                                <?php } ?>
                                            </div>
                                            <span class="info-row ml-1"><i class="fa fa-map-marker"></i> <span class="item-location"><?php echo get_city($val['city_id']) ?></span> </span>

                                        </div>

                                    </div>

                                    <hr style="width:100%;text-align:left;margin-left:0">

                                    <div class="d-flex flex-row text-center">

                                        <div class="d-flex flex-column div3big">
                                            <h4 class="h_type text-center">Experience</h4>
                                            <p class="text-center">
                                                <?php if (!empty($val['experience_year'])) {
                                                    echo $val['experience_year']; ?>+ Years

                                            <?php } ?></p>
                                        </div>
                                        <div class="d-flex flex-column div3big">
                                            <h4 class="h_type">Class</h4>
                                            <p class="text-center"><?php echo get_cat_name($val['class']) ?></p>
                                        </div>
                                        <div class="d-flex flex-column div3bigbig">
                                            <h4 class="h_type  text-center">Subject</h4>
                                            <p class="text-center mb-1"><?php echo get_cat_name($val['subject']); ?></p>

                                        </div>
                                        <div class="d-flex flex-column div3big">
                                            <h4 class="h_type  text-center">Price</h4>
                                            <p class="text-center mb-1">&#x20B9; <?php echo $val['fee']; ?></p>
                                        </div>
                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0">

                                    <div class="d-flex flex-row text-center">
                                        <p class=""><?php echo char_limiter(strip_tags($val['description']), 500); ?></p>



                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0">


                                    <!-- <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3> -->
                                    <div class="d-flex flex-row justify-content-center">


                                        <?php if ($this->session->userdata('user_id') > 0) { ?>
                                            <button class="view-profile_dg mr-auto ml-3">Schedule</button>
                                            <a class="view-profile_dg ml-auto" href="<?php echo base_url(); ?>teacher/book/<?php echo $val['teacher_id']; ?>/<?php echo url_title($val['first_name']); ?>" <?php echo $val['first_name']; ?> class="button"><span>Book Class</span></a>
                                            <!--7-- removeddddd 1-->
                                        <?php
                                        } else { ?>
                                            <button class="view-profile_dg mr-auto ml-3">Schedule</button>
                                            <div class="view-profile_dg  ml-auto">
                                                <a style="color:white;text-decoration:none;" href="<?php echo base_url(); ?>users/login"><span>Book Class</span></a>
                                            </div>
                                        <?php
                                        } ?>
                                        <!--button style="float:right;" class="view-profile">View Profile</button>-->
                                        <?php if ($this->session->userdata('user_id') > 0) { ?>
                                            <div class="view-profile_dg ml-auto">
                                                <a href="javascript:void(0)" onclick="return confirm('Are you sure to send notification to <?php echo $val['first_name']; ?> ?')" data-href="<?php echo base_url(); ?>search/getContent/<?php echo $val['teacher_id'] ?>" data-teacher="<?php echo $val['teacher_id'] ?>"> Send Request </a>
                                            <?php } else { ?>
                                                <div class="view-profile_dg ml-auto">
                                                    <a style="color:white;text-decoration:none;" href="<?php echo base_url(); ?>users/login"> Show Interest </a>
                                                <?php } ?>
                                                </div>
                                            </div>
                                    </div>
                            <?php }
                        } ?>
                     
                            <?php echo $this->ajax_pagination->create_links(); ?>

                                </div>
                </form>
            </div>
            <div class="load ing" style="display: none;">
                <div class="content"> <img src="<?php echo base_url() . 'assets/developers/images/loader2.gif'; ?>" /></div>
            </div>
        </div>
    </div>
    </div>
</body>
<footer>
    <?php $this->load->view("bottom_application"); ?>
</footer>
<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='<?php echo base_url(); ?>assets/demo_wait.gif' width="64" height="64" /><br>
    Loading...</div>
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        var state = $('#state').val();
        var city = $('#city').val();
        var classes = $('#classes').val();
        var subject = $('#subject').val();
        var keyword = $('#keyword').val();
        var pincode = $('#pincode').val();
        var bath_time = $('#bath_time').val();
        var category = $('#category').val();
        $("#wait").css("display", "block");
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>search/ajaxPaginationData/' + page_num,
            data: {
                page: page_num,
                state: state,
                city: city,
                classes: classes,
                subject: subject,
                keyword: keyword,
                pincode: pincode,
                sprice: $(".price1").val(),
                eprice: $(".price2").val(),
                bath_time: bath_time,
                category: category
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
                url: "<?php echo base_url(); ?>search/ajaxPaginationData/" + page_num,
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
                    url: "<?php echo base_url(); ?>search/ajaxPaginationData/" + page_num,
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
            //searchFilter();
            if (stateID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>search/selectstate',
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
        $('#category').on('change', function() {
            var categoryID = $(this).val();
            $("#subject").val("");
            $("#wait").css("display", "block");
            //searchFilter();
            if (categoryID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>search/getSubcat',
                    data: 'category_id=' + categoryID,
                    success: function(html) {
                        $('#classes').html(html);
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
        $('#classes').on('change', function() {
            var classesID = $(this).val();
            $("#subject").val("");
            $("#wait").css("display", "block");
            //searchFilter();
            if (classesID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>search/getSubcat',
                    data: 'category_id=' + classesID,
                    success: function(html) {
                        $('#subject').html(html);
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
                url: "<?php echo base_url(); ?>search/getContent",
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
</style>

</html>