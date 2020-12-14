'use strict'

app.controller('HomePageCtrl', function ($timeout, $http, $sce, dataService, $q, $scope) {

    var vm = this,
        site = {
            id: 1
        },
        pricing = {
            id: 3,
            sort: 'old'
        },
        icons = {
            id: 5,
            sort: 'old'
        }

    $q.all([dataService.allFromCategory(site), dataService.allFromCategory(pricing), dataService.allFromCategory(icons)]).then(function (res) {
        vm.banner = res[0].data[5];
        vm.about = res[0].data[4];
        vm.bio = res[0].data[3];
        vm.training = res[0].data[2];
        vm.time = res[0].data[1];
        vm.contact = res[0].data[0];
        vm.prices = res[1].data;
        vm.icons = res[2].data;

        $timeout(function () {
            //    allScripts();
            var mr_firstSectionHeight;

            $('.masonry').each(function () {
                var container = $(this).get(0);
                var msnry = new Masonry(container, {
                    itemSelector: '.masonry-item'
                });

                msnry.on('layoutComplete', function () {

                    mr_firstSectionHeight = $('.main-container section:nth-of-type(1)').outerHeight(true);

                    // Fix floating project filters to bottom of projects container

                    if ($('.filters.floating').length) {
                        setupFloatingProjectFilters();
                        updateFloatingFilters();
                        window.addEventListener("scroll", updateFloatingFilters, false);
                    }

                    $('.masonry').addClass('fadeIn');
                    $('.masonry-loader').addClass('fadeOut');
                    if ($('.masonryFlyIn').length) {
                        masonryFlyIn();
                    }
                });

                msnry.layout();
            });

            function masonryFlyIn() {
                var $items = $('.masonryFlyIn .masonry-item');
                var time = 0;

                $items.each(function () {
                    var item = $(this);
                    setTimeout(function () {
                        item.addClass('fadeIn');
                    }, time);
                    time += 170;
                });
            }

            $('.background-image-holder').each(function () {
                var imgSrc = $(this).children('img').attr('src');
                $(this).css('background', 'url("' + imgSrc + '")');
                $(this).children('img').hide();
                $(this).css('background-position', 'initial');
            });

            setTimeout(function () {
                $('.background-image-holder').each(function () {
                    $(this).addClass('fadeIn');
                });
            }, 200);

            // Image Sliders


            // Lightbox gallery titles

            $('.lightbox-grid li a').each(function () {
                var galleryTitle = $(this).closest('.lightbox-grid').attr('data-gallery-title');
                $(this).attr('data-lightbox', galleryTitle);
            });

            // Multipurpose Modals

            jQuery('.foundry_modal[modal-link]').remove();

            if ($('.foundry_modal').length && (!jQuery('.modal-screen').length)) {
                // Add a div.modal-screen if there isn't already one there.
                var modalScreen = jQuery('<div />').addClass('modal-screen').appendTo('body');

            }

            jQuery('.foundry_modal').click(function () {
                jQuery(this).addClass('modal-acknowledged');
            });

            jQuery(document).on('wheel mousewheel scroll', '.foundry_modal, .modal-screen', function (evt) {
                $(this).get(0).scrollTop += (evt.originalEvent.deltaY);
                return false;
            });

            $('.modal-container:not([modal-link])').each(function (index) {
                if (jQuery(this).find('iframe[src]').length) {
                    jQuery(this).find('.foundry_modal').addClass('iframe-modal');
                    var iframe = jQuery(this).find('iframe');
                    iframe.attr('data-src', iframe.attr('src'));
                    iframe.attr('src', '');

                }
                jQuery(this).find('.btn-modal').attr('modal-link', index);

                // Only clone and append to body if there isn't already one there
                if (!jQuery('.foundry_modal[modal-link="' + index + '"]').length) {
                    jQuery(this).find('.foundry_modal').clone().appendTo('body').attr('modal-link', index).prepend(jQuery('<i class="ti-close close-modal">'));
                }
            });

            $('.btn-modal').unbind('click').click(function () {
                var linkedModal = jQuery('.foundry_modal[modal-link="' + jQuery(this).attr('modal-link') + '"]'),
                    autoplayMsg = "";
                jQuery('.modal-screen').toggleClass('reveal-modal');
                if (linkedModal.find('iframe').length) {
                    if (linkedModal.find('iframe').attr('data-autoplay') === '1') {
                        var autoplayMsg = '&autoplay=1'
                    }
                    linkedModal.find('iframe').attr('src', (linkedModal.find('iframe').attr('data-src') + autoplayMsg));
                }
                if (linkedModal.find('video').length) {
                    linkedModal.find('video').get(0).play();
                }
                linkedModal.toggleClass('reveal-modal');
                return false;
            });

            // Autoshow modals

            $('.foundry_modal[data-time-delay]').each(function () {
                var modal = $(this);
                var delay = modal.attr('data-time-delay');
                modal.prepend($('<i class="ti-close close-modal">'));
                if (typeof modal.attr('data-cookie') != "undefined") {
                    if (!mr_cookies.hasItem(modal.attr('data-cookie'))) {
                        setTimeout(function () {
                            modal.addClass('reveal-modal');
                            $('.modal-screen').addClass('reveal-modal');
                        }, delay);
                    }
                } else {
                    setTimeout(function () {
                        modal.addClass('reveal-modal');
                        $('.modal-screen').addClass('reveal-modal');
                    }, delay);
                }
            });

            // Exit modals
            $('.foundry_modal[data-show-on-exit]').each(function () {
                var modal = $(this);
                var exitSelector = $(modal.attr('data-show-on-exit'));
                // If a valid selector is found, attach leave event to show modal.
                if ($(exitSelector).length) {
                    modal.prepend($('<i class="ti-close close-modal">'));
                    $(document).on('mouseleave', exitSelector, function () {
                        if (!$('body .reveal-modal').length) {
                            if (typeof modal.attr('data-cookie') !== typeof undefined) {
                                if (!mr_cookies.hasItem(modal.attr('data-cookie'))) {
                                    modal.addClass('reveal-modal');
                                    $('.modal-screen').addClass('reveal-modal');
                                }
                            } else {
                                modal.addClass('reveal-modal');
                                $('.modal-screen').addClass('reveal-modal');
                            }
                        }
                    });
                }
            });

            // Autoclose modals

            $('.foundry_modal[data-hide-after]').each(function () {
                var modal = $(this);
                var delay = modal.attr('data-hide-after');
                if (typeof modal.attr('data-cookie') != "undefined") {
                    if (!mr_cookies.hasItem(modal.attr('data-cookie'))) {
                        setTimeout(function () {
                            if (!modal.hasClass('modal-acknowledged')) {
                                modal.removeClass('reveal-modal');
                                $('.modal-screen').removeClass('reveal-modal');
                            }
                        }, delay);
                    }
                } else {
                    setTimeout(function () {
                        if (!modal.hasClass('modal-acknowledged')) {
                            modal.removeClass('reveal-modal');
                            $('.modal-screen').removeClass('reveal-modal');
                        }
                    }, delay);
                }
            });

            jQuery('.close-modal:not(.modal-strip .close-modal)').unbind('click').click(function () {
                var modal = jQuery(this).closest('.foundry_modal');
                modal.toggleClass('reveal-modal');
                if (typeof modal.attr('data-cookie') !== "undefined") {
                    mr_cookies.setItem(modal.attr('data-cookie'), "true", Infinity);
                }
                if (modal.find('iframe').length) {
                    modal.find('iframe').attr('src', '');
                }
                jQuery('.modal-screen').removeClass('reveal-modal');
            });

            jQuery('.modal-screen').unbind('click').click(function () {
                if (jQuery('.foundry_modal.reveal-modal').find('iframe').length) {
                    jQuery('.foundry_modal.reveal-modal').find('iframe').attr('src', '');
                }
                jQuery('.foundry_modal.reveal-modal').toggleClass('reveal-modal');
                jQuery(this).toggleClass('reveal-modal');
            });

            jQuery(document).keyup(function (e) {
                if (e.keyCode == 27) { // escape key maps to keycode `27`
                    if (jQuery('.foundry_modal').find('iframe').length) {
                        jQuery('.foundry_modal').find('iframe').attr('src', '');
                    }
                    jQuery('.foundry_modal').removeClass('reveal-modal');
                    jQuery('.modal-screen').removeClass('reveal-modal');
                }
            });

            // Modal Strips

            jQuery('.modal-strip').each(function () {
                if (!jQuery(this).find('.close-modal').length) {
                    jQuery(this).append(jQuery('<i class="ti-close close-modal">'));
                }
                var modal = jQuery(this);

                if (typeof modal.attr('data-cookie') != "undefined") {

                    if (!mr_cookies.hasItem(modal.attr('data-cookie'))) {
                        setTimeout(function () {
                            modal.addClass('reveal-modal');
                        }, 1000);
                    }
                } else {
                    setTimeout(function () {
                        modal.addClass('reveal-modal');
                    }, 1000);
                }
            });

            jQuery('.modal-strip .close-modal').click(function () {
                var modal = jQuery(this).closest('.modal-strip');
                if (typeof modal.attr('data-cookie') != "undefined") {
                    mr_cookies.setItem(modal.attr('data-cookie'), "true", Infinity);
                }
                jQuery(this).closest('.modal-strip').removeClass('reveal-modal');
                return false;
            });

        });
    });
});