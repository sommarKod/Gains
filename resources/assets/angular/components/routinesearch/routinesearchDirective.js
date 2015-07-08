gains.directive('routinesearch',['ApiFactory',function (mpApiFactory) {
  return {
    templateUrl: "components/routinesearch/routinesearchView.html",
    link: function(scope, element, attr){
       mpApiFactory.getExersise().success(function(data){
         scope.works = data;
       });

       scope.dragControlListeners = {
		    accept: function (sourceItemHandleScope, destSortableScope) {
	            //console.log("accept "+sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id);
            	return sourceItemHandleScope.itemScope.sortableScope.$id === destSortableScope.$id;
		    },
		    itemMoved: function (event) {
		    	console.log(event.dest.sortableScope.$parent.column.name);
		    	event.source.itemScope.modelValue.status = event.dest.sortableScope.$parent.column.name;
		    	//Do what you want
			},
		    orderChanged: function(event) {
		    	//Do what you want
			},
		    containment: '#search'//optional param.
		};
    }
  };
}]);
