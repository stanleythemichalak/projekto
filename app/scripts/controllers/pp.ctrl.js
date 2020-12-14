'use strict'

app.controller('PpCtrl', function (dataService, $q) {

    var vm = this,
        pp = {
            id: 4
        };

    $q.all([dataService.allFromCategory(pp)]).then(function (res) {
        vm.pp = res[0].data[0];
    });
});