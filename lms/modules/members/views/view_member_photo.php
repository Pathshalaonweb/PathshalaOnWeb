<?php $this->load->view("top_application");?>

                <section id="main">
		<div class="container">
        <div class="row">
                      <?php $this->load->view("members/myaccount_left");?>
                    
                    
             	<div class="col-xs-12 col-sm-9 col-md-9">
				
				 <div class="panel panel-default" style="border:2px solid #efefef;">
						<div class="panel-heading" style="background:#efefef; padding:10px;">
							<h1 class="panel-title ffb fs20">Required</h1>
						</div>
						<div class="panel-body">
						<div class="col-xs-12 col-sm-4 col-md-4">
						<?php if($res_img!='')
{?>
	
	<div class="user_view">
							<img src="<?php echo base_url();?>uploaded_files/custumer_profile/<?php echo $res_img;?> " class="img-circle img-thumbnail">
					    </div>
<?php } else{?>
						<div class="user_view">
							<img src="<?php echo theme_url();?>img/Jeff-Gurr-Headshot.jpg" class="img-circle img-thumbnail">
					    </div>		
							
						<?php  }?>
						
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
						<p>Clear frontal face photos are an important way for hosts and guests to learn about each other. It’s not much fun to host a landscape! Be sure to use a photo that clearly shows your face and doesn’t include any personal or sensitive info you’d rather not have hosts or guests see.</p>
						<!--<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
								<label for="exampleInputFile">Take your phone with your webcam</label>
								<input type="file" id="exampleInputFile" class="form-control">
								
							</div>
						</div>--><?php validation_message();?>
                               <?php 	echo form_open_multipart('members/photo_viedo', 'class="form-horizontal ", id="target" ');?> 
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<label for="exampleInputFile">Upload a file form your Computer</label>
								<input type="file" name="photoimg" id="file" class="form-control">
								<input type='hidden' name='img' value='up'>
							</div>
						</div>
						<?php echo form_close(); ?>
						</div>		
						</div>
						
					</div>	
				 
				 <div class="panel panel-default">
						<div class="panel-heading">
							<h1 class="panel-title ffb fs20">Profile Video</h1>
						</div>
						<div class="panel-body">
						<div class="col-xs-12 col-sm-6 col-md-6">
						<img src="<?php echo theme_url();?>img/viedo.png" class="img-responsive">
						</div>
						
						<div class="col-xs-12 col-sm-6 col-md-6">
						<h5>Video Checklist</h5>
						<ul class="p0">
						<li>We love close-ups, but we suggest you sit at arm’s length.</li>
						<li>We love close-ups, but we suggest you sit at arm’s length.</li>
						<li>We love close-ups, but we suggest you sit at arm’s length.</li>
						<li>We love close-ups, but we suggest you sit at arm’s length.</li>
						<li>We love close-ups, but we suggest you sit at arm’s length.</li>
						</ul>
						<button class="btn ac">Record a nre viedo</button>
						</div>
						
						<div class="col-xs-12 col-sm-12">
						<h5>Tell the community a little bit about yourself</h5>
						<p>Start with your name and answer some of the following questions, or make up some of your own!</p>
						<ul class="p0">
						<li>Where are you from?</li>
						<li>What are some of your interests?</li>
						<li>What are some of your interests?</li>
						<li>What are some of your interests?</li>
						</ul>	
						</div>
						</div>
				</div>	
				
				 
				 </div>
        </div>
		</div>
		</section>  
                    
          <script type="text/javascript" >
 $('#file').change(function() {
  $('#target').submit();
});
</script>          
                    

<?php $this->load->view("bottom_application");?>