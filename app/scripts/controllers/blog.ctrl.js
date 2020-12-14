'use strict'

app.controller('BlogCtrl', function ($timeout, $http, $sce, dataService, $q, $scope) {

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
        });
    });
});