gains.directive('routinesearch',[function () {
  return {
    templateUrl: "components/routinesearch/routinesearchView.html",
    link: function(scope, element, attr){
        scope.exercises = scope.workoutSearchOptions.exercises;


        scope.dragExerciseControlListeners = {
  		    accept: function (sourceItemHandleScope, destSortableScope, destItemScope) {
              return false;
  		    },
  		    itemMoved: function (eventObj) {
              console.log("Moved");
              eventObj.source.itemScope.sortableScope.insertItem(eventObj.source.index, eventObj.source.itemScope.exercise);

    		    	//event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
  		    	  //Do what you want
    			},
    		  orderChanged: function(event) {
    		    	//Do what you want
    			},
    		    containment: '#search'//optional param.
    		};

       scope.colapse= function(index) {
       //    var thi = angular.element(this);
     //      console.log(thi[0].class =='.routineexe');
           var routineexe = element[0].querySelectorAll('.exercisesearch');
           var panels = [];
           angular.forEach(routineexe,function(path,key){
             var exe = angular.element(path);
             var exercises = exe[0].querySelectorAll('.panel-collapse');
             panels.push(exercises);
           });

           angular.forEach(panels,function(path,key){
                 var panel = angular.element(path);
                 console.log(panel);
                 panel.collapse('hide');
           });

           var whospan =  angular.element(panels[index]);
           console.log(whospan);
           whospan.collapse('show');
         };
    }
  };
}]);
