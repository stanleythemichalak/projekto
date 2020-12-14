'use strict'

app.directive('equalizeBackground', ['$timeout', function($timeout) {

    function link() {
        console.log('equalize');
        $timeout(function(){
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
        });

    }

    return {
        restrict: 'A',
        link: link
    };
}]);