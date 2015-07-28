gains.directive('routinelist', ['ApiFactory', '$timeout', function (ApiFactory, $timeout) {


    return {
        templateUrl: "components/routinelist/routinelistView.html",
        link: function(scope, element, attr){
            scope.noEdit = true;
            scope.routineIndex = attr.index;
            scope.routine = scope.workoutPlan.workouts[attr.index];
            scope.exercises = scope.workoutPlan.workouts[attr.index].exercises;

            scope.$watch(
                function(scope) { return scope.exercises; },
                function(){
                    ApiFactory.updateWorkout(scope.routine);
                    scope.updateTotalIntensity();
                },true
            );

            scope.dragExerciseControlListeners = {
                accept: function (sourceItemHandleScope, destSortableScope) {
                    if (sourceItemHandleScope.itemScope.exercise === undefined) {
                        return false;
                    }
                    else if(sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id){
                        return true;
                    }
                    return !destSortableScope.modelValue.some(function(e){
                        // Workouts arent valid for drag'n'drop here, so return false on invalid scope
                        return e.id === sourceItemHandleScope.itemScope.exercise.id;
                    });
                },
                itemMoved: function (event) {
                  if(event.dest.sortableScope.$parent.$parent!= event.source.sortableScope.$parent.$parent){
                    event.dest.sortableScope.removeItem(event.dest.index);
                  }
                },
                orderChanged: function(event) {
                },
                additionalPlaceholderClass: 'as-sortable-placeholder-exercise'
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


            scope.removeExercise = function(index){
                scope.exercises.splice(index,1);
            };

            scope.removeRoutine = function(index){
                ApiFactory.updateWorkoutPlan(scope.workoutPlan);
                ApiFactory.deleteWorkout(scope.routine);
                scope.workoutPlan.workouts.splice(index,1);
                scope.updateTotalIntensity();
            };
        }
    };
}]);
