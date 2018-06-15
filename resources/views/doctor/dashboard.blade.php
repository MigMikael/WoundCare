@extends('layouts.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <strong> {{ session('status') }}</strong>
        </div>
    @endif
    <div class="container container-first">
        <ul class="nav nav-pills nav-justified">
            <li class="active">
                <a data-toggle="pill" href="#waiting_case">รอการวินิจฉัย</a>
            </li>
            <li>
                <a data-toggle="pill" href="#diagnosed_case">วินิจฉัยแล้ว</a>
            </li>
            <li>
                <a data-toggle="pill" href="#closed_case">ปิดการรักษา</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="waiting_case" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>
                                    <b>รอการวินิจฉัย</b>
                                    <a class="btn btn-success" href="{{ url('doctor/patient/create') }}">
                                        เพื่ม
                                    </a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    @foreach($doctor->waiting_cases as $c)
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>
                                        <b>รหัสเคส</b> {{ $c->id }})&emsp;<b>{{ $c->patient->name }}</b>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <div class="col-md-3">
                                        <img src="{{ url('image/show/'.$c->patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $c->patient->name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <h4>
                                            <b>สถานะเคส</b> :
                                            @if($c->status == 'Healing')
                                                <span class="label label-warning">ระหว่างการรักษา</span>
                                            @elseif($c->status == 'Closed')
                                                <span class="label label-default">ปิดการรักษา</span>
                                            @endif
                                        </h4>
                                        <hr>
                                        <h4>
                                            <b>โทรศัพท์</b> : {{ $c->patient->phone_number }}
                                        </h4>
                                        <h4>
                                            <b>โรค</b> : {{ $c->disease }}
                                        </h4>
                                    </div>
                                    <div class="col-md-5" style="background: rgba(0, 0, 0, 0.05); padding: 2%">
                                        <h4>
                                            <b>นัดหมายครั้งต่อไป</b>
                                        </h4>
                                        <hr>
                                        <h3>
                                            วันที่ <b>{{ explode(" ", $c->next_appointment)[0] }}</b>
                                            &nbsp;&nbsp;
                                            เวลา <b>{{ explode(" ", $c->next_appointment)[1] }}</b>
                                        </h3>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <a class="btn btn-primary" href="{{ url('doctor/case/'.$c->id) }}">
                                        รายละเอียด
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="diagnosed_case" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>
                                    <b>วินิจฉัยแล้ว</b>
                                    <span class="label label-default">
                                        {{ sizeof($doctor->diagnosed_cases) }}
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    @foreach($doctor->diagnosed_cases as $c)
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>
                                        <b>รหัสเคส</b> {{ $c->id }})&emsp;<b>{{ $c->patient->name }}</b>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <div class="col-md-3">
                                        <img src="{{ url('image/show/'.$c->patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $c->patient->name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <h4>
                                            <b>สถานะเคส</b> :
                                            @if($c->status == 'Healing')
                                                <span class="label label-warning">ระหว่างการรักษา</span>
                                            @elseif($c->status == 'Closed')
                                                <span class="label label-default">ปิดการรักษา</span>
                                            @endif
                                        </h4>
                                        <hr>
                                        <h4>
                                            <b>โทรศัพท์</b> : {{ $c->patient->phone_number }}
                                        </h4>
                                        <h4>
                                            <b>โรค</b> : {{ $c->disease }}
                                        </h4>
                                    </div>
                                    <div class="col-md-5" style="background: rgba(0, 0, 0, 0.05); padding: 2%">
                                        <h4>
                                            <b>นัดหมายครั้งต่อไป</b>
                                        </h4>
                                        <hr>
                                        <h3>
                                            วันที่ <b>{{ explode(" ", $c->next_appointment)[0] }}</b>
                                            &nbsp;&nbsp;
                                            เวลา <b>{{ explode(" ", $c->next_appointment)[1] }}</b>
                                        </h3>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <a class="btn btn-default" href="{{ url('doctor/patient/'.$c->patient->id) }}">
                                        ข้อมูลผู้ป่วย
                                    </a>
                                    <a class="btn btn-primary" href="{{ url('doctor/case/'.$c->id) }}">
                                        รายละเอียด
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="closed_case" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>
                                    <b>ปิดการรักษา</b>
                                    <span class="label label-default">
                                        {{ sizeof($doctor->closed_cases) }}
                                    </span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    @foreach($doctor->closed_cases as $c)
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3>
                                        <b>รหัสเคส</b> {{ $c->id }})&emsp;<b>{{ $c->patient->name }}</b>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <div class="col-md-3">
                                        <img src="{{ url('image/show/'.$c->patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $c->patient->name }}">
                                    </div>
                                    <div class="col-md-4">
                                        <h4>
                                            <b>สถานะเคส</b> :
                                            @if($c->status == 'Healing')
                                                <span class="label label-warning">ระหว่างการรักษา</span>
                                            @elseif($c->status == 'Closed')
                                                <span class="label label-default">ปิดการรักษา</span>
                                            @endif
                                        </h4>
                                        <hr>
                                        <h4>
                                            <b>โทรศัพท์</b> : {{ $c->patient->phone_number }}
                                        </h4>
                                        <h4>
                                            <b>โรค</b> : {{ $c->disease }}
                                        </h4>
                                    </div>
                                    <div class="col-md-5" style="background: rgba(0, 0, 0, 0.05); padding: 2%">
                                        <h4>
                                            <b>นัดหมายครั้งต่อไป</b>
                                        </h4>
                                        <hr>
                                        <h3>
                                            วันที่ <b>{{ explode(" ", $c->next_appointment)[0] }}</b>
                                            &nbsp;&nbsp;
                                            เวลา <b>{{ explode(" ", $c->next_appointment)[1] }}</b>
                                        </h3>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <a class="btn btn-default" href="{{ url('doctor/patient/'.$c->patient->id) }}">
                                        ข้อมูลผู้ป่วย
                                    </a>
                                    <a class="btn btn-primary" href="{{ url('doctor/case/'.$c->id) }}">
                                        รายละเอียด
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection