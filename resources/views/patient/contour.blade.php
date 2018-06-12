@extends('layouts.app')

@section('content')
    <div class="container container-first">
        <div class="col-md-12">
            <img src="{{ url('contour.jpg') }}" class="img-responsive img-thumbnail profile-img" alt="select contour" style="width: 100%;height: 100%">

            {!! Form::open(['url' => 'api/wound/progress/select_contour', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>เลือกหมายเลขที่ปรากฏในสี่เหลี่ยมสีน้ำเงิน</h1>
                </div>
                <div class="panel-body">
                    <input name="progress_id" type="hidden" value="{{ $progress->id }}">
                    <div class="form-group">
                        <label for="contour_no" class="col-md-4 control-label">
                            หมายเลข
                        </label>

                        <div class="col-md-6">
                            {{ Form::text('contour_no', null,['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-lg">
                                ส่งภาพ
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
