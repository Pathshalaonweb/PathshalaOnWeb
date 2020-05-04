<?php $this->load->view("top_application");?>

<section id="main">
  <div class="container">
    <div class="row">
      <?php $this->load->view("members/myaccount_left");?>
      <div class="col-xs-12 col-sm-9 col-md-9">
        <div class="panel panel-default" style="border:2px solid #efefef;">
          <div class="panel-heading" style="background:#efefef; padding:10px;">
            <h1 class="panel-title ffb fs20">Your verified info</h1>
          </div>
          <div class="panel-body">
            <h5>Email address</h5>
            <p>You have confirmed your email: rachna.itmnc@gmail.com. A confirmed email is important to allow us to securely communicate with you.</p>
          </div>
        </div>
        <div class="panel panel-default" style="border:2px solid #efefef;">
          <div class="panel-heading" style="background:#efefef; padding:10px;">
            <h1 class="panel-title ffb fs20">Not yet verified</h1>
          </div>
          <div class="panel-body">
            <h5>Phone number</h5>
            <p>Make it easier to communicate with a verified phone number. We&acute;ll send you a code by SMS or read it to you over the phone. Enter the code below to confirm that you&acute;re the person on the other end.</p>
            <p>Your number is only shared with another Airbnb member once you have a confirmed booking.</p>
            <div class="panel-group mb0" id="accordion1">
              <div class="panel panel-default panel-bg">
                <div class="panel-heading">
                  <div class="panel-title ffb"> <a data-toggle="collapse" data-parent="#accordion3" href="#collapse31"> Add a Phone Number </a><i class="indicator glyphicon glyphicon-chevron-down  pull-right"></i> </div>
                </div>
                <div id="collapse31" class="panel-collapse collapse">
                  <div class="panel-body pb">
                    <form role="form">
                      <div class="form-group ml0 mr0">
                        <label for="exampleInputEmail1 ffb">Choose a Country</label>
                        <select id="country" class="form-control ffr">
                          <option>India</option>
                          <option>Bahamas</option>
                          <option>Cambodia</option>
                          <option>Denmark</option>
                          <option>Ecuador</option>
                          <option>Fiji</option>
                          <option>Gabon</option>
                          <option>Haiti</option>
                        </select>
                      </div>
                    </form>
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label for="firstName" class="col-sm-4 control-label ffb">Add a phone number</label>
                        <div class="col-sm-8">
                          <div class="input-group"> <span class="input-group-addon ffr">+91</span>
                            <input id="login-username" type="text" class="form-control" name="username" value="">
                          </div>
                        </div>
                      </div>
                      <div class="form-group ac">
                        <button type="button" class="btn ffr">Verify Via SMS</button>
                        <button type="button" class="btn ffr">Verify Via Call</button>
                      </div>
                      <div class="form-group"> <a href="#." class="fr ffb">Why Verify?</a> </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-7 col-sm-7 col-md-7">
                <h5 class="mb5">Facebook</h5>
                <p  class="pb10">Sign in with Facebook and discover your trusted connections to hosts and guests all over the world.</p>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-5">
                <button class="btn fr">Connect</button>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-7 col-sm-7 col-md-7">
                <h5 class="mb5">Google</h5>
                <p class="pb10">Connect your Airbnb account to your Google account for simplicity and ease.</p>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-5">
                <button class="btn fr">Connect</button>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-7 col-sm-7 col-md-7">
                <h5 class="mb5">LinkedIn</h5>
                <p  class="pb10">Create a link to your professional life by connecting your Airbnb and LinkedIn accounts.</p>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-5">
                <button class="btn fr">Connect</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view("bottom_application");?>
