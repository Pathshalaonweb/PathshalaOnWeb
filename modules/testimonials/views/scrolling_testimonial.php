<?php
$this->load->model(array('testimonials/testimonial_model'));
$param         = array('status'=>'1','orderby'=>'RAND()');	
$res_array     = $this->testimonial_model->get_testimonial(10,0,$param);
?>
<ul class="myul_n">
<?php
if(is_array($res_array) && !empty($res_array))
{
	foreach($res_array as $val)
	{
		
		?>
          <li>
            <div class="mt10">
              <p class="fs13 i black">
              <img src="<?php echo theme_url(); ?>images/quote-icon.jpg" alt="" class="fl mr5" />
			  <?php echo char_limiter($val['testimonial_description'],250);?></p>
              <p class="fs13 i b black"><?php echo $val['poster_name'];?></p>
            </div>
          </li>
          <?php
	}
}
?>
</ul>