app.controller('CiastkoCiastkiCtrl', ['$cookies', '$element', function ($cookies, $element) {
    let vm = this;

    function hideCookie() {
        $element[0].classList.add('hidden');
    };

    vm.closeCookie = function () {
        $cookies.put(vm.siteId, true);
        hideCookie();
    };

    vm.$onInit = function () {
        if ($cookies.get(vm.siteId))
            hideCookie();
    };

}]);