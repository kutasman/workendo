
    <form  action="{{ route('companies.store') }}" method="post" role="form">
        {{ csrf_field() }}
        <legend>Add new company</legend>

        @forelse( $errors->all() as $error )
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Sorry!</strong> {{ $error }}
            </div>
        @empty
        @endforelse

        <div class="form-group">
            <label for="">Company name</label>
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
            <label for="salary-type-id" >Salary type</label>
            <select id="salary-type-id" class="form-control" name="salary_type_id">
                @forelse($salaryTypes as $salaryType)
                    <option value="{{ $salaryType->id }}">{{ $salaryType->type }} ( {{$salaryType->description }} )</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="">Songs percent</label>
            <input type="number" max="100" min="0" class="form-control" name="song_percent" value="{{ old('song_percent') }}">
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
