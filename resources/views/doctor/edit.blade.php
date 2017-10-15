@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Doctor</div>

                    <div class="panel-body">
                        {!! Form::model($doctor, ['url' => 'admin/doctor/'.$doctor->id, 'method' =>'patch', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                            @include('doctor._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection