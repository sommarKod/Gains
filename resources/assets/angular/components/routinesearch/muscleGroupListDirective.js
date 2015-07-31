gains.directive('musclegrouplist',[function () {
    return {
        templateUrl: "components/routinesearch/muscleGroupListView.html",
        link: function(scope, element, attr){
            scope.muscleGroupChoosen = function () {
                alert("hej");
            };
          }
    };
}]);
