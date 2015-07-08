
gains.controller('RoutinePlannerController',['$location','ApiFactory','$scope',function($location,APIFactory,$scope) {
    var searchObject = $location.search();
    $scope.board=searchObject.board;
    APIFactory.getWorkoutPlans($scope.board).success(
        function(data){
            console.log(data);
        }
    );


}]);
  //temporary
