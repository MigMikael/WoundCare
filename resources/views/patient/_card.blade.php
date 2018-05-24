<div class="row well">
    <div class="col-md-12">
        <div class="col-md-4 col-xs-12">
            <div class="panel panel-success text-center">
                <div class="panel-body">
                    <img src="{{ url('image/show/'.$patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $patient->name }}">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3>{{ $patient->name }}</h3>
                </div>

                <div class="panel-body">
                    <p><b>เพศ : </b>{{ $patient->gender }}</p>
                </div>
                @if(Request::is('admin/*'))
                    <div class="panel-footer">
                        <a class="btn btn-primary" href="{{ url('admin/patient/'.$patient->id) }}" style="display: inline-block">
                            Detail
                        </a>

                        <a href="{{ url('admin/patient/'.$patient->id.'/edit') }}" class="btn btn-warning" style="display: inline-block">
                            Edit
                        </a>

                        {!! Form::model($patient, ['url' => 'admin/patient/'.$patient->id, 'method' =>'delete', 'style' => 'display:inline-block']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                @elseif(Request::is('doctor/*'))
                    <div class="panel-footer">
                        <a class="btn btn-primary" href="{{ url('doctor/patient/'.$patient->id) }}">
                            Detail
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>