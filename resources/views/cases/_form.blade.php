<div class="form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">
    <label for="doctor_id" class="col-md-4 control-label">Doctor</label>

    <div class="col-md-6">
        {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-control','placeholder' => 'Pick Doctor ...']) }}
        @if ($errors->has('doctor_id'))
            <span class="help-block">
                <strong>{{ $errors->first('doctor_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('patient_id') ? ' has-error' : '' }}">
    <label for="patient_id" class="col-md-4 control-label">Patient</label>

    <div class="col-md-6">
        {{ Form::select('patient_id', $patients, null, ['class' => 'form-control','placeholder' => 'Pick Patient ...']) }}
        @if ($errors->has('patient_id'))
            <span class="help-block">
                <strong>{{ $errors->first('patient_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('disease') ? ' has-error' : '' }}">
    <label for="disease" class="col-md-4 control-label">Disease</label>

    <div class="col-md-6">
        {{ Form::text('disease', null,['class' => 'form-control']) }}

        @if ($errors->has('disease'))
            <span class="help-block">
                <strong>{{ $errors->first('disease') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('next_date') ? ' has-error' : '' }}">
    <label for="next_date" class="col-md-4 control-label">Appointment Date</label>

    <div class="col-md-6">
        {{ Form::date('next_date', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

        @if ($errors->has('next_date'))
            <span class="help-block">
                <strong>{{ $errors->first('next_date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('next_time') ? ' has-error' : '' }}">
    <label for="next_time" class="col-md-4 control-label">Appointment Time</label>

    <div class="col-md-6">
        {{ Form::time('next_time', \Carbon\Carbon::now()->toTimeString(), ['class' => 'form-control']) }}

        @if ($errors->has('next_time'))
            <span class="help-block">
                <strong>{{ $errors->first('next_time') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            @if(Request::is('*/edit'))
                Finish
            @else
                Create
            @endif
        </button>
    </div>
</div>