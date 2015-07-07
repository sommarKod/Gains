gains.factory('mpApiFactory', ['$http', function($http) {

    'use strict';
    var apiRoute = "http://localhost:8000";

    return {
        getMuscles: function () {
            return $http.get(apiRoute + '/getMuscles').
                success(function (data, status, headers, config) {
                    return data;
                }).
                error(function (data, status, headers, config) {
                    // log error
                    return false;
                });
        },
        getExersise: function () {
            return $http.get(apiRoute + '/exercise').
            success(function (data, status, headers, config) {
                return data;
            }).
                error(function (data, status, headers, config) {
                    // log error
                    return false;
                });
        },
        getWorkoutPlan: function (id) {
            return $http.get(apiRoute + '/workoutPlan/'+id).
                success(function (data, status, headers, config) {
                    return data;
                }).
                error(function (data, status, headers, config) {
                    // log error
                    return false;
                });
        },
        getWorkoutPlans: function () {
            return $http.get(apiRoute + '/workoutPlan').
                success(function (data, status, headers, config) {
                    return data;
                }).
                error(function (data, status, headers, config) {
                    // log error
                    return false;
                });
        }
    };

}]);
