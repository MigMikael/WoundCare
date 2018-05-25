@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <img src="{{ url('contour.jpg') }}" class="img-responsive img-thumbnail profile-img" alt="select contour">

        {!! Form::open(['url' => 'api/wound/progress/select_contour', 'class' => 'form-horizontal', 'files' => 'true']) !!}
        <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-heading">
                <h1>Select Reference Contour</h1>
            </div>
            <div class="panel-body">
                <input name="progress_id" type="hidden" value="{{ $progress->id }}">
                <div class="form-group">
                    <label for="contour_no" class="col-md-4 control-label">Ref Contour No</label>

                    <div class="col-md-6">
                        {{ Form::text('contour_no', null,['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
