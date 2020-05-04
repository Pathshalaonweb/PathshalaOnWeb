<?php
if ( ! function_exists('you_save'))
{	
	function you_save($price,$discount_price)
	{  
		
		if($price!='' && $discount_price!='')
		{
			$you_save = (($price-$discount_price)/$price)*100;
			return $you_save;		
		}
		
	}
}

if ( ! function_exists('view_featured'))
{	
	function view_featured($arr,$other='')
	{  		
		if( is_array($arr) && !empty($arr) )
		{
			 $ix=0;	
			foreach ($arr as $val)
			{
					$cls = ( $ix==0 )	 ? "w174 fl" : "w174 fl ml17" ;	
					$link_url=base_url()."products/detail/".$val['products_id'];
					  $availableqty = ( $val['quantity'] - $val['used_quantity'] );					
				      $availableqty = ($availableqty < 0 )  ? 0 :  $availableqty;	
					
				?>
                <div class="<?php echo $cls;?>">
                <div class="pro-img">
                <a href="<?php echo $link_url;?>">
                <img src="<?php echo get_image('products',$val['media'],'174','225','R'); ?>" alt="<?php echo $val['product_name'];?>" /></a>
                </div>
                <p class="black lh15px mt8 h30">
                <a href="<?php echo $link_url;?>"><?php echo char_limiter($val['product_name'],25);?></a>
                </p>
                         <p class="mt5">
								 <?php if( $val['product_discounted_price']!= '0.0000')
                                 { 
                                 ?>
                                  <span class="gray3 through">
                                  <?php  echo display_price($val['product_price']); ?>
                                  </span><span class="pl16 red2"> <?php  echo display_price($val['product_discounted_price']); ?></span>
                                
                                <?php
                                }else
                                {
                                ?>
                                 <span class="pl16 red2"> <?php  echo display_price($val['product_price']); ?></span>
                                 
                                <?php
                                }
                                ?>                
                        </p>
                     
                <p class="fs11"><span class="b green">Quantity Available :</span> <?php echo $availableqty;?></p>                
                </div>
               <?php
				 if( $ix==3) {  echo '<div class="cb mb40"></div>';  $ix=0; }else{ $ix++; }
			}			
		}		
	}
}