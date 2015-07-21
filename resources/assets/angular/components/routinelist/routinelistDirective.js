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
                    if(sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id){
                        return true;
                    }
                    return !destSortableScope.modelValue.some(function(e){
                        return e.id === sourceItemHandleScope.itemScope.exercise.id;
                    });
                },
                itemMoved: function (event) {
                },
                orderChanged: function(event) {
                },
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
        }
    };
}]);
