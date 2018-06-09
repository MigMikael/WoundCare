<div class="col-md-4" style="padding: 0">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <b>แผล {{ $loop->iteration }}</b>
            </h2>
        </div>
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="collapse" data-target="#wound{{$wound->id}}">
                แสดงภาพ
            </button>
            <div id="wound{{$wound->id}}" class="collapse">
                <img class="img-responsive img-thumbnail" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
            </div>
            <hr>
            <h3>
                <b>บริเวณแผล</b> : {{ $wound->site }}
            </h3>
            <h4>
                <b>สถานะแผล :</b>
                <span class="label label-warning">{{ $wound->status }}</span>
            </h4>
        </div>
        <div class="panel-footer">
            @if(Request::is('admin/*'))
                {!! Form::model($wound, ['url' => 'admin/wound/'.$wound->id, 'method' =>'delete', 'style' => 'display:inline-block']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                <a class="btn btn-warning" href="{{ url('admin/wound/'.$wound->id.'/edit') }}" style="display: inline-block">
                    Edit
                </a>
                <a class="btn btn-primary" href="{{ url('admin/wound/'.$wound->id) }}" style="display: inline-block">
                    Healing Progress
                </a>
            @elseif(Request::is('doctor/*'))
                <a class="btn btn-primary" href="{{ url('doctor/wound/'.$wound->id) }}">สถานะแผล</a>
            @elseif(Request::is('patient/*'))
                <a class="btn btn-primary" href="{{ url('patient/take_image/'.$wound->id) }}">ถ่ายภาพ</a>
            @endif
        </div>
    </div>
</div>