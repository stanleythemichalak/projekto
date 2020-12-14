/**
 * Created by Nvidia on 2018-05-05.
 */
'use strict';

app.service('shopDataService', ['$http', function ($http) {

    this.allLatest = function (data) {
        return $http.post('./php/rest/shop/getAllLatest.php', data);
    }

    this.categoryTitle = function (data) {
        return $http.post('./php/rest/shop/getCategoryTitle.php', data);
    }

    this.colors = function (data) {
        return $http.post('./php/rest/shop/productParameters/getColors.php', data);
    }

    this.sizes = function (data) {
        return $http.post('./php/rest/shop/productParameters/getSizes.php', data);
    }

    this.shipping = function (data) {
        return $http.post('./php/rest/shop/getShipping.php', data);
    }

    this.checkCoupon = function (data) {
        return $http.post('./php/rest/shop/getCoupon.php', data);
    }
}]);