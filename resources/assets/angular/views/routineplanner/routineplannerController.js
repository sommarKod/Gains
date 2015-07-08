
gains.controller('RoutinePlannerController',['$location','ApiFactory','$scope',function($location,APIFactory,$scope) {
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
            $scope.workoutSearches = [{"exercises":data}];
         	console.log(data);
    	}
    );


}]);
  //temporary
