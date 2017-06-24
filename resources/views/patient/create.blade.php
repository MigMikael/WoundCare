@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Patient</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('patient') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('cases._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection