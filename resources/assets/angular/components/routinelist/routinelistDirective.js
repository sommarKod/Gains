gains.directive('routinelist', function() {
  return {
    templateUrl: "components/routinelist/routinelistView.html",
    link: function(scope, element, attr){

    	scope.routineIndex = attr.index;
        scope.routine = scope.routines[attr.index];
        scope.exercises = scope.routine.exercises;

        scope.dragControlListeners = {
		    accept: function (sourceItemHandleScope, destSortableScope) {
		    	return sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;
		    },//override to determine drag is allowed or not. default is true.
		    itemMoved: function (event) {
		    	event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
		    	//Do what you want
			},
		    orderChanged: function(event) {
		    	//Do what you want
			},
		    containment: '#workout'//optional param.
		};

/*        scope.onDropSuccess = function (data, evt){
            var index = scope.exercises.indexOf(data);
            
            if(index === -1){
                scope.exercises.push(data);
            }
        };

        scope.onDragSuccess = function (data, evt) {
            var index = scope.exercises.indexOf(data);
            console.log("drag "+index);
            console.log(evt);
            if(index > -1){
                scope.exercises.splice(index,1);
            }
        };*/
    }
  };
});