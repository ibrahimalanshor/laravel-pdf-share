<div class="row">
	@forelse ($files as $file)
        <div class="col-sm-6 col-lg-4 col-12 mb-4 d-flex">
            <div class="card shadow-sm border-0 w-full">
                <div class="position-relative">
                	<img src="{{ $file->cover }}" alt="" class="card-img-top">
                	<div class="position-absolute top-0 p-2 categories">
                		@foreach ($file->categories as $category)
                			<span class="badge bg-primary shadow">{{ $category->name }}</span>
                		@endforeach
                	</div>
                	<div class="position-absolute w-100 h-100 top-0 left-0 overlay"></div>
                </div>
                <div class="card-body">
                    @for ($i = 0; $i < 5; $i++)
                    	<small><i class="fa fa-star {{ $i < floor($file->star) ? 'text-warning' : '' }}"></i></small>
                    @endfor
                    <a href="{{ route('detail', $file->slug) }}" class="text-body text-decoration-none"><h2 class="h5 mt-2 fw-bold">{{ $file->name }}</h2></a>
                    <p class="text-muted">
                        {{ $file->descriptionLimit }}
                    </p>
                </div>
                <div class="card-footer border-0">
                	<button class="btn mb-2 btn-primary btn-sm"><i class="fa fa-download"></i> <span class="ms-1">{{ $file->downloaded}}</span></button>
                	<button class="btn mb-2 btn-success btn-sm"><i class="fa fa-eye"></i> <span class="ms-1">{{ $file->viewed}}</span></button>
                	<button class="btn mb-2 btn-danger btn-sm" wire:click="delete({{ $file->id }})"><i class="fa fa-trash"></i> <span class="ms-1">Delete</span></button>
                </div>
            </div>
        </div>
	@empty
		<div class="col">
			Empty
		</div>
	@endforelse
    <div class="col-12">{{ $files->links() }}</div>
</div>

@push('css')
	<style>
		.card-img-top {
			height: 130px;
			object-fit: cover;
		}
		.categories {
			z-index: 99;
		}
		.overlay {
			background: rgba(0,0,0,.4);
		}
	</style>
@endpush