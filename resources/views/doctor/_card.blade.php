<div class="row well" style="padding-bottom: 10px">
    <div class="col-md-12">
        <div class="col-md-4 col-xs-12">
            <div class="panel panel-primary text-center">
                <div class="panel-body">
                    <img src="{{ url('image/show/'.$doctor->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $doctor->name }}">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 style="display:inline-block">
                        {{ $doctor->name }}
                    </h2>
                    <h4 style="display: inline-block">
                        <span class="label label-success text-capitalize">{{ $doctor->status }}</span>
                    </h4>
                </div>

                <div class="panel-body">
                    <p><b>เชี่ยวชาญ : </b>{{ $doctor->expert }}</p>
                    <hr>
                    @foreach($doctor->cases as $c)
                        <div class="col-md-12 col-xs-12">
                            <span class="label label-default">CASE ID : {{ $c->id }}</span>
                            Next Appointment : {{ $c->next_appointment }}
                            <a href="">View</a>
                        </div>
                    @endforeach
                </div>
                @if(Request::is('admin/*'))
                    <div class="panel-footer">
                        <a href="{{ url('admin/doctor/'.$doctor->id.'/edit') }}" class="btn btn-warning" style="display:inline-block">
                            Edit
                        </a>

                        {!! Form::model($doctor, ['url' => 'admin/doctor/'.$doctor->id, 'method' =>'delete', 'style' => 'display:inline-block']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>