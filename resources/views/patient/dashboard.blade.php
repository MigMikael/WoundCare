@extends('layouts.app')

@section('content')
    <div class="container container-first">
        @if(session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
        @endif
        <div class="row">
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