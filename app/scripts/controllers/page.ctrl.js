'use strict'

app.controller('PageCtrl', function ($routeParams, dataService, $q) {
    console.log($routeParams);
    var vm = this
    $q.all([dataService.oneWithFiles({ id: $routeParams.id }), dataService.allFromCategory({
        id: 5,
        sort: 'old'
    })]).then(function (res) {
        vm.page = res[0].data[0];
        vm.icons = res[1].data
    });
});