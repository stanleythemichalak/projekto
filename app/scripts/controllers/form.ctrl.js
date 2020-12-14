'use strict';

app.controller('formCtrl', function ($http, dataService) {
    var vm = this;

    vm.submitForm = function () {
        dataService.sendMail(vm.form);
        vm.hideForm = true;
    };
});