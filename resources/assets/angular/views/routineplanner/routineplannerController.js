gains.controller('RoutinePlannerController',['$location','ApiFactory','$scope','$window',function($location,APIFactory,$scope,$window) {
    var searchObject = $location.search();
    $scope.board=searchObject.board;
    APIFactory.getWorkoutPlan($scope.board).success(
        function(data){
            console.log(data);
            $scope.workoutPlan=data;
        }
    );
    APIFactory.getExersise().success(
    	function(data){
            $scope.workoutSearchOptions = {"exercises":data};
         	console.log(data);
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
      console.log(w.height());
      return w.height();
    };

    $scope.getWidth = function() {
      console.log(w.width());
      return w.width();
    };

    $scope.$watch($scope.getHeight, function(newValue, oldValue) {
      $scope.windowHeight = newValue;
      $scope.style = function() {
        console.log("height:"+ newValue + 'px');
        return {
          height: newValue + 'px',
          width: windowWidth + 'px'
        };
      };
    });
    $scope.$watch($scope.getWidth, function(newValue, oldValue) {
      $scope.windowWidth = newValue;
      $scope.style = function() {
        console.log("height:"+ newValue + 'px');
        return {
          height: $scope.windowHeight + 'px',
          width: newValue + 'px'
        };
      };
    });

    w.bind('resize', function () {
      $scope.$apply();
    });

    $scope.userGender = 'male';
}]);
