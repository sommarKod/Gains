<?php

namespace App\Http\Controllers;

use App\Workout;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\WorkoutPlan;
use Illuminate\Support\Facades\Input;
use Response;
class WorkoutPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(WorkoutPlan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        WorkoutPlan::create(Input::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Response::json(WorkoutPlan::with('workouts', 'workouts.exercises', 'workouts.exercises.muscles')->find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $workoutPlan = WorkoutPlan::find($id);

        $workoutPlan->removeAllWorkouts();
        self::addWo($workoutPlan);

        $workoutPlan->save();
    }
    private function addWo($workoutPlan){
        $workoutPlan->addWorkouts(Input::all());
    }

    public function addWorkouts($id)
    {
        $workoutPlan = WorkoutPlan::find($id);
        self::addWo($workoutPlan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
