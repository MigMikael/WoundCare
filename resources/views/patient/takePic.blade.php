@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['url' => 'api/wound/progress/store', 'class' => 'form-horizontal', 'files' => 'true']) !!}
                <div class="panel panel-primary" id="main-panel">
                    <div class="panel-heading">
                        <h1>
                            <b>
                                <a href="{{ url('patient/dashboard') }}">
                                    แผลที่ {{ $wound->id }}
                                </a>
                                > ถ่ายรูปแผล
                            </b>
                        </h1>
                    </div>
                    <div class="panel-body">
                        <input name="wound_id" type="hidden" value="{{ $wound->id }}">
                        <div class="form-group{{ $errors->has('wound_image') ? ' has-error' : '' }}">
                            <label for="profile_image" class="col-md-4 control-label">กดที่นี่เพื่อถ่ายรูป</label>

                            <div class="col-md-6">
                                <input id="wound_image" type="file" accept="image/*" class="form-control" name="wound_image" value="{{ old('wound_image') }}" placeholder="กดที่นี่เพื่อถ่ายรูปแผล">

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
                                <button type="submit" class="btn btn-primary btn-lg">
                                    ต่อไป
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('navigation2')
    <div class="nav-footer">
        <div class="col-md-12 col-xs-12" style="padding-bottom: 10px;padding-top: 10px">
            <div class="col-md-6 col-xs-6">
                <button class="btn btn-default btn-block" type="button" onclick="smaller_size()">
                    ลดอักษร
                </button>
            </div>
            <div class="col-md-6 col-xs-6">
                <button class="btn btn-default btn-block" type="button" onclick="larger_size()">
                    ขยายอักษร
                </button>
            </div>
            <script>
                function smaller_size() {
                    document.getElementById("main-panel").style.fontSize = "medium";
                }
                function larger_size() {
                    document.getElementById("main-panel").style.fontSize = "xx-large";
                }
            </script>
        </div>
        <div class="col-md-12 col-xs-12">
            <div class="col-md-4 col-xs-3" style="padding-left: 0;padding-right: 0">
                <a href="{{ URL::previous() }}" class="btn btn-info btn-lg btn-block">กลับ</a>
            </div>
            <div class="col-md-4 col-xs-6">
                <a href="{{ url('patient/dashboard') }}" class="btn btn-danger btn-lg btn-block">หน้าหลัก</a>
            </div>
            <div class="col-md-4 col-xs-3" style="padding-left: 0;padding-right: 0">
                <a href="" class="btn btn-info btn-lg btn-block">ต่อไป</a>
            </div>
        </div>
    </div>
@endsection