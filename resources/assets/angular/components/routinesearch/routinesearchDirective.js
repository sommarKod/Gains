gains.directive('routinesearch', function () {
  return {
    templateUrl: "components/routinesearch/routinesearchView.html",
    link: function(scope, element, attr){
        scope.works = [{"name":'1', "description":'555-1276'},
                             {"name":'2', "description":'800-BIG-MARY'},
                             {"name":'3', "description":'555-4321'},
                             {"name":'4', "description":'555-5678'},
                             {"name":'5', "description":'555-8765'},
                             {"name":'6', "description":'555-5678'},
                             {"name":'7', "description":'555-1276'},
                             {"name":'8', "description":'800-BIG-MARY'},
                             {"name":'9', "description":'555-4321'},
                             {"name":'10', "description":'555-5678'},
                              {"name":'11', "description":'555-8765'},
                              {"name":'12', "description":'555-5678'}];

    }
  };
 });
