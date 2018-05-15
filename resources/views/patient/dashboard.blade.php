@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
        @endif
        <div class="row">
            {{--<div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>
                            Case
                            <span class="label label-default">
                            {{ sizeof($patient->cases) }}
                            </span>
                        </h3>
                    </div>
                </div>
            </div>--}}
            @foreach($patient->cases as $c)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>CaseID : <b>{{ $c->id }}</b></h2>
                        </div>

                        <div class="panel-body">
                            @foreach($c->wounds as $wound)
                                @include('wound._card')
                            @endforeach
                        </div>

                        <div class="panel-footer">

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection