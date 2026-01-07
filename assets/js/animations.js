!(function ($) {
	"use strict";

    function FounderoAnimations() {
        const headings = gsap.utils.toArray(".elementor-heading-title");
        
        headings.forEach(heading => {
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
        });
        
    }
	

	jQuery(document).ready(function ($) {
        FounderoAnimations();
	});
	
	jQuery(window).on('resize', function () {
		
		
	});
	
	jQuery(window).on('scroll', function () {

	});



})(jQuery);
