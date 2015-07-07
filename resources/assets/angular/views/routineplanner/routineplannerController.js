
gains.controller('RoutinePlannerController', ['$scope', function ($scope) {
        var muscleRegions = ["traps", "delts", "pecs"];
        $scope.createDummyData = function () {
            var temp = {};
            angular.forEach(muscleRegions, function (region, key) {
                temp[region] = {value: Math.random()};
            });
            $scope.dummyData = temp;
        };
        $scope.createDummyData();
}]);
