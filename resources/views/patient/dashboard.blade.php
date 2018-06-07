@extends('layouts.app')

@section('content')
    <div class="container container-first">
        @if(session('status'))
            <div class="alert alert-success">
                <strong> {{ session('status') }}</strong>
            </div>
        @endif
        <div class="row" style="padding-bottom: 140px">
            @foreach($patient->cases as $c)
                <div class="col-md-12">
                    @foreach($c->wounds as $wound)
                        <div class="col-md-4" style="padding: 0">
                            <div class="panel panel-primary" id="main-panel">
                                <div class="panel-heading">
                                    <h1>แผล {{ $loop->iteration }}</h1>
                                </div>
                                <div class="panel-body">
                                    <button type="button" class="btn btn-danger btn-block" data-toggle="collapse" data-target="#wound{{$wound->id}}">
                                        แสดงภาพ
                                    </button>
                                    <div id="wound{{$wound->id}}" class="collapse">
                                        <img class="img-responsive img-thumbnail" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                                    </div>
                                    <hr>
                                    <h2>บริเวณแผล : {{ $wound->site }}</h2>
                                    <p>สถานะแผล :
                                        <span class="label label-warning">{{ $wound->status }}</span>
                                    </p>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-primary btn-lg" href="{{ url('patient/take_image/'.$wound->id) }}">
                                        ถ่ายรูปแผล
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('navigation')
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