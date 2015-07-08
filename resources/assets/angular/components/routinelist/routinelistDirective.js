gains.directive('routinelist', function() {
  return {
    templateUrl: "components/routinelist/routinelistView.html",
    link: function(scope, element, attr){

        scope.routine = scope.routines[attr.index];
        scope.exercises = scope.routine.exercises;

        scope.onDropSuccess = function (data, evt){
            var index = scope.exercises.indexOf(data);
            console.log("drop "+index);
            console.log(evt);
            if(index === -1){
                scope.exercises.push(data);
            }
        };

        scope.onDragSuccess = function (data, evt) {
            var index = scope.exercises.indexOf(data);
            console.log("drag "+index);
            if(index > -1){
                scope.exercises.splice(index,1);
            }
        };
    }
  };
});