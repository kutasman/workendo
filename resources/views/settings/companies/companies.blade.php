<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-4">
                <h3 class="panel-title"><b>Companies</b></h3>
            </div>
            <div class="col-xs-8">
                <a href="{{ route('companies.create') }}" class="btn btn-xs pull-right" >
                    <i class="fa fa-plus" ></i>
                </a>
            </div>
        </div>
    </div>

    <div class="panel-body">
        @if( Session::has('permission_denied') )
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Sorry</strong> {{ Session::get('permission_denied') }}
            </div>
        @endif
        @forelse( $companies as $company)

            <div class="list-group-item">
                <h3 class="list-group-item-heading">{{ $company->name }} <small>{{ $company->address }}</small></h3>
                @forelse($company->incomes as $income)
                    {{ $income_types->keyBy('id')[$income->income_type_id]['income_type_name'] }} : {{ $income->rules }}
                @empty
                @endforelse
                <p class="list-group-item-text">
                    <a href="{{ route('companies.incomes.create', ['company_id' => $company->id]) }}">Add income</a>
                </p>
            </div>
        @empty
            <div class="text-center text-muted">
                No companies
            </div>
        @endforelse
    </div>
</div>