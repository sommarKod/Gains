
gains.config(
function($routeProvider) {
  $routeProvider
      .when('/', {
      controller:'RoutinePlannerController as routinePlanner',
      templateUrl:'views/routineplanner/routineplannerView.html'
    })
    .otherwise({
      redirectTo:'/'
    });
});
