<div class="card shadow-sm border-0">
	<div class="card-header bg-white">
		<h2 class="h5 py-1 mb-0 fw-bold card-title">Comment {{ $count }}</h2>
	</div>
	<div class="card-body">
		@forelse ($comments as $comment)
			<div class="mb-3 border-bottom row g-3">
				<div class="col-auto col-sm-2 text-center">
					<img src="{{ image($comment->user->detail->photo ?? 'default.jpg') }}" class="img-fluid rounded-circle" style="height: 40px; width: 40px; object-fit: cover;" alt="">
				</div>
				<div class="col">
					<h4 class="h6 fw-bold mb-0">{{ $comment->user->name }}</h4>
					<time class="text-muted"><small>{{ $comment->time }}</small></time>
					<p>
						{{ $comment->text }}
					</p>
				</div>
			</div>
		@empty
			Empty
		@endforelse
		{{ $comments->links() }}
	</div>
	<div class="card-footer">
		@auth
			<form wire:submit.prevent="comment" class="mb-2">
				<div class="mb-3">
					<label class="form-label">Comment</label>
					<textarea rows="2" class="form-control @error('text') is-invalid @enderror" placeholder="Cool" wire:model="text"></textarea>

					@error('text')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
				<button class="btn btn-primary">Send</button>
			</form>
		@endauth
		@guest
			Login To Comment
		@endguest
	</div>
</div>