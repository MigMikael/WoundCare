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
                    <div class="well" style="background-color: rgb(44, 62, 80); color: #ffffff;margin: 5px">
                        <h2 style="display: inline-block">
                            <b>เคส {{ $c->id }} {{ $c->patient->name }}</b>
                        </h2>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h4 style="display: inline-block">
                            @if($c->status == 'Healing')
                                <span class="label label-warning">ระหว่างการรักษา</span>
                            @elseif($c->status == 'Closed')
                                <span class="label label-default">ปิดการรักษา</span>
                            @endif
                        </h4>
                    </div>
                </div>

                <div class="col-md-12">
                    @foreach($c->wounds as $wound)
                        <div class="col-md-4 col-sm-6" style="padding: 5px">
                            <div class="panel panel-primary" id="main-panel">
                                <div class="panel-heading">
                                    <h1>
                                        <b>แผล {{ $loop->iteration }}</b>
                                    </h1>
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
                                    <p>
                                        <b>สถานะแผล</b> :
                                        @if($wound->status == 'Healing')
                                            <span class="label label-warning">ระหว่างการรักษา</span>
                                        @else
                                            <span class="label label-default">หาย</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="panel-footer">
                                    <a href="{{ url('patient/wound/'.$wound->id) }}" class="btn btn-default btn-lg">
                                        รายละเอียด
                                    </a>
                                    <a href="{{ url('patient/take_image/'.$wound->id) }}" class="btn btn-primary btn-lg">
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
                <a href="{{ url('home') }}" class="btn btn-danger btn-lg btn-block">หน้าหลัก</a>
            </div>
            <div class="col-md-4 col-xs-3" style="padding-left: 0;padding-right: 0">
                <a href="" class="btn btn-info btn-lg btn-block disabled">ต่อไป</a>
            </div>
        </div>
    </div>
@endsection