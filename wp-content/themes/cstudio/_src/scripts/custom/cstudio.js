/* Custom Javascript */
jQuery(function ($) {
	"use strict";
	console.log('Custom JS Loaded');

	$('p:empty').remove();
	$('.card-text, .post-thumbnail').matchHeight();
	//Tab Accordion
	$('.collapsed').on('click', function () {
		var target = $(this).attr('href');
		var pane = $(this).attr('rel');
		$('.collapse').not(target).removeClass('show');
		$(pane).addClass('active');
		$('.tab-pane').not(pane).removeClass('active');
	});

	$('#tab-accordion').on('shown.bs.collapse', function (e) {
		var panelHeadingHeight = $('.card-header').height();
		var animationSpeed = 750; // animation speed in milliseconds
		var currentScrollbarPosition = $(document).scrollTop();
		var topOfPanelContent = $(e.target).offset().top;
		if (currentScrollbarPosition > topOfPanelContent - panelHeadingHeight) {
			$("html, body").animate({
				scrollTop: topOfPanelContent - panelHeadingHeight
			}, animationSpeed);
		}
	});

	$('.goBack').on('click', function () {
		window.history.go(-1);
	});

	/* Isotope */

	var $container = $('.grid-wrap');
	var filter, filterVal;

	$container.imagesLoaded(function () {
		//console.log('imgs loaded');
		$container.isotope({
			// options
			itemSelector: '.portfolio-item',
			layoutMode: 'masonry',
			filter: getFilter()
		});
		$('.spinner').css('display', 'none');
		$container.css('opacity', 1);
		var link = getFilter();
		link = link.replace('.', '');
		$('.portfolio-filter-tabs li').find('a[data-filter="' + link + '"]').addClass('active');

	});


	window.addEventListener('popstate', function () {

		$container.imagesLoaded(function () {
			$container.isotope({
				filter: getFilter()
			});
			$('.spinner').css('display', 'none');
			$container.css('opacity', 1);
		});

	});

	$('.filter').bind('click', function (e) {
		e.preventDefault();
		var filter = $(this).attr('data-filter');
		var page = getUrlParts()[3];

		if (filter === 'all') {
			filterVal = '*';
		} else {
			filterVal = '.' + filter;
		}

		var filterObj = {
			'filter': filter
		};

		$(this).parents('ul').find('.active').removeClass('active');
		$(this).addClass('active');
		//Need to replace the page in history also because browser adds a trailing slash on refresh :(
		window.history.pushState(filterObj, null, '/' + page + '/' + filter);
		$container.isotope({
			filter: filterVal,
		});
	});

	/* Team Page */

	var $teamContainer = $('.team-grid');
	$teamContainer.imagesLoaded(function () {
		$teamContainer.isotope({
			filter: '*',
			layoutMode: 'masonry',
			itemSelector: '.team-item'
		});
	});


	//FIND A TEAM MEMBER
	//By Location
	$('.sel-location').on('change', function () {
		var filterValue = $(this).val();
		//console.log(filterValue);
		$('.team-grid').isotope({
			filter: filterValue,
		});
	});

	var $location = $('#location').select2({
		placeholder: "By Location",
		minimumResultsForSearch: Infinity
	});

	$location.on('select2:open', function () {
		if ($discipline.val() !== null) {
			$discipline.val(null).trigger("change");
		} else {
			console.log('no value');
		}
	});

	//By Discipline
	$('.sel-discipline').on('change', function () {
		var filterValue = $(this).val();
		//console.log(filterValue);
		$('.team-grid').isotope({
			filter: filterValue,
		});
	});

	var $discipline = $('#discipline').select2({
		placeholder: "By Discipline",
		searchInputPlaceholder: "Start Typing to Search...",
		allowClear: true
	});


	$discipline.on('select2:open', function () {
		$('.select2-search input').prop('focus', false);
		if ($location.val() !== null) {
			$location.val(null).trigger("change");
		} else {
			return;
		}
	});

	var catmenu = $('.cat-menu');
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$(catmenu).addClass('fixed-top');
			$('.navbar-brand').addClass('scaled');
		} else {
			$(catmenu).removeClass('fixed-top');
			$('.navbar-brand').removeClass('scaled');
		}
	});


	//BG VIDEO
	$('.video-wrap').hover(function () {
		var video = $(this).children("video")[0];
		video.currentTime = 0;
		video.play();
	});
	var overlayVid = $(".overlay video")[0];
	var overlay = $('.overlay');
	var lastTime = 0;
	//console.log($(overlayVid).width());
	//if ($(window).height() > $(window).width()) {
	var w = $(window).width();
	var vW = $(overlayVid).width();
	var l = (vW - w) / -2;
	$(overlayVid).css('left', l);
	//}
	$(overlay).removeClass('can-play');
	$(overlayVid).on("canplaythrough", function () {
		$(this).parent('.overlay').addClass('can-play');
		$(this).parent('.overlay').addClass('animate');
	});
	$(overlayVid).on("timeupdate", function () {
		var currentTime = this.currentTime;
		if (currentTime < lastTime) {
			$(overlay).removeClass('animate');
			setTimeout(function () {
				$(overlay).addClass('animate');
			}, 500);
		}
		lastTime = currentTime;
	});


	//CAROUSEL
	$('.carousel').carousel({
		keyboard: true
	});
	//Temp - remove p tags around images (WP)
	$('p > img').unwrap();


	// DDR

	$('.wpcf7').on('wpcf7mailsent', function () {
		$('html, body').animate({
			scrollTop: 0
		}, 'slow');
	});

	$('.wpcf7').on('wpcf7submit ', function () {
		var val = $('select[name="ddr-discipline"]').val();

		console.log(val);
	});



	$('.wpcf7-form').find('input[name="internal-proj"]').on('change', function () {
		var value = $(this).val();
		//console.log(value);
		var disciplineField = $('.wpcf7').find('select[name="ddr-discipline"]');
		if (value === 'No') {

			$(disciplineField).val('na');

		} else {

			$(disciplineField).val('');

		}

	});

	function getUrlParts() {
		var urlArr = window.location.href.split('/');
		return urlArr;
	}

	function getFilter() {


		filter = getUrlParts()[4];
		filterVal = 'all';

		if (filter !== '') {
			filterVal = filter !== 'all' ? '.' + filter : '*';

		} else {

			filterVal = '*';
		}
		return filterVal;

	}

});