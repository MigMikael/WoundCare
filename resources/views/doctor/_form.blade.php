<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('expert') ? ' has-error' : '' }}">
    <label for="expert" class="col-md-4 control-label">Expert</label>

    <div class="col-md-6">
        <input id="expert" type="text" class="form-control" name="expert" value="{{ old('expert') }}">

        @if ($errors->has('expert'))
            <span class="help-block">
                <strong>{{ $errors->first('expert') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('profile_image') ? ' has-error' : '' }}">
    <label for="profile_image" class="col-md-4 control-label">Profile Image</label>

    <div class="col-md-6">
        <input id="profile_image" type="file" class="form-control" name="profile_image" value="{{ old('profile_image') }}">

        @if ($errors->has('profile_image'))
            <span class="help-block">
                <strong>{{ $errors->first('profile_image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Create
        </button>
    </div>
</div>