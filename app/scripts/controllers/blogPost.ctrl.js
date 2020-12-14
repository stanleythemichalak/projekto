'use strict'

app.controller('BlogPostCtrl', function ($routeParams, dataService, $q) {

    var vm = this
    $q.all([dataService.oneWithFiles({ id: $routeParams.id }), dataService.allFromCategory({
        id: 5,
        sort: 'old'
    })]).then(function (res) {
        vm.page = res[0].data[0];
        vm.icons = res[1].data
    });
});