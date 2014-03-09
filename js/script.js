// (function($) {
$(document).ready(function() {

	// console.log('i\'m here!');

	//add some life to that sow!
	$(window).scroll(function() {
		//is the scrollHeight divisible by 100?
		var random        = Math.floor(Math.random() * 10);
		var random2       = Math.floor(Math.random() * 10);
		var slideOptions  = Array('-5px', '-4px', '3px', '2px', '0px', '2px', '3px', '4px', '5px', '10px');
		var rotateOptions = Array('-5deg', '-4deg', '-3deg', '-2deg', '0deg', '2deg', '3deg', '4deg', '5deg', '10deg');

		var slide, rotate;
		if ($(document).scrollTop() % 10 === 0) {
			slide         = 'translateX(' + slideOptions[random] + ')'
		}

		if ($(document).scrollTop() % 2 === 0) {
			rotate        = 'rotateZ(' + rotateOptions[random2] + ')'
		}

		$('header').css({
			'-webkit-transform': '-webkit-' + rotate + '-webkit-' +  slide,
			'-moz-transform'   : rotate + slide,
			'-ms-transform'    : rotate + slide,
			'-o-transform'     : rotate + slide,
			'transform'        : rotate + slide
		});
	});

	//when a link is clicked, reset the header, then follow through!
	$('a').click(function(e) {
		e.preventDefault();
		console.log('I clicked a link');
		var href   = $(this).attr('href');

		var transformT = 'translateX(0px)';
		var transformR = 'rotateZ(0deg)';

		$('header').css({
			'-webkit-transform': '-webkit-' + transformT + ' -webkit-' + transformR,
			'-moz-transform'   : transformT + transformR,
			'-ms-transform'    : transformT + transformR,
			'-o-transform'     : transformT + transformR,
			'transform'        : transformT + transformR
			// 'top' : '4em'
		});
		console.log('now we go to the link');
		window.location.href = href;

	});


	// when hovering over the projects, do some delight
	var projectHover;
	function sowShake() {
		if (!($('header').attr('data-ro'))) {
			$('header').attr('data-ro', 0);
			$('header').css('transform', 'rotateY(90deg)');
		} else {
			var degree = parseInt($('header').attr('data-ro'), 10) + 90;
			$('header').attr('data-ro', degree);
			$('header').css('transform', 'rotateY(' + degree + 'deg)');
		}
	}

	// projectHover = setTimeout(sowShake, 3000);
	$('.eine-project').mouseenter(function() {
		projectHover = setInterval(sowShake, 200);
	});

	$('.eine-project').mouseleave(function() {
		clearInterval(projectHover);
		$('header').attr('data-ro', 0).css('transform', 'rotateY(0deg)');
	});


	//mobile menu helper
	$('#menu-helper').click(function() {
		if ($('#menu-main-menu').hasClass('expandito')) {
			$('#menu-main-menu').slideUp(200).removeClass('expandito');
		} else {
			$('#menu-main-menu').slideDown(200).addClass('expandito');
		}
	});
	
});
// })(jQuery);