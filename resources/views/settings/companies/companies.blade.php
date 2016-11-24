<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Companies</h3>
    </div>

    <div class="panel-body">
        <div class="container-fluid">
                @include('settings.companies.create')
        </div>
        @forelse( $companies as $company)
            <ul class="list-group">
                <li class="list-group-item">
                    <i class="pull-right btn btn-link" onclick="$('#destroy-place-{{ $company->id }}').submit();return false;"><i class="text-danger fa fa-times"></i> </i>
                    <h4><b>{{ $company->name }}</b></h4>
                    <small>{{ $company->address }} {{ $company->salary }} {{ $company->song_percent }}</small>
                    <form id="destroy-place-{{ $company->id }}" action="{{ route('companies.destroy', ['id' => $company->id]) }}" method="post" class="hide">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        @empty
            <div class="text-center text-muted">
                No places
            </div>
        @endforelse



        <div class="">

        </div>
    </div>
</div>
