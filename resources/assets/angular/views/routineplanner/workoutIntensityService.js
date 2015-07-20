
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
          individualIntensities[muscle.id] += Number(intensity);
        });

        muscleGroupIntensities[muscleGroup.name.toLowerCase()] =
          Math.max(muscleGroupIntensities[muscleGroup.name.toLowerCase()], individualIntensities[muscle.id]);

      });

    });
    return muscleGroupIntensities;
  };

  this.setMuscleGroups = function(muscleGroups) {
    muscleGroupList = muscleGroups;
  };

  var fixIndex = function(index, numWorkouts) {
    if (numWorkouts == 1)
      return 0;
    if (index < 0)
      return fixIndex(numWorkouts - Math.abs(index), numWorkouts);
    return index;
  };

  var mergeIntensities = function(workoutIntensities, mergeFactors)
  {
    var numWorkouts = mergeFactors.length;
    var muscleGroupIntensities = {};
    var index;

    var muscleSums = function (muscleGroup) {
      var groupName = muscleGroup.name.toLowerCase();
      if (muscleGroupIntensities[groupName] === undefined)
        muscleGroupIntensities[groupName] = 0;

      muscleGroupIntensities[groupName] += intensity[groupName] * mergeFactors[index];
    };

    for(index = 0; index < numWorkouts; index++)
    {
        var intensity = workoutIntensities[index];
        angular.forEach(muscleGroupList, muscleSums);
    }
    return muscleGroupIntensities;
  };

  var calculateWorkoutIntensity = function(workoutPlan, index) {
    var numWorkouts = workoutPlan.workouts.length;
    var workoutIntensities = {};

    workoutIntensities[0] = calculateIntensity(workoutPlan.workouts[index]);
    workoutIntensities[1] = calculateIntensity(workoutPlan.workouts[fixIndex(index - 1, numWorkouts)]);
    workoutIntensities[2] = calculateIntensity(workoutPlan.workouts[fixIndex(index - 2, numWorkouts)]);

    var mergeFactors = [1, 0.5, 0.25];

    return mergeIntensities(workoutIntensities, mergeFactors);
  };

  this.getWorkoutIntensity = function(workoutPlan, index) {
    return calculateWorkoutIntensity(workoutPlan, index);
  };

  this.getTotalIntensity = function(workoutPlan) {
    var numWorkouts = workoutPlan.workouts.length;
    var workoutIntensities = {};
    var mergeFactors = [];

    var index;
    for(index = 0; index < numWorkouts; index++)
    {
        workoutIntensities[index] = calculateWorkoutIntensity(workoutPlan, index);
        mergeFactors[index] = 1 / numWorkouts;
    }
    
    return mergeIntensities(workoutIntensities, mergeFactors);
  };
}]);
