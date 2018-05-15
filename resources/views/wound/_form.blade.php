<div class="form-group{{ $errors->has('original_image') ? ' has-error' : '' }}">
    <label for="original_image" class="col-md-4 control-label">Original Image</label>

    <div class="col-md-6">
        <input id="original_image" type="file" class="form-control" name="original_image" value="{{ old('original_image') }}">

        @if ($errors->has('original_image'))
            <span class="help-block">
                <strong>{{ $errors->first('original_image') }}</strong>
            </span>
        @endif
    </div>
</div>

<input id="case_id" type="hidden" class="form-control" name="case_id" value="{{ $case_id }}">

<div class="form-group{{ $errors->has('site') ? ' has-error' : '' }}">
    <label for="site" class="col-md-4 control-label">Site</label>

    <div class="col-md-6">
        {{ Form::text('site', null,['class' => 'form-control']) }}

        @if ($errors->has('site'))
            <span class="help-block">
                <strong>{{ $errors->first('site') }}</strong>
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