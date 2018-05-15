<div class="row" style="padding-bottom: 10px">
    <div class="well col-md-12">
        <div class="col-md-4">
            <img src="{{ url('image/show/'.$doctor->profile_image) }}" class="img-responsive img-thumbnail" alt="{{ $doctor->name }}">

            @if(Request::is('admin/*'))
                <a href="{{ url('admin/doctor/'.$doctor->id.'/edit') }}" class="btn btn-warning">
                    Edit
                </a>

                {!! Form::model($doctor, ['url' => 'admin/doctor/'.$doctor->id, 'method' =>'delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endif
        </div>
        <div class="col-md-8 col-xs-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        {{ $doctor->name }}
                        <span class="label label-success">{{ $doctor->status }}</span>
                    </h2>
                </div>

                <div class="panel-body">
                    <p><b>เชี่ยวชาญ :</b>{{ $doctor->expert }}</p>
                </div>
            </div>
            @foreach($doctor->cases as $c)
                <div class="col-md-12 col-xs-12">
                    <span class="label label-default">CASE ID : {{ $c->id }}</span>
                    Next Appointment : {{ $c->next_appointment }}
                    <a href="">View</a>
                    <hr>
                </div>
            @endforeach
        </div>

    </div>
</div>