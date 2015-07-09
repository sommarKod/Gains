
gains.directive('routinelist' ,['ApiFactory',function (ApiFactory) {


  return {
    templateUrl: "components/routinelist/routinelistView.html",
    link: function(scope, element, attr){
    	scope.routineIndex = attr.index;
      scope.routine = scope.workoutPlan.workouts[attr.index];
      scope.exercises = scope.workoutPlan.workouts[attr.index].exercises;



        scope.dragControlListeners = {
		    accept: function (sourceItemHandleScope, destSortableScope) {
	            console.log("accept ");
            	return sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;
		    },
		    itemMoved: function (event) {
                console.log("itemMoved ");
		    	event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
                ApiFactory.updateWorkout(scope.routine);
		    	//Do what you want
			},
		    orderChanged: function(event) {
                console.log("orderChanged");
                ApiFactory.updateWorkout(scope.routine);
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
