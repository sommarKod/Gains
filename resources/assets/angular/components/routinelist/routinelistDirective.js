gains.directive('routinelist' ,[function () {
  return {
    templateUrl: "components/routinelist/routinelistView.html",
    link: function(scope, element, attr){
    	scope.routineIndex = attr.index;
      scope.routine = scope.workoutPlan.workouts[attr.index];
      scope.exercises = scope.workoutPlan.workouts[attr.index].exercises;

        scope.dragControlListeners = {
  		    accept: function (sourceItemHandleScope, destSortableScope) {
                for(var i = 0; i< destSortableScope.modelValue.length; i++){
                  
                  if(destSortableScope.modelValue[i] === sourceItemHandleScope.itemScope.exercise){
                    console.log("same obj");
                  } else if(destSortableScope.modelValue[i].name === sourceItemHandleScope.itemScope.exercise.name){
                    console.log("same name");
                    return false;
                  }
                  //console.log(obj.name);
                  /*if(obj === sourceItemHandleScope.itemScope.exercise){
                    console.log("equals.");
                  } else if(sourceItemHandleScope.itemScope.exercise.name === obj.name) {
                    console.log("only same name");
                  }*/
                }
                
                //itemScope.exercise
                //console.log(sourceItemHandleScope.itemScope.exercise);
                return true;//sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;
  		    },
  		    itemMoved: function (event) {
		    	//event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
		    	//Do what you want
    			},
    		    orderChanged: function(event) {
    		    	//Do what you want
    			},
    		    containment: '#workout'//optional param.
    		};

     scope.colapse= function(index) {
     //    var thi = angular.element(this);
   //      console.log(thi[0].class =='.routineexe');
         var routineexe = element[0].querySelectorAll('.routineexe');
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
