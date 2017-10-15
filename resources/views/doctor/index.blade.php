@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row well-lg">
            <h1>
                All Doctor
                @if(Request::is('admin/*'))
                    <a href="{{ url('admin/doctor/create') }}" class="btn btn-primary">
                        +
                    </a>
                @endif
            </h1>
        </div>

        @foreach($doctors as $doctor)
            @include('doctor._card')
        @endforeach
    </div>
@endsection