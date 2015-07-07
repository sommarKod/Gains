gains.directive('routinelist', function() {
  return {
    templateUrl: "components/routinelist/routinelistView.html",
    link: function(scope, element, attr){
        scope.exercises = [
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
             }];
        
        scope.onDragSuccess = function (index, data, evt) {
            console.log(index);
            console.log(data);
            if(index > -1){
                var otherData = scope.exercises[index];
                var otherIndex = scope.exercises.indexOf(data);
                scope.exercises[index] = data;
                scope.exercises[otherIndex] = otherData;
            }
        };
    }
  };
});