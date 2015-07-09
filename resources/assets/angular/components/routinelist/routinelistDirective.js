gains.directive('routinelist', ['ApiFactory', '$timeout', function (ApiFactory, $timeout) {


    return {
        templateUrl: "components/routinelist/routinelistView.html",
        link: function(scope, element, attr){
            scope.noEdit = true;
            scope.routineIndex = attr.index;
            scope.routine = scope.workoutPlan.workouts[attr.index];
            scope.exercises = scope.workoutPlan.workouts[attr.index].exercises;

            scope.dragExerciseControlListeners = {
                accept: function (sourceItemHandleScope, destSortableScope) {
                    for(var i = 0; i< destSortableScope.modelValue.length; i++){
                        if(destSortableScope.modelValue[i] === sourceItemHandleScope.itemScope.exercise){
                            //Do nothing
                        } else if(destSortableScope.modelValue[i].name === sourceItemHandleScope.itemScope.exercise.name){
                            return false;
                        }
                    }
                    return true;
                },
                itemMoved: function (event) {
                    event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
                    ApiFactory.updateWorkout(scope.routine);
                    //Do what you want
                },
                orderChanged: function(event) {
                    ApiFactory.updateWorkout(scope.routine);
                },
                containment: '#workout'//optional param.
            };

            scope.colapse = function (index) {
                //    var thi = angular.element(this);
                //      console.log(thi[0].class =='.routineexe');
                var routineexe = element[0].querySelectorAll('.routineexe');
                var panels = [];
                angular.forEach(routineexe, function (path, key) {
                    var exe = angular.element(path);
                    var exercises = exe[0].querySelectorAll('.panel-collapse');
                    panels.push(exercises);
                });

                angular.forEach(panels, function (path, key) {
                    var panel = angular.element(path);
                    panel.collapse('hide');
                });

                var whospan = angular.element(panels[index]);
                whospan.collapse('show');
            };
            scope.renameWorkout = function () {
                scope.tempName = scope.routine.name;
                scope.noEdit = false;
                $timeout(function(){ $(".workoutNameInputField").focus().select(); });
            };

            scope.removeFocus = function () {
                scope.noEdit = true;
            };

            scope.saveWorkoutName = function(event) {
                scope.routine.name = $(".workoutNameInputField").val();
                ApiFactory.updateWorkout(scope.routine);
                scope.noEdit = true;

            };
        }
    };
}]);
