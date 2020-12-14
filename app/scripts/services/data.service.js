'use strict';

app.service('dataService', ['$http', function ($http) {
    this.oneContent = function (data) {
        return $http.post('./php/rest/getOneContent.php', data);
    }

    this.allFromCategory = function (data) {
        return $http.post('./php/rest/getAllFromCategory.php', data);
    }

    this.oneWithFiles = function (data) {
        return $http.post('./php/rest/getOneWithFiles.php', data);
    }

    this.categories = function (data) {
        return $http.post('./php/rest/shop/getCategories.php', data);
    }

    this.sendMail = function (data) {
        return $http.post('./php/rest/sendMail.php', data);
    }
}]);