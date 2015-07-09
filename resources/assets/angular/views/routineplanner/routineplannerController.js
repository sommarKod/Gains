
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
            $scope.workoutSearchOptions = {"exercises":data};
         	console.log(data);
    	}
    );

    $scope.dragControlListeners = {
            accept: function (sourceItemHandleScope, destSortableScope) {
                return sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;
            },
            itemMoved: function (event) {
                //event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
                //Do what you want
                },
                orderChanged: function(event) {
                    //Do what you want
                },
                containment: '#planner'//optional param.
            };


}]);
  //temporary
