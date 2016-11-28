<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-4">
                <h3 class="panel-title"><b>Companies</b></h3>
            </div>
            <div class="col-xs-8">
                <a href="#" class="btn btn-xs pull-right"  data-toggle="collapse" data-target="#add-company-container" aria-expanded="false" aria-controls="#add-company-container" >
                    <i class="fa fa-plus" ></i>
                </a>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="container-fluid">
            <div style="margin-bottom: 20px;" class="collapse{{ empty($errors->all()) ? '' : '.in' }} col-xs-12 col-sm-8 col-sm-offset-2" id="add-company-container">  {{--TODO: open place form only if error from companies.store--}}
                @include('settings.companies.create')
            </div>
        </div>
        @forelse( $companies as $company)
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                    <div class="col-xs-8">
                        <h4><b>{{ $company->name }}</b></h4>
                        <small>{{ $company->address }} {{ $company->salary }} {{ $company->song_percent }}</small>
                    </div>
                    <div class="col-xs-4">
                        <div class="pull-right">
                            <a class="btn btn-xs" href="{{ route('companies.edit', ['id' => $company->id]) }}"><i class="fa fa-edit"></i> </a>
                            <span class="btn btn-xs" onclick="$('#destroy-company-{{ $company->id }}').submit();return false;"><i class="text-danger fa fa-times"></i> </span>
                        </div>
                        <form id="destroy-company-{{ $company->id }}" action="{{ route('companies.destroy', ['id' => $company->id]) }}" method="post" class="hide">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>

                    </div>
                    </div>


                </li>
            </ul>
        @empty
            <div class="text-center text-muted">
                No companies
            </div>
        @endforelse
    </div>
</div>
