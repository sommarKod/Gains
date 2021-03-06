<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

URL::setRootControllerNamespace('App\Http\Controllers');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('exercise', 'ExerciseController');
Route::resource('muscle', 'MuscleController');
Route::resource('workoutPlan', 'WorkoutPlanController');
Route::resource('workout','WorkoutController');
Route::resource('muscleGroup', 'MuscleGroupController');
Route::post('workoutPlan/{id}/addWorkouts','WorkoutPlanController@addWorkouts');
Route::get('workoutPlan/{id}/createNewWorkout','WorkoutPlanController@createNewWorkout');
Route::post('workout/{id}/addExercises','WorkoutController@addExercises');
Route::get('exerciseWithInfo', 'ExerciseController@getAllWithInfo');
Route::get('workout/{id}/deleteWorkout','WorkoutController@deleteWorkout');
