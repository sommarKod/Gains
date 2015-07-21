gains.directive('searchitem', [ function(){
  return {
    templateUrl: "components/routinesearch/exerciseitem/exerciseitemView.html",
    link: function(scope, element, attr){
        scope.listType = attr.class+"";
  /**      scope.colapse = function (index) {
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
        };**/
        scope.colapse= function(index) {
          var row = element.parent().parent().parent();
           var panels = row[0].querySelectorAll('.panel-collapse');

           angular.forEach(panels,function(path,key){
                 var panel = angular.element(path);
                 panel.collapse('hide');
           });

           var panelss = element[0].querySelectorAll('.panel-collapse');
           var elem = angular.element(panelss[0]);

           elem.collapse('show');
         };
      }
    };
}]);
