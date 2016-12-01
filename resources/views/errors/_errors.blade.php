@forelse($errors->all() as $error)
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Soory!</strong> {{ $error }}
</div>
@empty
@endforelse