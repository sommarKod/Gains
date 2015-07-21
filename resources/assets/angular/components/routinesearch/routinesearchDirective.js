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
        scope.exercises = scope.chunk(scope.workoutSearchOptions.exercises);
        console.log(scope.exercises);


        scope.dragExerciseControlListeners = {
  		    accept: function (sourceItemHandleScope, destSortableScope, destItemScope) {
              return false;
  		    },
  		    itemMoved: function (eventObj) {
              eventObj.source.itemScope.sortableScope.insertItem(eventObj.source.index, jQuery.extend(true, {}, eventObj.source.itemScope.exercise));
    			},
    		  orderChanged: function(event) {
    		    	//Do what you want
    			},
    		    containment: '#search'//optional param.s
    		};



    }
  };
}]);
