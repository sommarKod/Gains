angular.module('gains').directive('anatomyimage', ['$compile', function ($compile) {
    return {
        restrict: 'E',
        templateUrl: 'components/anatomy/man_front.html',
        link: function (scope, element, attrs) {
            var regions = element[0].querySelectorAll('.muscle-group');
            angular.forEach(regions, function (path, key) {
                var regionElement = angular.element(path);
                regionElement.attr("muscleregion", "");
                $compile(regionElement)(scope);
            });
        }
    };
}]);

angular.module('gains').directive('muscleregion', ['$compile', function ($compile) {
    return {
        restrict: 'A',
        scope: true,
        link: function (scope, element, attrs) {
            scope.elementId = element.attr("id");
            scope.regionClick = function () {
                alert(scope.elementId);
            };
            element.attr("ng-click", "regionClick()");
            element.removeAttr("muscleregion");
            $compile(element)(scope);
        }
    };
}]);
