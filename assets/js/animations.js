!(function ($) {
	"use strict";

    function FounderoBlurTextAnimation() {
        const cursor = $('.gsap-backdrop-blur-cursor');
        
        if (!cursor.length) return;

		let mouseX = 0, mouseY = 0;
		let posX = 0, posY = 0;

		// Smooth follow loop
		gsap.ticker.add(() => {
			posX += (mouseX - posX) * 0.15;
			posY += (mouseY - posY) * 0.15;

			gsap.set(cursor, {
			x: posX,
			y: posY
			});
		});

		// Track mouse
		$(window).on('mousemove', e => {
			mouseX = e.clientX;
			mouseY = e.clientY;
		});

		// Hover target
		$(document).on('mouseenter', '.gsap-animation--hover, .gsap-animation--both', function () {
			gsap.to(cursor, {
				visibility: 'visible',
				scale: 1,
				duration: 0.25,
				ease: 'power2.out'
			});
		});

		$(document).on('mouseleave', '.gsap-animation--hover, .gsap-animation--both', function () {
			gsap.to(cursor, {
				visibility: 'hidden',
				scale: 0.6,
				duration: 0.25,
				ease: 'power2.out'
			});
		});
    }
	
	jQuery(document).ready(function ($) {
        FounderoBlurTextAnimation();
	});
	
	jQuery(window).on('resize', function () {
		
		
	});
	
	jQuery(window).on('scroll', function () {

	});



})(jQuery);
