@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Case</div>

                    <div class="panel-body">
                        {!! Form::model($case, ['url' => 'admin/case/'.$case->id, 'method' =>'patch', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                        @include('cases._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection