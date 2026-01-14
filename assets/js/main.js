!(function ($) {
	"use strict";

	/* Toggle submenu align */
	function FounderoSubmenuAuto() {
		if ($('.bt-site-header .bt-container').length > 0) {
			var container = $('.bt-site-header .bt-container'),
				containerInfo = { left: container.offset().left, width: container.innerWidth() },
				contLeftPos = containerInfo.left,
				contRightPos = containerInfo.left + containerInfo.width;

			$('.children, .sub-menu').each(function () {
				var submenuInfo = { left: $(this).offset().left, width: $(this).innerWidth() },
					smLeftPos = submenuInfo.left,
					smRightPos = submenuInfo.left + submenuInfo.width;

				if (smLeftPos <= contLeftPos) {
					$(this).addClass('bt-align-left');
				}

				if (smRightPos >= contRightPos) {
					$(this).addClass('bt-align-right');
				}

			});
		}
	}

	/* Toggle menu mobile */
	function FounderoToggleMenuMobile() {
		$('.bt-site-header .bt-menu-toggle').on('click', function (e) {
			e.preventDefault();

			if ($(this).hasClass('bt-menu-open')) {
				$(this).addClass('bt-is-hidden');
				$('.bt-site-header .bt-primary-menu').addClass('bt-is-active');
			} else {
				$('.bt-menu-open').removeClass('bt-is-hidden');
				$('.bt-site-header .bt-primary-menu').removeClass('bt-is-active');
			}
		});
	}

	/* Toggle sub menu mobile */
	function FounderoToggleSubMenuMobile() {
		var hasChildren = $('.bt-site-header .page_item_has_children, .bt-site-header .menu-item-has-children');

		hasChildren.each(function () {
			var $btnToggle = $('<div class="bt-toggle-icon"></div>');

			$(this).append($btnToggle);

			$btnToggle.on('click', function (e) {
				e.preventDefault();
				$(this).toggleClass('bt-is-active');
				$(this).parent().children('ul').toggle();
			});
		});
	}

	/* Validation form comment */
	function FounderoCommentValidation() {
		if ($('#bt_comment_form').length) {
			jQuery('#bt_comment_form').validate({
				rules: {
					author: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					comment: {
						required: true,
						minlength: 20
					}
				},
				errorElement: "div",
				errorPlacement: function (error, element) {
					element.after(error);
				}
			});
		}
		// Check if the form reviews product
		if ($('#commentform').length) {
			jQuery('#commentform').validate({
				rules: {
					author: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					comment: {
						required: true,
						minlength: 20
					}
				},
				errorElement: "div",
				errorPlacement: function (error, element) {
					element.after(error);
				}
			});
		}
	}

	/* Copyright Current Year */
	function FounderoCopyrightCurrentYear() {
		var searchTerm = '{Year}',
			replaceWith = new Date().getFullYear();

		$('.bt-elwg-site-copyright').each(function () {
			this.innerHTML = this.innerHTML.replace(searchTerm, replaceWith);
		});
	}
	
	/* backtotop */
	function FounderoBackToTop() {
		const $backToTop = $('.bt-back-to-top');
		if ($backToTop.length > 0) {
			$(window).on('scroll', function () {
				if ($(this).scrollTop() > 300) {
					$backToTop.addClass('show');
				} else {
					$backToTop.removeClass('show');
				}
			});

			$backToTop.on('click', function (e) {
				e.preventDefault();
				$('html, body').animate({ scrollTop: 0 }, 500);
			});
		}
	}

	/* Close Elementor Popup */
	function FounderoClosePopup() {
		$(document).on('click', '.bt-icon-close', function (e) {
			e.preventDefault();
			
			// Try Elementor Pro popup API first
			if (typeof elementorProFrontend !== 'undefined' && elementorProFrontend.modules && elementorProFrontend.modules.popup) {
				// Find the popup element
				var $popup = $(this).closest('[data-elementor-type="popup"]');
				if ($popup.length > 0) {
					var popupID = $popup.data('elementorId');
					if (popupID && elementorFrontend.documentsManager && elementorFrontend.documentsManager.documents[popupID]) {
						elementorFrontend.documentsManager.documents[popupID].getModal().hide();
						return;
					}
				}
			}
			
			// Fallback: find and close modal manually
			var $modal = $(this).closest('.elementor-popup-modal, .dialog-widget-content');
			if ($modal.length > 0) {
				$modal.fadeOut(300, function() {
					$modal.parent().removeClass('elementor-editor-popup-active');
				});
			}
			
			// Also try to close any open dialog
			if (typeof elementorFrontend !== 'undefined' && elementorFrontend.hooks) {
				elementorFrontend.hooks.doAction('popup/close');
			}
		});
	}

	jQuery(document).ready(function ($) {
		FounderoSubmenuAuto();
		FounderoToggleMenuMobile();
		FounderoToggleSubMenuMobile();
		FounderoCommentValidation();
		FounderoCopyrightCurrentYear();
		FounderoBackToTop();
		FounderoClosePopup();

	});
	
	jQuery(window).on('resize', function () {
		FounderoSubmenuAuto();
		
	});
	
	jQuery(window).on('scroll', function () {

	});



})(jQuery);
