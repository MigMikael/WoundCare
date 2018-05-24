@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row well">
            <h1>
                All Doctor
                @if(Request::is('admin/*'))
                    <a href="{{ url('admin/doctor/create') }}" class="btn btn-primary">
                        +
                    </a>
                @endif
            </h1>
        </div>
        @if(session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
        @endif
        @foreach($doctors as $doctor)
            @include('doctor._card')
        @endforeach
    </div>
@endsection