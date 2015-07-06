var gains = angular.module('gains', []);

gains.controller('routine', function ($scope) {
  $scope.exercises = [
    {'name': 'Bench Press',
     'muscles': [
     	{
	     	'name': 'boobie',
	     	'intensity': 100
     	}
     ],
     'description': 'Good choice.'
 	},
 	{'name': 'Bench Press2',
     'muscles': [
     	{
	     	'name': 'boobie',
	     	'intensity': 100
     	}
     ],
     'description': 'better choice.'
 	},
 	{'name': 'Bench Press3',
     'muscles': [
     	{
	     	'name': 'boobie',
	     	'intensity': 100
     	}
     ],
     'description': 'Best choice.'
 	}
  ];
});