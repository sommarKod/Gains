angular.module('gains').directive('anatomypanel', ['$compile', function ($compile) {
    return {
        restrict: 'E',
        scope: {
            regionData: "=muscledata",
            gender: "="
        },
        templateUrl: "components/anatomy/anatomyView.html",
        link: function (scope, element, attrs) {
            var muscleRegions = ["traps", "delts", "pecs"];
            scope.createDummyData = function () {
                var temp = {};
                angular.forEach(muscleRegions, function (region, key) {
                    temp[region] = {value: Math.random() * 100};
                });
                scope.regionDataMale = temp;

                var temp2 = {};
                angular.forEach(muscleRegions, function (region, key) {
                    temp2[region] = {value: Math.random() * 100};
                });
                scope.regionDataFemale = temp2;

                scope.anatomyHoverId = 'none';
            };
            scope.createDummyData();
        }
    };
}]);
