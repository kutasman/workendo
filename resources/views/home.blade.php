@extends('layouts.app')

@section('content')

@if(!$shifts->isEmpty())

    <div class="well well-sm">
        <span class="text-info">{{ \Carbon\Carbon::today()->format('F Y') }}</span>
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <h1><strong class="text-success">Total: {{ $total }}</strong></h1>
            </div>
            <div class="col-xs-12 col-sm-7">
                <h1><small>Tip: {{ $tip }}, Salary: {{ $salary }}, Shifts: {{ $shifts->count() }}</small></h1>
            </div>
        </div>
    </div>

@endif

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-4">
                <h3 class="panel-title"><b>Shifts</b></h3>
            </div>

            <div class="col-xs-8">
                <a class="btn btn-xs pull-right"  data-toggle="collapse" href="#add-new-shift" aria-expanded="false" aria-controls="collapseExample">
                   <i class="fa fa-plus"></i>
                </a>
            </div>

        </div>
    </div>


    <div id="add-new-shift" class="collapse{{ $shiftsErrors ? '.in' : '' }}">
        @include('shifts.create')
    </div>


    <table class="table table-striped table-hover table-bordered">
        @if(!$shifts->isEmpty())
    	<thead>
    		<tr>
    			<th>#</th>
                <th>Day of Week</th>
    			<th>Company</th>
    			<th>Tip</th>
    			<th>Date</th>
                <th>Action</th>
    		</tr>
    	</thead>
        @endif

    	<tbody>
        @forelse($shifts as $shift)
            <tr>
                <td width="5%">{{ $shift->getCarbonDate()->day }}</td>
                <td width="15%">{{ $shift->getCarbonDate()->format('D') }}</td>
                <td width="20%">{{ $companies->where('id',$shift->company_id)->first()->name}}</td>
                <td width="25%">{{ $shift->tip }}</td>
                <td width="25%">{{ $shift->getCarbonDate()->format('Y-m-d') }}</td>
                <td width="10%">
                    <a class="btn btn-xs" href="{{ route('shifts.edit', ['id' => $shift->id]) }}"><i class="fa fa-edit"></i></a>

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
            <div class="text-center text-muted"><h3>They must hunger in winter that will not work in summer...</h3></div>
        @endforelse

    	</tbody>
    </table>



</div>

@endsection
