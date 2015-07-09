
gains.controller('RoutinePlannerController',['$location','ApiFactory','$scope','$window',function($location,APIFactory,$scope,$window) {
    var searchObject = $location.search();
    $scope.board=searchObject.board;
    if($scope.board === undefined){
        APIFactory.createWorkoutPlan().success(
            function(data){
                console.log(data);
                $scope.workoutPlan=data;
            }
        );
    }
    APIFactory.getWorkoutPlan($scope.board).success(
        function(data){
            $scope.workoutPlan=data;
        }
    );
    APIFactory.getExercisesWithInfo().success(
    	function(data){
            $scope.workoutSearchOptions = {"exercises":data};
    	}
    );
    $scope.dragWorkoutControlListeners = {
        accept: function (sourceItemHandleScope, destSortableScope) {
            return sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;
        },
        itemMoved: function (event) {
            //event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
            //Do what you want
        },
        orderChanged: function(event) {
            APIFactory.updateWorkoutPlan($scope.workoutPlan);
        },
        containment: '#planner'//optional param.
    };

    var w = angular.element(window);
    $scope.getHeight = function() {
      return w.height();
    };

    $scope.getWidth = function() {
      return w.width();
    };

    $scope.$watch($scope.getHeight, function(newValue, oldValue) {
      $scope.windowHeight = newValue;
      $scope.style = function() {
        return {
          height: newValue + 'px',
          width: $scope.windowWidth + 'px'
        };
      };
    });

    $scope.$watch($scope.getWidth, function(newValue, oldValue) {
      $scope.windowWidth = newValue;
      $scope.style = function() {
        return {
          height: $scope.windowHeight + 'px',
          width: newValue + 'px'
        };
      };
    });

    w.bind('resize', function () {
      $scope.$apply();
    });
}]);
