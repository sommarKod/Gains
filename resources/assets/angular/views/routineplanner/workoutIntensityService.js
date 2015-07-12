
gains.service('WorkoutIntensityService', ['renderedMuscleGroups', function(renderedMuscleGroups) {

  var muscleIntensities = {};
  var muscleGroupList;
  var calculateIntensity = function(workout) {
    muscleIntensities[workout.id] = {};
    // Add all muscle intensity data to a list for each muscle
    angular.forEach(workout.exercises, function (exercise) {
      angular.forEach(exercise.muscles, function (muscle) {
        if (muscleIntensities[workout.id][muscle.id] === undefined) {
          muscleIntensities[workout.id][muscle.id] = [muscle.pivot.muscle_intensity];
        } else {
          muscleIntensities[workout.id][muscle.id].push(muscle.pivot.muscle_intensity);
        }
      });
    });

    // Calculate a total for each muscleGroup,
    // using the individual muscle intensity that is highest
    var muscleGroupIntensities = {};
    angular.forEach(muscleGroupList, function (muscleGroup) {

      var individualIntensities = {};
      muscleGroupIntensities[muscleGroup.name.toLowerCase()] = 0;
      angular.forEach(muscleGroup.muscles, function (muscle) {

        individualIntensities[muscle.id] = 0;

        angular.forEach(muscleIntensities[workout.id][muscle.id], function (intensity){
          individualIntensities[muscle.id] += intensity;
        });

        muscleGroupIntensities[muscleGroup.name.toLowerCase()] =
          Math.max(muscleGroupIntensities[muscleGroup.name.toLowerCase()], individualIntensities[muscle.id]);

      });

    });
    //console.log(muscleGroupIntensities);
    return muscleGroupIntensities;
  };

  this.setMuscleGroups = function(muscleGroups) {
    muscleGroupList = muscleGroups;
  };

  this.getWorkoutIntensity = function(workout) {
    return calculateIntensity(workout);
  };

  this.getTotalIntensity = function(workoutPlan) {
    return calculateIntensity(workoutPlan.workouts[0]);
    //angular.forEach(workoutPlan.workouts, function(workout) {
      //var lol = calculateIntensity(workout);
    //});
  };
}]);
