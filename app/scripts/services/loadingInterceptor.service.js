/**
 * Created by Nvidia on 2018-05-07.
 */
'use strict'

app.service('LoadingInterceptor', ['$q', '$rootScope', '$log',
    function ($q, $rootScope, $log) {
        'use strict';

        var xhrCreations = 0;
        var xhrResolutions = 0;

        function isLoading() {
            return xhrResolutions < xhrCreations;
        }

        function updateStatus() {
            $rootScope.loading = isLoading();
        }

        return {
            request: function (config) {
                xhrCreations++;
                updateStatus();
                return config;
            },
            requestError: function (rejection) {
                xhrResolutions++;
                updateStatus();
                $log.error('Request error:', rejection);
                return $q.reject(rejection);
            },
            response: function (response) {
                xhrResolutions++;
                updateStatus();
                return response;
            },
            responseError: function (rejection) {
                xhrResolutions++;
                updateStatus();
                $log.error('Response error:', rejection);
                return $q.reject(rejection);
            }
        };
    }]);