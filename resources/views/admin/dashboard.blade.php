@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="well col-md-12">
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>Doctor</h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            Amount : {{ $doctor_count }}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('admin/doctor') }}" class="btn btn-info">View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2>Patient</h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            Amount : {{ $patient_count }}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('admin/patient') }}" class="btn btn-success">View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h2>Case</h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            Amount : {{ $case_count }}
                        </p>
                    </div>
                    <div class="panel-footer">
                        <a href="" class="btn btn-warning">View</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection