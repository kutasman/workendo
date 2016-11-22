@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Shifts</div>

    <ul class="list-group">
        @forelse($shifts as $shift)
            <li class="list-group-item">
                {{ $shift->getCarbonDate()->format('Y-m-d') }}

                <form class="hide" method="post" id="destroy-shift-{{ $shift->id }}" action="{{ route('shifts.destroy', ['id' => $shift->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
                <span class="btn btn-xs pull-right" onclick="$('#destroy-shift-{{ $shift->id }}').submit();return false;">
                    <i class="fa text-danger fa-times"></i>
                </span>

            </li>
        @empty
        @endforelse
    </ul>

    <div class="text-center">
        {{ $shifts->links() }}
    </div>

</div>

@endsection
