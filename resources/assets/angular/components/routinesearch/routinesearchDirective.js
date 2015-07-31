gains.directive('routinesearch',["$filter",function ($filter) {
    return {
        templateUrl: "components/routinesearch/routinesearchView.html",
        link: function(scope, element, attr){
            console.log("scope.workoutSearchOptions");
            console.log(scope.workoutSearchOptions);
            scope.columnBreak = 6; //Max number of colunms
            scope.startNewRow = function (index, count) {
                return ((index) % count) === 0;
            };

            function chunk(arr) {
                var newArr = [[],[],[],[],[],[]];
                for (var i=0; i<arr.length; i+=1) {
                    newArr[i%scope.columnBreak].push(arr[i]);
                }
                return newArr;
            }
            scope.doSearchaaa="aaa";
            scope.exercises2 = chunk(scope.workoutSearchOptions.exercises);
            scope.dosearch = function(){
                console.log("doSearch");
                console.log(scope.queryText);

                var resultAfter=$filter('filter')(scope.workoutSearchOptions.exercises, scope.queryText);


                /*_.each(scope.workoutSearchOptions.exercises,function(input){
                    if(scope.query!==""){
                        queryText
                        console.log(input);
                    }
                });*/

                scope.exercises2 = chunk(resultAfter);

            };


            scope.dragExerciseControlListeners = {
                accept: function (sourceItemHandleScope, destSortableScope, destItemScope) {
                    if (sourceItemHandleScope.itemScope.exercise === undefined) {
                        return false;
                    }
                    else if(sourceItemHandleScope.$parent.$parent.$parent.$parent.$id === destSortableScope.$parent.$parent.$id){
                        return destSortableScope.modelValue.some(function(e){
                            // Workouts arent valid for drag'n'drop here, so return false on invalid scope
                            return e.id === sourceItemHandleScope.itemScope.exercise.id;
                        });
                    }else{
                        return true;
                    }

                    //return false;
                },
                itemMoved: function (eventObj) {
                    if(eventObj.dest.sortableScope.$parent.$parent === eventObj.source.sortableScope.$parent.$parent){
                        eventObj.dest.sortableScope.removeItem(eventObj.dest.index);
                    }
                    eventObj.source.itemScope.sortableScope.insertItem(eventObj.source.index, jQuery.extend(true, {}, eventObj.source.itemScope.exercise));
                },
                orderChanged: function(event) {
                    //	eventObj.source.itemScope.sortableScope.insertItem(eventObj.source.index, jQuery.extend(true, {}, eventObj.source.itemScope.exercise));
                },
                additionalPlaceholderClass: 'as-sortable-placeholder-exercise'
            };
            console.log(scope);

        }
    };
}]);
