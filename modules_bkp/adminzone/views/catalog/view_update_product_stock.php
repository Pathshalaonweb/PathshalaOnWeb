<?php $this->load->view('includes/face_header'); ?>
<script type="application/javascript">
function check_qty_val(val,itemId)
{
	if(val.search(/\b[0-9]*\.?([0-9]+)\b$/)==-1)
	{
		alert("Please Enter Integer value in quantity");
		$("#qty_"+itemId).val(0);
		$("#qty_"+itemId).focus();
	}
}

function check_qty_val_low_stock(val,itemId)
{
	if(val.search(/\b[0-9]*\.?([0-9]+)\b$/)==-1)
	{
		alert("Please Enter Integer value in low stock");
		$("#inv_"+itemId).val(0);
		$("#inv_"+itemId).focus();
	}
}
</script>

<table width="100%" border="0" cellspacing="4" cellpadding="0" class="grey">
                <tr valign="top" >
                  <td width="98%" align="right" >
		
				  <table width="100%"  border="0" cellspacing="2" cellpadding="2">
                    <tr align="left" bgcolor="#1588BB" class="white">
                  <td colspan="5" bgcolor="#CCCCCC" ><strong>   Manage Product Stock   : </strong></td>
                 </tr>
                    <tr valign="top" >
                      <td width="54%" align="left" >&nbsp;</td>
                      <td width="46%" align="left" >&nbsp;</td>
                    </tr>
                    <tr valign="top" >
                      <td colspan="2" align="left" >
                      <?php 
							if(error_message() !=''){
							   echo error_message();
							}
							?>
                      <?php echo form_open('','name="stock_frm"');?>
                      <table width="100%" border="1" cellspacing="3" cellpadding="2" class="grey">
                      <tr>
                        
                        <?php $product_res=get_db_single_row('wl_products','product_name,product_code,products_id',$Condwherw='WHERE 1 AND products_id="'.$this->uri->segment(4).'"');?>
                        <td colspan="4"><strong>Product Name</strong> - <?php echo $product_res['product_name'];?><br/>
                        <strong>product Code -</strong> <?php echo $product_res['product_code'];?></td>
                       
                      </tr>
                      <tr>
                        <td align="center"><strong>Product Size</strong></td>
                        <td align="center"><strong>Product Color</strong></td>
                        <td align="center"><strong>Product Quantity</strong></td>
                        <td align="center"><strong>Lowstock</strong></td>
                      </tr>
                      <?php foreach($res as $catKey=>$pageVal)
							{
								 ?>
                                
                      <tr>
                        <td align="center">
						<?php 
				$size_name=get_db_single_row('wl_size','size_name',$Condwherw='WHERE 1 AND size_id="'.$pageVal['product_size'].'"');
				echo $size_name=($pageVal['product_size']==0) ? 'Standard Size' : $size_name['size_name'];?>
                </td>
                        <td align="center">
			<?php $color_name=get_db_single_row('wl_color','color_name',$Condwherw='WHERE 1 AND color_id="'.$pageVal['product_color'].'"');
				echo $color_name=($pageVal['product_color']==0) ? 'Standard Color' : $color_name['color_name'];?></td>
                        <td align="center"><input  type="text" id="qty_<?=$pageVal['stock_id'];?>" name="qty_<?=$pageVal['stock_id'];?>" value="<?php echo $pageVal['product_quantity'];?>" size="2" onkeydown="return check_qty_val(this.value,'<?php echo $pageVal['stock_id'];?>');" /></td>
                        <td align="center"><input  type="text" id="inv_<?=$pageVal['stock_id'];?>" name="inv_<?=$pageVal['stock_id'];?>" value="<?php echo $pageVal['inventory'];?>" size="2" onkeydown="return check_qty_val_low_stock(this.value,'<?php echo $pageVal['stock_id'];?>');" /></td>
                      </tr>
                      <?php }?>
                      <tr>
                        <td colspan="4" align="center"><input type="submit" name="action" value="Update Product Stock" class="button2" /></td>
                        </tr>
                      </table>
                      <?php echo form_close();?>
                      </td>
                    </tr>
                    
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                  </table>
				
				  </td>
                </tr>
</table>
</body>
</html>