<div class="container-fluid">
    <div class="col-xs-12">


    {!! BootForm::vertical(['route' =>'shifts.store']) !!}
    <legend>Create shift <small class="text-muted">Today: {{ $today }}</small></legend>
        <div class="form-group">
            <label class="control-label" for="company-id">Company</label>
            <select class="form-control" name="company_id" id="company-id">
                @forelse($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @empty
                @endforelse
            </select>
        </div>

        {!! BootForm::text('date', null, $yesterday,['id' => 'shift-date', 'placeholder' => 'Date']) !!}

        {!! BootForm::number('songs', null, null, ['min'=>0]) !!}

        {!! BootForm::number('tip', null, null, ['min:0']) !!}

        {!! BootForm::submit('Add', ['class'=>'btn btn-primary pull-right']) !!}


    {!! BootForm::close() !!}

    </div>
</div>