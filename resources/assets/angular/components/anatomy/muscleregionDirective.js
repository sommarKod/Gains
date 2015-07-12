angular.module('gains').directive('muscleregion', ['$compile', function ($compile) {
    return {
        restrict: 'A',
        scope: {
            regionData: "=",
            hoverId: "="
        },
        link: function (scope, element, attrs) {
            scope.elementId = element.attr("id");
            scope.regionClick = function () {
                alert(scope.elementId + ":" + scope.regionData[scope.elementId].value);
            };

            scope.hoverIn = function(){
                scope.hoverId = scope.elementId;
            };
            scope.hoverOut = function(){
                scope.hoverId = 'none';
            };

            element.attr("ng-click", "regionClick()");
            element.attr("ng-mouseover", "hoverIn()");
            element.attr("ng-mouseleave", "hoverOut()");
            element.attr("ng-class", "hoverId == elementId ? 'muscle-hover' : ''");
            element.attr("ng-attr-fill", "{{regionData[elementId] | map_intensity_colour}}");
            element.removeAttr("muscleregion");
            $compile(element)(scope);
        }
    };
}]);

angular.module('gains').filter('map_intensity_colour', [function () {
    return function (input) {
        input = input / 2;
        var r = 255;
        var b = 255;
        var g = 255;
        if (input < 25) { // 00 00 FF -> 00 FF FF
            r = 0;
            g = Math.floor(input * 4 * 2.55); // [0->25] * 4 * 2.55 = 0 -> 255
        } else if (input < 50) { // 00 FF FF -> 00 FF 00
            r = 0;
            b = 255 - Math.floor((input - 25) * 4 * 2.55); // ([25->50] - 25) * 4 * 2.55 = 0 -> 255
        } else if (input < 75) { // 00 FF 00 -> FF FF 00
            b = 0;
            r = Math.floor((input - 50) * 4 * 2.55); // ([50->75] - 50) * 4 * 2.55 = 0 -> 255
        } else if (input < 100){ // FF FF 00 -> FF 00 00
            b = 0;
            g = 255 - Math.floor((input - 75) * 4 * 2.55); // ([25->75] - 25) * 4 * 2.55 = 0 -> 255
        } else {
          b = 0;
          g = 0;
          r = 255 - Math.floor((input - 100) * 4 * 2.55);
          r = Math.max(r, 0);
        }
        return "rgba(" + r + "," + g + "," + b + ",1)";
    };
}]);
