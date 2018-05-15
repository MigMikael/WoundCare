<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
    <label for="comment" class="col-md-4 control-label">Comment</label>

    <div class="col-md-6">
        <input id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}" required autofocus>

        @if ($errors->has('comment'))
            <span class="help-block">
                <strong>{{ $errors->first('comment') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('advice') ? ' has-error' : '' }}">
    <label for="advice" class="col-md-4 control-label">Advice</label>

    <div class="col-md-6">
        <input id="advice" type="text" class="form-control" name="advice" value="{{ old('advice') }}">

        @if ($errors->has('advice'))
            <span class="help-block">
                <strong>{{ $errors->first('advice') }}</strong>
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