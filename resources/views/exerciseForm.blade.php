
<?php
    $muscles = DB::table('muscles')->get();
        $muscle_id = 1;
        $muscle_id_checkbox = 1;
        $muscle_id_intensity = 101;
?>
<hmtl>
    <STYLE TYPE="text/css">
        <!--
        TD{font-family: Arial; font-size: 18pt;}
        --->
    </STYLE>
    <body>
        <h1>Add exercises to DB</h1>

        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>


        {!! Form::open(array('route' => 'exerciseForm_store', 'class' => 'form')) !!}

        <div class="form-group">
            {!! Form::label('Exercise Name') !!}
            {!! Form::text('name', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Exercise Name')) !!}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::reset('Reset') !!}

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            {!! Form::submit('Submit',
            array('class'=>'btn btn-primary')) !!}
        </div>
        <hr>

        <table border="1">
            <tr>
                <th>Muscle Name</th>
                <th>Included in exercise</th>
                <th>Intensity</th>
            </tr>


        @foreach($muscles as $muscle)
            <tr>
                    <div class="form-group">
            <td>{!! Form::label($muscle_id,$muscle->name,array('id'=>'','class'=>'form-control')) !!}</td>
            <td>{!! Form::checkbox($muscle->id,'1',false) !!}</td>
                        <td>{!! Form::select($muscle_id_intensity, array('100' => 'Max', '80' => 'High', '60' => 'Stabilizer'), '60') !!} </td>
                </tr>
            </div>
            <?php
                $muscle_id += 1;
                $muscle_id_checkbox += 1;
                $muscle_id_intensity += 1;
                ?>
            @endforeach
            </tr>
        </table>

        <hr>
        <div class="form-group">
            {!! Form::submit('Submit',
            array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}

    </body>
</html>
