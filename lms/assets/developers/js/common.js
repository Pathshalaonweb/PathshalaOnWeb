var gObj=gObj ||  {};
$.extend(gObj,{re_mail:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z])+$/,re_vldname:/^[ a-zA-Z]+$/});

function validcheckstatus(name,action,text)
{
	var chObj	=	document.getElementsByName(name);
	var result	=	false;	
	for(var i=0;i<chObj.length;i++){
	
		if(chObj[i].checked){
		  result=true;
		  break;
		}
	}
 
	if(!result){
		 alert("Please select atleast one "+text+" to "+action+".");
		 return false;
	}else if(action=='delete'){
			 if(!confirm("Are you sure you want to delete this.")){
			   return false;
			 }else{
				return true;
			 }
	}else{
		return true;
	}
}



function increment(id)
{ 

var obj = document.getElementById(id);
var max_qty ;
max_qty = document.getElementById('aval_qty').value;
max_qty = parseInt(max_qty);


			var val=obj.value;	
			if( parseInt(val)< max_qty ) {
				
			   obj.value=(+val + 1);
			   
			}else{
				if(max_qty==0){
					alert("None quantity is available.");
				}else{
					alert("Maximum available quantity is "+max_qty+". You can not add  more then available Quantity.");
			 	}
			}
}
function decrement(id)
{ 
   var obj = document.getElementById(id);
	var val=obj.value
	if(val==1 || val <1)
		val=1;
	else
	  val=(val - 1);
		
	obj.value=val || 1;
}

function incDnc(val, qid, avaQty)
{
        qval=jQuery('#qty_'+qid).val();    
        mqval=jQuery('#mqty_'+qid).val();   
        var i=eval(qval);
        if(val===1){	
            if(avaQty > i){	
                i++;
                jQuery('#qty_'+qid).val(i);
                jQuery('#mqty_'+qid).val(i);
                jQuery.post(site_url+'cart/update_cart_qty',$('#cart_frm').serialize(),function(data){
                    location.reload();
                  // $("#cart_frm").load('#cart_frm');
                    jQuery('#crt_msg').validationEngine('showPrompt', data.error_msg, data.error_type, true);
                    },'json');                 
            }else{
                jQuery('#qty_'+qid).validationEngine('showPrompt', 'Quantity can not excced then '+avaQty, 'error', true);
            }
        }else if(val===2){
            if(i > 1){	                      
                i--;
                jQuery('#qty_'+qid).val(i);
                jQuery('#mqty_'+qid).val(i);                
                jQuery.post(site_url+'cart/update_cart_qty',$('#cart_frm').serialize(),function(data){
                    location.reload();
//                   /$("#cart_frm").load('#cart_frm');
                    jQuery('#crt_msg').validationEngine('showPrompt', data.error_msg, data.error_type, true);
                    },'json');
            }else{
                jQuery('#qty_'+qid).validationEngine('showPrompt', 'Quantity can not less then 1', 'error', true);
               // alert('');
            }  
        }
     //  document.getElementById('qty_'+qid).value=i;
}

function show_dialogbox()
{
	$("#dialog_overlay").fadeIn(100);
	$("#dialog_box").fadeIn(100);
}
function hide_dialogbox()
{
	$("#dialog_overlay").fadeOut(100);
	$("#dialog_box").fadeOut(100);
}

function showloader(id)
{
	$("#"+id).after("<span id='"+id+"_loader'><img src='"+site_url+"/assets/developers/images/loader.gif'/></span>");
}


function hideloader(id)
{
	$("#"+id+"_loader").remove();
}
												
												
function load_more(base_uri,more_container,formid)
{	
  showloader(more_container);
  $("#more_loader_link"+more_container).remove();
   if(formid!='0')
   {
	   form_data=$('#'+formid).serialize();
   }
   else
   {
	   form_data=null;
   }
  $.post
	  (
		  base_uri,
		  form_data,
		  function(data)
		  { 
		  
		  
			 var dom = $(data);
			
			dom.filter('script').each(function(){
			$.globalEval(this.text || this.textContent || this.innerHTML || '');
			});
			
			var currdata = $( data ).find('#'+more_container).html(); $('#'+more_container).append(currdata);
			hideloader(more_container);
		  }
	  );
}

function join_newsletter()
{	
	var form = $("#chk_newsletter");	
	showloader('newsletter_loder');
	$(".btn").attr('disabled', true);		
	$.post(site_url+"pages/join_newsletter",
		  $(form).serialize(),		   
		   function(data){
			
			     $("#my_newsletter_msg").html(data);				
				 $(".btn").attr('disabled', false);				 
			     hideloader('newsletter_loder');
				 $('input').val('');					 
			   });
	
	return false;
	
}


$(document).ready(function() {
	
	
	
	$(':checkbox.ckblsp').click(function()
    {
	 
		$(':input','#ship_container').val('');
		
		if($(this).attr('checked'))
		{
			$('#ship_container').hide();
			
		}else{
			
			$('#ship_container').show();
				
		}	
	}); 
	
	
	
});