<div class="container-fluid">
    <div class="col-xs-12">
        <form action="{{ route('shifts.store') }}" method="post" class="form-horizontal" >
            {{ csrf_field() }}

            <div class="form-group">
                <legend>Create shift <small class="text-muted">Today: {{ $today }}</small></legend>
            </div>

            @if($companies->isEmpty())
            <div class="alert alert-info">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	 Please, <a class="alert-link" href="{{ route('settings') }}">add companies</a> first!
            </div>
            @endif

            @forelse($errors->all() as $error)
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Sorry!</strong> {{ $error }}
                </div>
            @empty
            @endforelse

            <div class="form-group">
                <label for="companies" class="col-sm-2 control-label">Company</label>
                <div class="col-sm-10">
                    <select name="company_id" id="companies" class="form-control">

                       @forelse($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @empty
                           <option>no companies</option>
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="shift-date" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-10">
                    <input type="text" name="date" class="form-control" id="shift-date" value="{{ $yesterday or '' }}" placeholder="Date" required/>
                </div>
            </div>

            <div class="form-group">
                <label for="shift-tip" class="col-sm-2 control-label">Tip</label>
                <div class="col-sm-10">
                    <input type="number" name="tip" min="0" class="form-control" id="shift-tip" placeholder="Tip">
                </div>
            </div>


            <div class="form-group pull-right">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>