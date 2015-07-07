angular.module('gains').directive('anatomyimage', ['$compile', function ($compile) {
    return {
        restrict: 'E',
        templateUrl: 'components/anatomy/man_front.html',
        link: function (scope, element, attrs) {
            var regions = element[0].querySelectorAll('.muscle-group');
            angular.forEach(regions, function (path, key) {
                var regionElement = angular.element(path);
                regionElement.attr("muscleregion", "");
                regionElement.attr("dummy-data", "dummyData");
                $compile(regionElement)(scope);
            });
        }
    };
}]);

angular.module('gains').directive('muscleregion', ['$compile', function ($compile) {
    return {
        restrict: 'A',
        scope: {
            dummyData: "="
        },
        link: function (scope, element, attrs) {
            scope.elementId = element.attr("id");
            scope.regionClick = function () {
                alert(scope.elementId + ":" + scope.dummyData[scope.elementId].value);
            };
            element.attr("ng-click", "regionClick()");
            element.attr("ng-attr-fill", "{{dummyData[elementId].value | map_intensity_colour}}");
            element.removeAttr("muscleregion");
            $compile(element)(scope);
        }
    };
}]);

angular.module('gains').filter('map_intensity_colour', [function () {
    return function (input) {
        var r = 255;
        var b = 255;
        var g = 255;
        if (input < 25) { // 00 00 FF -> 00 FF FF
            r = 0;
            b = Math.floor(input * 4 * 2.55); // [0->25] * 4 * 2.55 = 0 -> 255
        } else if (input < 50) { // 00 FF FF -> 00 FF 00
            r = 0;
            g = 255 - Math.floor((input - 25) * 4 * 2.55); // ([25->50] - 25) * 4 * 2.55 = 0 -> 255
        } else if (input < 75) { // 00 FF 00 -> FF FF 00
            g = 0;
            r = Math.floor((input - 50) * 4 * 2.55); // ([50->75] - 50) * 4 * 2.55 = 0 -> 255
        } else { // FF FF 00 -> FF 00 00
            g = 0;
            b = 255 - Math.floor((input - 75) * 4 * 2.55); // ([25->75] - 25) * 4 * 2.55 = 0 -> 255
        }
        console.log(input);
        console.log(r);
        console.log(g);
        console.log(b);
        return "rgba(" + r + "," + g + "," + b + ",1)";
    };
}]);
