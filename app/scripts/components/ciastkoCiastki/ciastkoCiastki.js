app.component('ciastkoCiastki', {
    templateUrl: './app/scripts/components/ciastkoCiastki/ciastkoCiastki.tmpl.html',
    bindings: {
        policyLink: '<?',
        siteId: '<?',
        lang: '<?'
    },
    controllerAs: 'vm',
    controller: 'CiastkoCiastkiCtrl',
    bindToController: true
});