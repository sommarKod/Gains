gains.directive('musclegrouplist',[function () {
    return {
        templateUrl: "components/routinesearch/muscleGroupListView.html",
        link: function(scope, element, attr){
            scope.muscleGroupChoosen = function (event, musclegroup) {
                var target = $(event.target);


                if(target.hasClass("pushed-musclegroup")){
                    target.removeClass("pushed-musclegroup");
                    scope.selectedMuscleGroup = undefined;
                } else {
                    $(".pushed-musclegroup").removeClass("pushed-musclegroup");
                    $(event.target).addClass("pushed-musclegroup");
                    scope.selectedMuscleGroup = musclegroup;
                }
            };
          }
    };
}]);
