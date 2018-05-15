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

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

    <div class="col-md-6">
        {{ Form::email('email', null,['class' => 'form-control']) }}

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
        {{ Form::text('name', null,['class' => 'form-control']) }}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
    <label for="gender" class="col-md-4 control-label">Gender</label>

    <div class="col-md-6">
        {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control','placeholder' => 'Pick gender ...']) }}
        @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
    <label for="birthday" class="col-md-4 control-label">Birthday</label>

    <div class="col-md-6">
        {{ Form::date('birthday', \Carbon\Carbon::now(), ['class' => 'form-control']) }}

        @if ($errors->has('birthday'))
            <span class="help-block">
                <strong>{{ $errors->first('birthday') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>

    <div class="col-md-6">
        {{ Form::textarea('address', null, ['class' => 'form-control', 'row' => '5']) }}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
    <label for="phone_number" class="col-md-4 control-label">Phone Number</label>

    <div class="col-md-6">
        {{ Form::text('phone_number', null,['class' => 'form-control']) }}

        @if ($errors->has('phone_number'))
            <span class="help-block">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('congenital_disease') ? ' has-error' : '' }}">
    <label for="congenital_disease" class="col-md-4 control-label">Congenital Disease</label>

    <div class="col-md-6">
        {{ Form::text('congenital_disease', null,['class' => 'form-control']) }}

        @if ($errors->has('congenital_disease'))
            <span class="help-block">
                <strong>{{ $errors->first('congenital_disease') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('allergic') ? ' has-error' : '' }}">
    <label for="allergic" class="col-md-4 control-label">Allergic</label>

    <div class="col-md-6">
        {{ Form::text('allergic', null,['class' => 'form-control']) }}

        @if ($errors->has('allergic'))
            <span class="help-block">
                <strong>{{ $errors->first('allergic') }}</strong>
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
            @if(Request::is('*/edit'))
                Finish
            @else
                Create
            @endif
        </button>
    </div>
</div>