<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add Category</h2>
		</div>
	</div>

	{{-- error message --}}
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="row mb-4">
		<div class="col-12 col-xl-8">

			<div class="card card-body border-0 shadow mb-4">
				<h2 class="h5 mb-4">Category information</h2>

				<form method="POST" action="{{ route('categories.store') }}">

					@csrf

					<div class="row">

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" id="name" name="name" type="text" placeholder="Category Name" value="{{ old('name') }}" required>
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="description">Description</label>
								<input class="form-control" id="description" name="description" type="text" placeholder="Description" value="{{ old('description') }}" required>
							</div>
						</div>

					</div>

					<div class="mt-3">
						<button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save</button>
					</div>

				</form>

			</div>

		</div>
	</div>
</x-app-layout>