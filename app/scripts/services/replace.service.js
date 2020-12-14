'use strict';

app.filter('replace', [function () {
    return function (input, from, to) {
        if (typeof (input) === undefined) {
            return;
        }
        var regex = new RegExp(from, 'g');
        return input && input.replace(regex, to);
    };
}]);