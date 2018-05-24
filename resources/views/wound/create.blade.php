@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1>Create Wound</h1>
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['url' => $url, 'class' => 'form-horizontal', 'files' => 'true']) !!}
                        @include('wound._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection