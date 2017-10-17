<div class="col-md-4" style="padding: 0">
    <div class="panel panel-default">
        <div class="panel-body">
            <button type="button" class="btn btn-default btn-sm btn-block" data-toggle="collapse" data-target="#wound{{$wound->id}}">
                View
            </button>
            <div id="wound{{$wound->id}}" class="collapse">
                <img class="img-responsive img-thumbnail" src="{{ url('image/show/'.$wound->original_image) }}" alt="">
            </div>
            <hr>
            <p>บริเวณแผล : {{ $wound->site }}</p>
            <p>สถานะแผล :
                <span class="label label-warning">{{ $wound->status }}</span>
            </p>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ url('admin/wound/'.$wound->id) }}">Healing Progress</a>
        </div>
    </div>
</div>