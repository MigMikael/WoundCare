<input id="patient_id" type="hidden" class="form-control" name="patient_id" value="{{ $patient_id }}">

<div class="form-group{{ $errors->has('disease') ? ' has-error' : '' }}">
    <label for="disease" class="col-md-4 control-label">Disease</label>

    <div class="col-md-6">
        <input id="disease" type="text" class="form-control" name="disease" value="{{ old('disease') }}">

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
        <input id="next_date" type="date" class="form-control" name="next_date" value="{{ old('next_date') }}">

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
        <input id="next_time" type="time" class="form-control" name="next_time" value="{{ old('next_time') }}">

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
            Create
        </button>
    </div>
</div>