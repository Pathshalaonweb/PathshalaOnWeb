function include(url){ 
document.write('<script src="'+ url + '" type="text/javascript"></script>'); 
}
include(resource_url+'jscripts/bootstrap.js');
include(resource_url+'jscripts/jquery.placeholder.js');
include(resource_url+'jscripts/move-top.js');
include(resource_url+'jscripts/easing.js');
//include(resource_url+'fancybox/jquery.fancybox.pack.js');
include(resource_url+'jscripts/bars.js');

if(Page=='home'){
    include(resource_url+'jscripts/jquery.flexslider.js');
    include(resource_url+'jscripts/waypoints.min.js');
    include(resource_url+'jscripts/counterup.min.js');
    include(resource_url+'jscripts/jquery.flexisel.js');
}

$(document).ready(function() {
  $(".scroll").click(function(event){event.preventDefault();$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);});
			
    /*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
$(window).load(function(e) {
//$(".invoice").fancybox({  'width' : 750, 'height' : 610, 'autoScale' : false, 'transitionIn' : 'elastic', 'transitionOut' : 'elastic', 'type' : 'iframe'});
//$(".cart-box").fancybox({  'width' : 1000, 'height' : 550, 'autoScale' : false, 'transitionIn' : 'elastic', 'afterClose':function () {
//           location.reload();
//        }, 'transitionOut' : 'elastic', 'type' : 'iframe'});

$('.topmenu li').hover(function(){$('div',this).show()},function(){$('div',this).hide()});
$('input').placeholder();$('textarea').placeholder();
//$(".new-arrival").jCarouselLite({vertical:false,btnPrev:".prev",btnNext:".next",hoverPause:true,visible:3 ,auto:1200,speed:1200});
//$('.mygallery').fancybox({
//wrapCSS    : 'fancybox-custom',closeClick : true, openEffect : 'none',
//helpers : {
//title : {type : 'inside'},
//overlay : {css : {'background' : 'rgba(0,0,0,0.6)'}}
//}
//}); 


$('.feat-cat').hover(function(){
	$(this).children(":first").stop().animate({'left':'0'});},
	function(){
	$(this).children(":first").stop().animate({'left':'-235px'});}
)

$("#back-top").hide();	
$(function () {$(window).scroll(function () {if ($(this).scrollTop() > 100) {$('#back-top').fadeIn();} else {$('#back-top').fadeOut();}});
$('#back-top a').click(function () {$('body,html').animate({scrollTop: 0}, 800);return false;});
});

 $(".fq li a.act").find('img').attr('src',theme_url+'images/fq-b.png');
$(".fq li a").on('click',function(){
if($(this).hasClass('act')==1)
{$(this).removeClass('act');$(this).next().slideUp('fast');$(this).find('img').attr('src',theme_url+'images/fq-r.png');}
else{$(".fq li a").next().slideUp('fast');$(this).next().slideDown('fast');$(".fq li a").removeClass('act');$(this).addClass('act');
$(".fq li a").find('img').attr('src',theme_url+'images/fq-r.png');$(this).find('img').attr('src',theme_url+'images/fq-b.png');}
});


if(Page=='home'){
 // flexSlider 
$('.flexslider').flexslider({animation: "slide",start: function(slider){$('body').removeClass('loading');}});

// Starts-Number-Scroller-Animation-JavaScript
$(function(){$('.counter').counterUp({delay: 20,time: 1000});});

//
$("#flexiselDemo1").flexisel({
            visibleItems: 4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,    		
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: { 
                    portrait: { 
                            changePoint:480,
                            visibleItems: 1
                    }, 
                    landscape: { 
                            changePoint:640,
                            visibleItems:2
                    },
                    tablet: { 
                            changePoint:768,
                            visibleItems: 3
                    }
            }
    });
}});