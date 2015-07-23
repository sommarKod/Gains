gains.controller('RoutinePlannerController',['$location','ApiFactory', 'WorkoutIntensityService','$scope','$window',function($location,APIFactory,WorkoutIntensityService,$scope,$window) {
    $scope.search = {};
    $scope.search.filter = "";
    var searchObject = $location.search();
    $scope.board=searchObject.board;
    if($scope.board === undefined){
        APIFactory.createWorkoutPlan().success(
            function(data){
                $location.path("/").search({board:data.id});
            }
        );
    }

    APIFactory.getWorkoutPlan($scope.board).success(
        function(data){
            if (data.workouts === undefined)
              data.workouts = [];

            $scope.workoutPlan=data;
        }
    );
    APIFactory.getExercisesWithInfo().success(
    	function(data){
            $scope.workoutSearchOptions = {"exercises":data};
    	}
    );

    APIFactory.getMuscleGroups().success(
        function(data){
            $scope.muscleGroups=data;
            WorkoutIntensityService.setMuscleGroups(data);
            $scope.updateTotalIntensity();
        }
    );

    $scope.updateTotalIntensity = function () {
      $scope.muscleIntensityData =
        WorkoutIntensityService.getTotalIntensity($scope.workoutPlan);
    };

    $scope.addWorkout = function(){
        var workout;
        APIFactory.createNewWorkout($scope.workoutPlan).success(
          function (data) {
            workout = data;
            $scope.workoutPlan.workouts.push(workout);
            APIFactory.updateWorkoutPlan($scope.workoutPlan);
          }
        );
    };

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
            $scope.updateTotalIntensity();
        },
        additionalPlaceholderClass: 'as-sortable-placeholder-workout',
        containment: '#wrapper'//optional param.
    };

    $scope.workoutSortableOptions = { additionalPlaceholderClass: 'some-class' };

    /*
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
    });*/

    $scope.userGender = 'male';
}]);
