<div class="well col-md-12">
    <div class="well col-md-4">
        <h3>Patient</h3>
        <hr>
        <div class="col-md-6">
            <img src="{{ url('image/show/'.$case->patient->profile_image) }}" class="img-responsive img-thumbnail" alt="{{ $case->patient->name }}">
        </div>
        <div class="col-md-6">
            <h4>{{ $case->patient->name }}</h4>
            <a href="" class="btn btn-default">View</a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>CASE ID : {{ $case->id }}</h2>
            </div>
            <div class="panel-body">
                <h3>{{ $case->disease }}</h3>
                <h4>
                    <span class="label label-default">{{ $case->status }}</span>
                </h4>
            </div>
            <div class="panel-footer">
                <a href="{{ url('admin/case/'.$case->id) }}" class="btn btn-primary">View</a>
                @if(Request::is('admin/*'))
                    <a href="{{ url('admin/case/'.$case->id.'/edit') }}" class="btn btn-warning">
                        Edit
                    </a>

                    {!! Form::model($case, ['url' => 'admin/case/'.$case->id, 'method' =>'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
    <div class="well col-md-4">
        <h3>Doctor</h3>
        <hr>
        <div class="col-md-6">
            <h4>{{ $case->doctor->name }}</h4>
            <a href="" class="btn btn-default">View</a>
        </div>
        <div class="col-md-6">
            <img src="{{ url('image/show/'.$case->doctor->profile_image) }}" class="img-responsive img-thumbnail" alt="{{ $case->doctor->name }}">
        </div>
    </div>
</div>