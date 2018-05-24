<div class="row well">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="panel panel-primary text-center">
                <div class="panel-heading ">
                    <h3>Doctor</h3>
                </div>
                <div class="panel-body">
                    <img src="{{ url('image/show/'.$case->doctor->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $case->doctor->name }}">
                    <h4>{{ $case->doctor->name }}</h4>
                </div>
                <div class="panel-footer">
                    <a href="" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-warning">
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
                    <a href="{{ url('admin/case/'.$case->id) }}" style="display: inline-block" class="btn btn-primary">View</a>
                    @if(Request::is('admin/*'))
                        <a href="{{ url('admin/case/'.$case->id.'/edit') }}" style="display: inline-block" class="btn btn-warning">
                            Edit
                        </a>

                        {!! Form::model($case, ['url' => 'admin/case/'.$case->id, 'method' =>'delete', 'style' => 'display: inline-block']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-success text-center">
                <div class="panel-heading ">
                    <h3>Patient</h3>
                </div>
                <div class="panel-body">
                    <img src="{{ url('image/show/'.$case->patient->profile_image) }}" class="img-responsive img-thumbnail profile-img" alt="{{ $case->patient->name }}">
                    <h4>{{ $case->patient->name }}</h4>
                </div>
                <div class="panel-footer">
                    <a href="" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
    </div>
</div>