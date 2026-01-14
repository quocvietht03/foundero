(function ($) {
	/**
	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	**/

	/* Submenu toggle */
	const FounderoMobileMenuHandler = function ($scope, $) {
		var hasChildren = $scope.find('.menu-item-has-children');

		hasChildren.each(function () {
			var $btnToggle = $('<span class="bt-toggle-icon"></span>');

			$(this).append($btnToggle);

			$btnToggle.on('click', function (e) {
				e.preventDefault();

				if ($(this).parent().hasClass('bt-is-active')) {
					$(this).parent().removeClass('bt-is-active');
					$(this).parent().children('ul').slideUp();
				} else {
					$(this).parent().addClass('bt-is-active');
					$(this).parent().children('ul').slideDown();
					$(this).parent().siblings().removeClass('bt-is-active').children('ul').slideUp();
					$(this).parent().siblings().find('li').removeClass('bt-is-active').children('ul').slideUp();
				}
			});
		});
	}

	const FounderoAnimations = function ($scope, $) {
		var heading = $scope.find(".elementor-heading-title");
		let split = SplitText.create(heading, { type: "words", aria: "hidden" });

		gsap.from(split.words, {
			opacity: 0,
			duration: 2,
			ease: "sine.out",
			stagger: 0.1,
			scrollTrigger: {
				trigger: heading,
				scrub: true
			}
		});
	}


	const FounderoMenuBusinessHandler = function ($scope, $) {
		var $menuItems = $scope.find('.bt-menu-business--item');
		var $contentItems = $scope.find('.bt-menu-business--content');
		var $button = $scope.find('.bt-menu-business--button');

		// Function to animate button - hide then show again
		function animateButton() {
			if ($button.length > 0) {
				// Hide button first
				$button.removeClass('show-in');
				// Wait for hide animation to complete (300ms transition) then show again
				setTimeout(function () {
					// Force reflow to reset animation
					void $button[0].offsetHeight;
					// Show button again
					$button.addClass('show-in');
				}, 350);
			}
		}

		// Initialize: ensure first item is active
		if ($menuItems.length > 0 && $contentItems.length > 0) {
			$menuItems.first().addClass('active');
			$contentItems.first().addClass('active');

			// Set initial state for menu items
			gsap.set($menuItems.toArray(), {
				opacity: 0,
				scale: 0.5,
				rotation: -15,
				x: 80,
				y: -50,
				filter: "blur(10px)"
			});

			// Show menu items with impressive GSAP animation - dramatic entrance with scale, rotation, and blur
			gsap.to($menuItems.toArray(), {
				opacity: 1,
				scale: 1,
				rotation: 0,
				x: 0,
				y: 0,
				filter: "blur(0px)",
				duration: 1.2,
				ease: "back.out(1.7)",
				stagger: {
					amount: 0.4,
					from: "start"
				},
				delay: 0.3
			});

			// Show button with animation (after menu items finish animating)
			if ($button.length > 0) {
				setTimeout(function () {
					$button.addClass('show-in');
				}, 300 + ($menuItems.length * 100) + 400);
			}

			// Trigger animation for first content
			setTimeout(function () {
				$contentItems.first().find('.bt-menu-business--content-text-item').addClass('animate-in');
				$contentItems.first().find('.bt-menu-business--content-gallery-item').addClass('animate-in');
			}, 50);
		}

		$menuItems.on('mouseenter', function () {
			var $this = $(this);
			var index = $this.data('index');
			var $targetContent = $contentItems.filter('[data-index="' + index + '"]');
			var $currentContent = $contentItems.filter('.active');
			var isAlreadyActive = $this.hasClass('active') && $currentContent.is($targetContent);
			// If hovering on already active item, only animate button and return
			if (isAlreadyActive) {
				return;
			}
			// Always animate button when hovering (even if item is already active)
			animateButton();



			// Fade out current content
			if ($currentContent.length > 0 && !$currentContent.is($targetContent)) {
				$currentContent.removeClass('active');
				$currentContent.find('.bt-menu-business--content-text-item').removeClass('animate-in');
				$currentContent.find('.bt-menu-business--content-gallery-item').removeClass('animate-in');
			}

			// Remove active class from all items
			$menuItems.removeClass('active');

			// Add active class to hovered item
			$this.addClass('active');

			// Show new content
			$targetContent.addClass('active');

			// Trigger animation for text items and gallery items
			setTimeout(function () {
				$targetContent.find('.bt-menu-business--content-text-item').addClass('animate-in');
				$targetContent.find('.bt-menu-business--content-gallery-item').addClass('animate-in');
			}, 50);
		});

		// Keep first item active by default if no hover
		$scope.on('mouseleave', function () {
			var $currentContent = $contentItems.filter('.active');
			var $firstContent = $contentItems.first();

			if (!$currentContent.is($firstContent)) {
				// Hide current
				$currentContent.removeClass('active');
				$currentContent.find('.bt-menu-business--content-text-item').removeClass('animate-in');
				$currentContent.find('.bt-menu-business--content-gallery-item').removeClass('animate-in');

				// Show first
				$menuItems.removeClass('active');
				$menuItems.first().addClass('active');
				$firstContent.addClass('active');

				// Trigger animation for first content
				setTimeout(function () {
					$firstContent.find('.bt-menu-business--content-text-item').addClass('animate-in');
					$firstContent.find('.bt-menu-business--content-gallery-item').addClass('animate-in');
				}, 50);
			}
		});
	}

	// Make sure you run this code under Elementor.
	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/bt-mobile-menu.default', FounderoMobileMenuHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/heading.default', FounderoAnimations);
		elementorFrontend.hooks.addAction('frontend/element_ready/bt-menu-business.default', FounderoMenuBusinessHandler);

	});

})(jQuery);
