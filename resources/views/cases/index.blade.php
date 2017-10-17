@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row well-lg">
            <h1>
                All Case
                @if(Request::is('admin/*'))
                    <a href="{{ url('admin/case/create') }}" class="btn btn-primary">
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
        @foreach($cases as $case)
            @include('cases._card')
        @endforeach
    </div>
@endsection