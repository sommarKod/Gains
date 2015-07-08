gains.controller('RoutinePlannerController',['$location','ApiFactory','$scope',function($location,APIFactory,$scope) {
    var searchObject = $location.search();
    $scope.board=searchObject.board;
    APIFactory.getWorkoutPlan($scope.board).success(
        function(data){
            console.log(data);
            $scope.workoutPlan=data;
        }
    );

    var muscleRegions = ["traps", "delts", "pecs"];
    $scope.createDummyData = function () {
        var temp = {};
        angular.forEach(muscleRegions, function (region, key) {
            temp[region] = {value: Math.random() * 100};
        });
        $scope.regionDataMale = temp;

        var temp2 = {};
        angular.forEach(muscleRegions, function (region, key) {
            temp2[region] = {value: Math.random() * 100};
        });
        $scope.regionDataFemale = temp2;
    };
    $scope.createDummyData();
}]);
  //temporary
