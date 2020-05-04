<?php $this->load->view("top_application");?>

                <section id="main">
		<div class="container">
        <div class="row">
                      <?php $this->load->view("members/myaccount_left");?>
                    
						
				<div class="col-xs-12 col-sm-9 col-md-9">
					<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							Review About You </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
							Review By You  </a>
						</li>
						
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<div class="panel panel-default" style="border:2px solid #efefef;">
						<div class="panel-heading" style="background:#efefef; padding:10px;">
							<h1 class="panel-title ffb fs20">Past Reviews</h1>
						</div>
						<div class="panel-body">
						
						<p>Reviews are written at the end of a reservation through Airbnb. Reviews you&acute;ve received will be visible both here and on your public profile.</p>	
						<p>No one has reviewed you yet.</p>
						
								
						</div>
						
					</div>
						</div>
						<div class="tab-pane" id="tab_default_2">
							<div class="panel panel-default" style="border:2px solid #efefef;">
						<div class="panel-heading" style="background:#efefef; padding:10px;">
							<h1 class="panel-title ffb fs20">Reviews to Write</h1>
						</div>
						<div class="panel-body">
						<p>Nobody to review right now. Looks like it&acute;s time for another trip!</p>	
							
						</div>
						
					</div>
					
							<div class="panel panel-default" style="border:2px solid #efefef;">
						<div class="panel-heading" style="background:#efefef; padding:10px;">
							<h1 class="panel-title ffb fs20">Past Reviews You&acute;ve Written</h1>
						</div>
						<div class="panel-body">
						<p></p>	
							
						</div>
						
					</div>
						</div>
						
					</div>
				</div>
			</div>
				
				
				
				
				 
				 </div>	
        </div>
		</div>
		</section>  
                    
                    
                    

<?php $this->load->view("bottom_application");?>