'use strict'

app.controller('LoginActionsCtrl', function ($routeParams, dataService, $q, $timeout) {
    console.log($routeParams);
    var vm = this
    // $q.all([dataService.oneWithFiles({ id: $routeParams.id }), dataService.allFromCategory({
    //     id: 5,
    //     sort: 'old'
    // })]).then(function (res) {
    //     vm.page = res[0].data[0];
    //     vm.icons = res[1].data
    // });
    $timeout(function () {
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

    })
});