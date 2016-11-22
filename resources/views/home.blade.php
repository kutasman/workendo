@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-4">
                <b>Shifts</b>
            </div>
            <div class="col-xs-8">
                <a href="{{ route('shifts.create') }}" class="pull-right btn btn-link btn-xs"><i class="fa fa-plus"></i> </a>
            </div>
        </div>
    </div>


    <table class="table table-striped table-hover">
    	<thead>
    		<tr>
    			<th>Day</th>
    			<th>Place</th>
    			<th>Tip</th>
    			<th>Date</th>
                <th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
        @forelse($shifts as $shift)
            <tr>
                <td>{{ $shift->getCarbonDate()->day }}</td>
                <td>{{ $places[$shift->place_id] }}</td>
                <td>{{ $shift->tip }}</td>
                <td>{{ $shift->getCarbonDate()->format('Y-m-d') }}</td>
                <td>
                    <span class="btn btn-xs"><i class="fa fa-edit"></i></span>

                    <form class="hide" method="post" id="destroy-shift-{{ $shift->id }}" action="{{ route('shifts.destroy', ['id' => $shift->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    <span class="btn btn-xs" onclick="$('#destroy-shift-{{ $shift->id }}').submit();return false;">
                        <i class="fa text-danger fa-times"></i>
                    </span>
                </td>
            </tr>
        @empty
        @endforelse

    	</tbody>
    </table>



</div>

@endsection
