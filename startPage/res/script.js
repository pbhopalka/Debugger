$(init);
function init() {
	animation.homepage();
};
animation = {
	homepage: function(){
		var delaysHome = [200, 800, 1300, 1800, 2200, 2600, 3000, 3500, 4200, 4500, 5000, 5600, 6200, 7000, 7500, 8000, 8500, 9000, 9500];	
		$('#intro span').each(function (i) {
				setTimeout(function (li) {
					li.animate({opacity: 1}).delay(9500).queue(function(n) { 
						$("#smile").html(";)"); n();
					});	
			}, delaysHome[i], $(this));
		});
	},
}
var h_gl=$(window).height();
var w_hd=1920,h_hd=1080,h;
var animating=0;

function resize()
{
	var w=$(window).width();
	h=(w*h_hd)/w_hd;
	var fs=(w*6)/w_hd+'em';
	var magna=(w*4)/w_hd+'em';
	var t_ar,t_sec;

	/* scroll-wrap adjustment */
	$("#scroll_wrap").css({'margin-top':7*h});
	$(".wrap_inner>span").css({'top':(h-180)/2});	

	/* scroll-wrap-inner adjustment */
	$(".circle").css({'margin-top':(h-250)/2});

	/* fix height adjustment */
	$(".fix").css({'height':h});

	/* section height adjustment */
	$('section').each(function()
	{
		$(this).css({'height':h});
	});	

	/* window height adjustment */
	$('.window').css({'height':(h/2)});

	/* font adjustments */
	$('body').css({'font-size':fs});

	/* sec wrap adjustment */
	$('.sec_wrap').each(function()
	{
		$(this).css({'margin-top':(h-$(this).height())/2});
	});	

}

$(document).ready(function()
{
	$('#speakers_icon').click(function()
	{
	    $('html, body').stop().animate({
	        scrollTop:$('#speakers_tab').offset().top
	    },1500,function(){animating=0;});
	});
	$('.wait').click(function()
	{
	    $('html, body').stop().animate({
	        scrollTop:13*h/2
	    },1500,function(){animating=0;});	
	});
	$('#sponsors_icon').click(function()
	{
	    $('html, body').stop().animate({
	        scrollTop:$('#sponsors').offset().top
	    },1500,function(){animating=0;});
	});
		$('#contacts_icon').click(function()
	{
	    $('html, body').stop().animate({
	        scrollTop:$('#footer').offset().top
	    },1500,function(){animating=0;});	
	});		
	$('.lg').click(function()
	{
	    $('html, body').stop().animate({
	        scrollTop:0
	    },1500,function(){animating=0;});
	});
	resize();
	//day and night
	var d= new Date();
	if((d.getHours()>6)&&(d.getHours()<18))
		$('#footer').css({'background-position':'100% 0'});
	else
		$('#footer').css({'background-position':'0 0'});	
});

$(document).ready(function()
{
	resize();
});

$(window).resize(function()
{
	resize();
});
