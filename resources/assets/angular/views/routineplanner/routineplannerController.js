
gains.controller('RoutinePlannerController', function($scope) {
  //temporary
  $scope.routines = [{
  	"exercises": [
            {
                "name": "Press",
                "muscles": [
                    {
                        "name": "boobie",
                        "intensity": 100
                    }
                ],
             "description": "Good choice."
            },
            {"name": "Bench-Press2",
             "muscles": [
                {
                    "name": "boobie",
                    "intensity": 100
                }
             ],
             "description": "Good choice."
             },
            {"name": "Bench-Press1",
             "muscles": [
                {
                    "name": "boobie",
                    "intensity": 100
                }
             ],
             "description": "Good choice."
             }]
  },
  {
  	"exercises": [
    {
        "name": "pull",
        "muscles": [
            {
                "name": "backie",
                "intensity": 100
            }
        ],
     "description": "Bad choice."
    },
    {"name": "Bench-fail",
     "muscles": [
        {
            "name": "boobie",
            "intensity": 100
        }
     ],
     "description": "Good choice."
     },
    {"name": "Bench-Pull",
     "muscles": [
        {
            "name": "Backie",
            "intensity": 10
        }
     ],
     "description": "Good choice."
     }]
  }];
  $scope.testing = "hejsvejs";

  // Controller code here.
});
