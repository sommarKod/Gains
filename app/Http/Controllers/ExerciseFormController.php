<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Response;

class ExerciseFormController extends Controller
{
    public function create()
    {
        return view('exerciseForm');
    }

    public function store()
    {
        $input = Input::get('name');
        $tempIntensity = 101;
        $muscles = []:
        $muscle_intensity = [];
        $i = 1;
        while ($i <= 47) {
            if(Input::get($i)){
                $muscles[] = $i;
                $tempIntensity = $tempIntensity + $i;
                $muscle_intensity[] = Input::get($tempIntensity);
                $tempIntensity = 101;
            }

            $i++;
        }

        return Response::json($input);

        //return \Redirect::route('exerciseForm')->with('message', 'Thanks for contacting us!');
    }
}
