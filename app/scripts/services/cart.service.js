/**
 * Created by Nvidia on 2018-05-11.
 */
'use strict';

app.service('cartService', ['$http', 'conf', function ($http, _config) {

    /*var checkCart = function(){
        console.log(_config.cartName, localStorage.getItem(_config.cartName));
        localStorage.getItem(_config.cartName)
    }*/

    this.addItem = function (data) {
        //console.log('add item', checkCart());
        var i, inObj = false, tempObj, localCart = _config.cartName;

        if (localStorage.getItem(localCart) !== null) {
            for(i = 0; i < JSON.parse(localStorage.getItem(localCart)).length; i += 1){
                console.log(JSON.parse(localStorage.getItem(localCart))[i].data.prefix, data.prefix);
                if (JSON.parse(localStorage.getItem(localCart))[i].data.prefix === data.prefix) {
                    inObj = true;
                }
            }
        }
        if (!inObj && localStorage.getItem(localCart) === null) {
            localStorage.setItem(localCart,
                JSON.stringify([{
                    'data' : data,
                    'quantity' : 1
                }]));
        } else if (!inObj && localStorage.getItem(localCart) !== null){
            tempObj = JSON.parse(localStorage.getItem(localCart));
            tempObj.push({
                'data' : data,
                'quantity' : 1
            });

            localStorage.setItem(localCart,
                JSON.stringify(tempObj));
        }
        this.checkCart()
    }

    this.checkCart = function () {
        return JSON.parse(localStorage.getItem(_config.cartName));
    }

    this.deleteItem = function (item) {
        var tempObj;

        tempObj = JSON.parse(localStorage.getItem(_config.cartName));
        tempObj.splice(item, 1);

        localStorage.setItem(_config.cartName, JSON.stringify(tempObj));
    }

    this.deleteCart = function (data) {
        console.log('delete cart');
        localStorage.removeItem(_config.cartName);
    }
}]);