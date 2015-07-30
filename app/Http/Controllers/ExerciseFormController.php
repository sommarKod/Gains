<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Response;
use App\Muscle;

class ExerciseFormController extends Controller
{
    public function create()
    {
        return view('exerciseForm');
    }

    public function store()
    {
        $exerciseFile = fopen("exercises.txt", "a");

        $exerciseName = Input::get('name');
        $text = "\$exercise = Exercise::create(['name' => '$exerciseName']);\n";
        fwrite($exerciseFile, $text);
        $text = "\$muscles = [];\n";
        fwrite($exerciseFile, $text);

        $tempIntensity = 100;

        $i = 1;
        while ($i <= 47) {
            if(Input::get($i)){
                $muscle = Muscle::find($i);
                $tempIntensity = $tempIntensity + $i;
                $muscle_intensity = Input::get($tempIntensity);
                $text = "\$muscles[] = ['$muscle->name', '$muscle_intensity'];\n";
                fwrite($exerciseFile, $text);
            }
            $tempIntensity = 100;
            $i++;
        }
        $text = "\$exercise->attachToMuscle(\$muscles);\n\n\n\n";
        fwrite($exerciseFile, $text);
        fclose($exerciseFile);


        return \Redirect::route('exerciseForm')->with('message', 'Thanks for contacting us!');
    }
}
