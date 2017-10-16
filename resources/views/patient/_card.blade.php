<div class="well col-md-12">
    <div class="col-md-4">
        <img src="{{ url('image/show/'.$patient->profile_image) }}" class="img-responsive" height="200" alt="{{ $patient->name }}">
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ $patient->name }}</h3>
            </div>

            <div class="panel-body">
                <p><b>เพศ : </b>{{ $patient->gender }}</p>
            </div>

            <div class="panel-footer">
                <a class="btn btn-primary" href="{{ url('patient/'.$patient->id) }}">
                    Detail
                </a>
                @if(Request::is('admin/*'))
                    <a href="{{ url('admin/patient/'.$patient->id.'/edit') }}" class="btn btn-warning">
                        Edit
                    </a>

                    {!! Form::model($patient, ['url' => 'admin/patient/'.$patient->id, 'method' =>'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
</div>