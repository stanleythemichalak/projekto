'use strict'

app.directive('masonryInit', ['$timeout', '$element', function($timeout, $element) {

    function link() {
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
    }

    return {
        restrict: 'A',
        link: link
    };
}]);