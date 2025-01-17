<x-app-layout>

	{{-- per page status --}}
	@if ( session('status') )
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
		</div>
	@endif

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
		<div class="d-block mb-md-0">
			<h2 class="h4">Categories</h2>
		</div>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="{{ route('categories.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
				<i class="icon icon-xs me-2 bi bi-plus-lg"></i>
				Add Category
			</a>
		</div>
	</div>

	<div class="table-settings mb-4">
		<div class="row align-items-center justify-content-between">
			<div class="col col-md-6 col-lg-3 col-xl-4">
				<form action="{{ route('categories.index') }}" method="GET">
					<div class="input-group me-2 me-lg-3 fmxw-400">
						<input type="text" name="search" value="{{ $searchVal }}" class="form-control" placeholder="Search name">
						<span class="input-group-text">
							<button type="submit" class="btn btn-xs">
								<i class="icon fs-6 bi bi-search"></i>
							</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="card border-0 shadow mb-5">

		<div class="card-body table-wrapper table-responsive ">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="border-gray-200">Name</th>
						<th class="border-gray-200">Description</th>
						<th class="border-gray-200">Date Added</th>
						<th class="border-gray-200">Date Updated</th>
						<th class="border-gray-200">Action</th>
					</tr>
				</thead>
				<tbody>
	
					@forelse ($categories as $category)
						<tr>
							<td valign="middle">
								<span class="fw-normal">{{ $category->name }}</span>
							</td>
							<td valign="middle"><span class="fw-normal">{{ $category->description }}</span></td>
							<td valign="middle"><span class="fw-normal">{{ $category->created_at }}</span></td>
							<td valign="middle"><span class="fw-normal">{{ $category->updated_at }}</span></td>
							<td valign="middle">
								<a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-pill btn-outline-tertiary">Show</a>
							</td>
						</tr>
					@empty
						<tr class="text-center">
							<td colspan="5">No data.</td>
						</tr>
					@endforelse
	
				</tbody>
			</table>
		</div>

		<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">

			{{-- pagination --}}
			{{ $categories->links('vendor.pagination.bootstrap-5') }}
	
		</div>

	</div>

</x-app-layout>