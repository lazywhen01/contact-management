<x-app-layout>

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Add Contact</h2>
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
				<h2 class="h5 mb-4">Contact information</h2>

				<form method="POST" action="{{ route('contacts.store') }}">

					@csrf

					<div class="row">

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input class="form-control" id="first_name" name="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}" required>
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input class="form-control" id="last_name" name="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}" required>
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="sex">Sex</label>
								<select class="form-select" id="sex" name="sex" type="text" placeholder="Sex" value="{{ old('sex') }}" required>
									<option value="">Select option...</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="age">Age</label>
								<input class="form-control" id="age" name="age" type="number" placeholder="Age" value="{{ old('age') }}" required>
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required>
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