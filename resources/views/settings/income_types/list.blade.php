<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Income types           <a class="pull-right btn btn-xs" href="{{ route('income-types.create') }}"><i class="fa fa-plus"></i> </a>
        </h3>
    </div>
    <div class="panel-body">
    <ul class="list-group">
        @forelse($income_types as $income_type)
            <li class="list-group-item">{{ $income_type->income_type_name }} <i class="fa fa-times btn btn-xs pull-right text-danger" onclick="event.preventDefault();$('#destroy-income-type-{{$income_type->id}}').submit(); return false;"></i> </li>
            <form id="destroy-income-type-{{$income_type->id}}" action="{{ route('income-types.destroy', ['id' =>$income_type->id]) }}" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
            </form>
        @empty
            <span class="text-muted">Nothing here</span>
        @endforelse
    </ul>

</div>
</div>
