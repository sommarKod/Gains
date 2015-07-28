
gains.config(
function($routeProvider) {
  $routeProvider
      .when('exerciseForm', {
          templateUrl:'views/exerciseForm.php'
      })
      .when('/', {
      controller:'RoutinePlannerController as routinePlanner',
      templateUrl:'views/routineplanner/routineplannerView.html'
    })
    .otherwise({
      redirectTo:'/'
    });
});
