@if(count($errors) > 0)
	<div class="row">
		<div class="col-md-6 col-md-offset-3 error">
			<ul>
				@foreach ($errors->all() as $error)
					<li class="alert alert-danger text-center">{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif

@if(Session::has('message'))
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="alert alert-info text-center">
				{{ Session::get('message') }}
			</div>
		</div>
	</div>
@endif
