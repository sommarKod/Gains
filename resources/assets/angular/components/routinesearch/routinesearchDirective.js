gains.directive('routinesearch',[function () {
  return {
    templateUrl: "components/routinesearch/routinesearchView.html",
    link: function(scope, element, attr){
      scope.columnBreak = 6; //Max number of colunms
        scope.startNewRow = function (index, count) {
          return ((index) % count) === 0;
        };

        scope.chunk = function (arr) {
          var newArr = [[],[],[],[],[],[]];
          for (var i=0; i<arr.length; i+=1) {
        //    console.log(""+i+" s"i%scope.columnBreak+" d"+arr.slice(i));
            newArr[i%scope.columnBreak].push(arr[i]);
          }
          return newArr;
        };
        scope.exercises2 = scope.chunk(scope.workoutSearchOptions.exercises);



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
    		};

    }
  };
}]);
