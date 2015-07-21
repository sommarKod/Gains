// List of muscle groups present in the image:
gains.constant('renderedMuscleGroups', ["traps", "shoulders", "chest"]);

gains.directive('anatomyimage', ['$compile', function ($compile) {
    return {
        restrict: 'E',
        scope: {
            regionData: "=muscledata",
            hoverId: "=anatomyhoverid",
            searchfilter: "="
        },
        templateUrl: function(element) {
            var gender = element.context.attributes.gender.value;
            var angle = element.context.attributes.angle.value;
            return 'components/anatomy/' + gender + '_' + angle + '.html';
        },
        link: function (scope, element, attrs) {
            var regions = element[0].querySelectorAll('.muscle-group');
            angular.forEach(regions, function (path, key) {
                var regionElement = angular.element(path);
                regionElement.attr("muscleregion", "");
                regionElement.attr("region-data", "regionData");
                regionElement.attr("hover-id", "hoverId");
                regionElement.attr("searchfilter", "searchfilter");
                $compile(regionElement)(scope);
            });
        }
    };
}]);
