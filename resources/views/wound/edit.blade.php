@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Edit Wound</h1>
                    </div>

                    <div class="panel-body">
                        {!! Form::model($wound, ['url' => $url, 'method' =>'patch', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                        @include('wound._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection