<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Places</h3>
    </div>

    <div class="panel-body">
        <div class="container-fluid">

            <div class="row">
                <div class="pull-right">
                    <button style="margin-bottom: 20px;" class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#add-place-container" aria-expanded="false" aria-controls="#add-place-container" >
                        <i class="fa fa-plus" ></i>
                    </button>
                </div>

                <div style="margin-bottom: 20px;" class="collapse{{ empty($errors->all()) ? '' : '.in' }} col-xs-12 col-sm-8 col-sm-offset-2" id="add-place-container">  {{--TODO: open place form only if error from places.store--}}
                    <form  action="{{ route('places.store') }}" method="post" role="form">
                        {{ csrf_field() }}
                        <legend>Add new work place</legend>

                        @forelse( $errors->all() as $error )
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Sorry!</strong> {{ $error }}
                            </div>
                        @empty
                        @endforelse

                        <div class="form-group">
                            <label for="">Place name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Salary</label>
                            <input type="number" max="10000" min="0" class="form-control" name="salary" value="{{ old('salary') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Songs percent</label>
                            <input type="number" max="100" min="0" class="form-control" name="song_percent" value="{{ old('song_percent') }}">
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @forelse( $places as $place )
            <ul class="list-group">
                <li class="list-group-item">
                    <i class="pull-right btn btn-link" onclick="$('#destroy-place-{{ $place->id }}').submit();return false;"><i class="text-danger fa fa-times"></i> </i>
                    <h4><b>{{ $place->name }}</b></h4>
                    <small>{{ $place->address }} {{ $place->salary }} {{ $place->song_percent }}</small>
                    <form id="destroy-place-{{ $place->id }}" action="{{ route('places.destroy', ['id' => $place->id]) }}" method="post" class="hide">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        @empty
            <p>No places</p>
        @endforelse



        <div class="">

        </div>

    </div>
</div>
