gains.directive('routinesearch',['ApiFactory',function (mpApiFactory) {
  return {
    templateUrl: "components/routinesearch/routinesearchView.html",
    link: function(scope, element, attr){
       mpApiFactory.getExersise().success(function(data){
         scope.works = data;
       });
    }
  };
}]);
