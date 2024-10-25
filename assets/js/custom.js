(function($) {
	$(document).ready(function() {
		// Adding class to body
		$('body').addClass('js');

		var $menu = $('#menu'),
			$menulink = $('.menu-link');

		// Toggle menu active state
		$menulink.click(function() {
			$menulink.toggleClass('active');
			$menu.toggleClass('active');
			return false;
		});

	// Smooth scroll function for anchor links
	$('.main-menu a, .scroll-to-section a').on('click', function(event) {
		var target = $(this.hash);
		
		if (target.length) { // Ensure the target exists
			event.preventDefault();
			$('html, body').animate({
				scrollTop: target.offset().top - 80 // Adjust this number if you need different offset for header space
			}, 800, function(){
				// Temporarily set the hash without it showing in the URL
				history.replaceState(null, null, ' '); // Remove the hash from the URL
			});
		} else {
			// Handle cases where the target does not exist (optional)
			console.warn("Target section not found:", this.hash);
		}
	});

		// Initialize Owl Carousel
		$('.owl-carousel').owlCarousel({
			loop: true,
			margin: 30,
			nav: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplayHoverPause: true,
			responsive: {
				0: { items: 1 },
				550: { items: 2 },
				750: { items: 3 },
				1000: { items: 4 },
				1200: { items: 5 }
			}
		});

		// Slick Slider initialization
		$(".Modern-Slider").slick({
			autoplay: true,
			autoplaySpeed: 10000,
			speed: 600,
			slidesToShow: 1,
			slidesToScroll: 1,
			pauseOnHover: false,
			dots: true,
			pauseOnDotsHover: true,
			cssEase: 'fade',
			draggable: false,
			prevArrow: '<button class="PrevArrow"></button>',
			nextArrow: '<button class="NextArrow"></button>'
		});

		// Features hover effect
		$("div.features-post").hover(
			function() {
				$(this).find("div.content-hide").slideToggle("medium");
			},
			function() {
				$(this).find("div.content-hide").slideToggle("medium");
			}
		);

		// Initialize Tabs
		$("#tabs").tabs();

		// Clock countdown logic
		(function initClock() {
			function getTimeRemaining(endtime) {
				var t = Date.parse(endtime) - Date.parse(new Date());
				var seconds = Math.floor((t / 1000) % 60);
				var minutes = Math.floor((t / 1000 / 60) % 60);
				var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
				var days = Math.floor(t / (1000 * 60 * 60 * 24));
				return {
					'total': t,
					'days': days,
					'hours': hours,
					'minutes': minutes,
					'seconds': seconds
				};
			}

			function initializeClock(endtime) {
				var timeinterval = setInterval(function() {
					var t = getTimeRemaining(endtime);

					// Only update the DOM if the elements exist
					if (document.querySelector(".days > .value")) {
						document.querySelector(".days > .value").innerText = t.days;
					}
					if (document.querySelector(".hours > .value")) {
						document.querySelector(".hours > .value").innerText = t.hours;
					}
					if (document.querySelector(".minutes > .value")) {
						document.querySelector(".minutes > .value").innerText = t.minutes;
					}
					if (document.querySelector(".seconds > .value")) {
						document.querySelector(".seconds > .value").innerText = t.seconds;
					}

					if (t.total <= 0) {
						clearInterval(timeinterval);
					}
				}, 1000);
			}

			// Start the clock with next year's date
			var nextYear = new Date().getFullYear() + 1;
			initializeClock(nextYear + "/1/1");
		})();
	});
})(jQuery);