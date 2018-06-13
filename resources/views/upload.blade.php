@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'test_upload', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                <div class="panel panel-primary" id="main-panel">
                    <div class="panel-heading">
                        <h1>
                            <b>
                                Test Upload File
                            </b>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="profile_image" class="col-md-4 control-label">กดที่นี่เพื่อถ่ายรูป</label>

                            <div class="col-md-6">
                                <input id="input_img" type="file" accept="image/*" class="form-control" name="input_img" value="{{ old('wound_image') }}" placeholder="กดที่นี่เพื่อถ่ายรูปแผล" multiple>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" value="Submit" class="btn btn-primary btn-lg">
                                    ต่อไป
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection