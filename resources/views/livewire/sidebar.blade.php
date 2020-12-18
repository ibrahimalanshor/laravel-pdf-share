<div class="card shadow-sm border-0">
	<div class="card-header bg-white">
		<h2 class="h5 py-1 mb-0 fw-bold card-title">Category</h2>
	</div>
	<div class="card-body">
		<div class="list-group">
			@forelse ($categories as $category)
				<li class="list-group-item d-flex justify-content-between {{ $active === $category->id ? 'active' : '' }}" wire:click="filter({{ $category->id }})">
					{{ $category->name }}
					<span class="badge bg-secondary">{{ $category->files_count }}</span>
				</li>
			@empty
				<li class="list-group-item">
					Empty
				</li>
			@endforelse
		</div>
	</div>
</div>