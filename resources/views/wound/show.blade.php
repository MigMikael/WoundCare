@extends('layouts.app')

@section('head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['เวลา', 'ขนาด (ตร.ซม.)'],
                @foreach($wound->progress as $p)
                ['{{ explode(" ", $p->created_at)[0] }}', {{ $p->area }}],
                @endforeach
            ]);

            var options = {
                hAxis: {title: 'เวลา',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection

@section('content')
    <div class="container container-first">
        <div class="row" style="padding-bottom: 10px">
            <div class="well col-md-12">
                <div class="col-md-4">
                    <img class="img-responsive img-thumbnail large-img" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <h1>
                        <b>
                            @if(Request::is('admin/*'))
                            <a href="{{ url('admin/case/'.$wound->cases->id) }}">{{ $wound->cases->patient->name }}</a>
                            @elseif(Request::is('doctor/*'))
                            <a href="{{ url('doctor/case/'.$wound->cases->id) }}">{{ $wound->cases->patient->name }}</a>
                            @else
                            <a href="{{ url('patient/dashboard') }}">{{ $wound->cases->patient->name }}</a>
                            @endif
                            > แผล {{ $wound->id }}
                        </b>
                    </h1>
                    <hr style="display: block;background-color: #696969;height: 1px">
                    <h3>
                        <b>สถานะแผล</b> :
                        @if($wound->status == 'Healing')
                        <span class="label label-warning">ระหว่างการรักษา</span>
                        @else
                        <span class="label label-default">หาย</span>
                        @endif
                    </h3>
                    <h3>
                        <b>บริเวณแผล</b> : {{ $wound->site }}
                    </h3>
                    {{--<h4>
                        <b>รหัสเคส</b> : {{ $wound->cases->id }}
                    </h4>--}}
                    @if(Request::is('admin/*') or Request::is(('doctor/*')))
                    <hr style="display: block;background-color: #696969;height: 1px">
                    <div class="col-md-12 text-right">
                        <a href="{{ url('doctor/wound/'.$wound->id.'/status') }}" class="btn btn-primary">
                            เปลี่ยนสถานะ
                        </a>
                        <a href="{{ url('doctor/wound/'.$wound->id.'/edit') }}" class="btn btn-warning">
                            แก้ไข
                        </a>
                        <a href="" class="btn btn-danger">
                            ลบ
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="well" style="margin-bottom: 0">
                <h2>
                    <b>Healing Progress</b>
                    @if(Request::is('admin/*'))
                        <a href="{{ url('admin/wound/progress/create/'.$wound->id) }}" class="btn btn-primary">+</a>
                    @endif
                </h2>
                <hr>
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a data-toggle="tab" href="#timeline">Timeline</a></li>
                    <li><a data-toggle="tab" href="#graph">Graph</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="timeline" class="tab-pane fade in active">
                    <div class="timeline">
                        @foreach($wound->progress->reverse() as $p)
                            <div class="timeline-block @if($loop->index % 2 == 0) timeline-block-right @else timeline-block-left @endif" id="progress{{$p->id}}">
                                <div class="marker"></div>
                                <div class="well timeline-content" style="padding: 20px 10px 20px 10px">
                                    <h3 style="display: inline-block">
                                        วันที่ <b>{{ explode(" ", $p->created_at)[0] }}</b>&emsp;
                                    </h3>
                                    <h3 style="display: inline-block">
                                        เวลา <b>{{ explode(" ", $p->created_at)[1] }}</b>
                                    </h3>
                                    <hr style="display: block;background-color: #696969;height: 1px">
                                    <div class="col-md-6 wound-img-container">
                                        <a href="{{ url('image/show/'.$p->image) }}" target="_blank">
                                            <img class="img-thumbnail img-responsive large-img" src="{{ url('image/show/'.$p->image) }}">
                                            <div class="overlay">
                                                <div class="overlay-text">แสดงภาพ</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6" style="text-align: right">
                                        <h3>ขนาด &nbsp; <b>{{ $p->area }}</b>&nbsp; cm<sup>2</sup></h3>
                                        <h2>
                                            @if($p->status == 'Diagnosed')
                                            <span class="label label-success">
                                                วินิจฉัยแล้ว
                                            </span>
                                            @else
                                            <span class="label label-danger">
                                                รอวินิจฉัย
                                            </span>
                                            @endif
                                        </h2>
                                        <hr>
                                        @if(Request::is('admin/*'))
                                            <a class="btn btn-primary" href="{{ url('admin/wound/progress/'.$p->id) }}">
                                                รายละเอียด
                                            </a>
                                        @elseif(Request::is('doctor/*'))
                                            <a class="btn btn-primary" href="{{ url('doctor/wound/progress/'.$p->id) }}">
                                                รายละเอียด
                                            </a>
                                        @elseif(Request::is('patient/*'))
                                            <a class="btn btn-primary" href="{{ url('patient/wound/progress/'.$p->id) }}">
                                                รายละเอียด
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="graph" class="tab-pane fade text-center">
                    <div class="well">
                        <h1>ขนาดบาดแผลตามเวลา</h1>
                        <br>
                        <div id="chart_div" style="width: 100%; min-height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('navigation2')
    @if(Request::is('patient/*'))
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
    @endif
@endsection