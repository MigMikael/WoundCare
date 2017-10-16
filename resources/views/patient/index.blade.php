@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row well-lg">
            <h1>
                All Patient
                @if(Request::is('admin/*'))
                    <a href="{{ url('admin/patient/create') }}" class="btn btn-primary">
                        +
                    </a>
                @endif
            </h1>
        </div>

        @foreach($patients as $patient)
            @include('patient._card')
        @endforeach
    </div>
@endsection