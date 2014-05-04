/*!
 * main.js
 *
 */



(function($){

/* base-globalnavi */
$(function() {
	$('.base-globalnavi').waypoint(function(event, direction) {
		$(this).parent().toggleClass('sticky', direction === "down");
		event.stopPropagation();
	});
});



/* mod-photoList */
$(function() {
	$(".js-colorboxInline").colorbox({inline:true, width:"830px"});
});



/* mod-photoList caption */
$(function() {
	$('.mod-photoList-item').hover(function(){
	    $(".mod-photoList-figcaption", this).stop().animate({top:'177px'},{queue:false,duration:160});
	}, function() {
	    $(".mod-photoList-figcaption", this).stop().animate({top:'220px'},{queue:false,duration:160});
	});
});

})(jQuery);
