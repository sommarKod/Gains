angular.module('gains').directive('anatomypanel', ['$compile', 'renderedMuscleGroups', function ($compile, muscleGroups) {
    return {
        restrict: 'E',
        scope: {
            regionData: "=muscledata",
            gender: "=",
            searchfilter: "="
        },
        templateUrl: "components/anatomy/anatomyView.html",
        link: function (scope, element, attrs) {

            scope.anatomyHoverId = 'none';
        }
    };
}]);
