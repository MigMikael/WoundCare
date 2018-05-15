@extends('layouts.app')

@section('content')
    {!! Form::open(['url' => 'api/wound/progress/store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
    <div class="panel panel-default col-md-8 col-md-offset-2">
        <div class="panel-heading">
            <h3>Take Wound Picture</h3>
        </div>
        <div class="panel-body">
            <input name="wound_id" type="hidden" value="{{ $wound_id }}">
            <div class="form-group{{ $errors->has('wound_image') ? ' has-error' : '' }}">
                <label for="profile_image" class="col-md-4 control-label">Wound Image</label>

                <div class="col-md-6">
                    <input id="wound_image" type="file" accept="image/*" class="form-control" name="wound_image" value="{{ old('wound_image') }}">

                    @if ($errors->has('wound_image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('wound_image') }}</strong>
                        </span>
                    @endif
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
@endsection