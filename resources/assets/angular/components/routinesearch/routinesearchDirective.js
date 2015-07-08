gains.directive('routinesearch',['ApiFactory',function (mpApiFactory) {
  return {
    templateUrl: "components/routinesearch/routinesearchView.html",
    link: function(scope, element, attr){
       mpApiFactory.getExersise().success(function(data){
         scope.works = data;
       });


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
