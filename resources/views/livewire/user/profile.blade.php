<div>
	@if (session()->has('success'))
	    <div class="alert alert-success alert-dismissible">
	        {{ session('success') }}
	        <button class="btn-close" data-bs-dismiss="alert"></button>
	    </div>
	@endif
	<div class="card shadow-sm border-0">
	<form wire:submit.prevent="save" enctype="multipart/form-data">
	    <div class="card-header bg-white">
	        <h2 class="h5 mb-0 py-1 fw-bold card-title">Edit Profile</h2>
	    </div>
	    <div class="card-body">
	        <div class="mb-3">
	        	<label class="form-label">Name</label>
	        	<input type="text" class="form-control @error('user.name') is-invalid @enderror" placeholder="Name" wire:model="user.name" autofocus>

	        	@error('user.name')
	        		<span class="invalid-feedback">{{ $message }}</span>
	        	@enderror
	        </div>
	        <div class="row g-3">
	        	<div class="col-sm-6">
			        <div class="mb-3">
			        	<label class="form-label">Birth</label>
			        	<input type="date" class="form-control @error('detail.birth') is-invalid @enderror" placeholder="Birth" wire:model="detail.birth">

			        	@error('detail.birth')
			        		<span class="invalid-feedback">{{ $message }}</span>
			        	@enderror
			        </div>
	        	</div>
	        	<div class="col-sm-6">
			        <div class="mb-3">
			        	<label class="form-label">Gender</label>
			        	<select class="form-control @error('detail.gender') is-invalid @enderror" wire:model="detail.gender">
			        		<option value="male">Male</option>
			        		<option value="female">Female</option>
			        	</select>

			        	@error('detail.gender')
			        		<span class="invalid-feedback">{{ $message }}</span>
			        	@enderror
			        </div>
	        	</div>
	        </div>
	        <div class="mb-3">
	        	<label class="form-label">Phone</label>
	        	<input type="number" class="form-control @error('detail.phone') is-invalid @enderror" placeholder="Phone" wire:model="detail.phone">

	        	@error('detail.phone')
	        		<span class="invalid-feedback">{{ $message }}</span>
	        	@enderror
	        </div>
	        <div class="mb-3">
	        	<label class="form-label">Address</label>
	        	<textarea class="form-control @error('detail.address') is-invalid @enderror" placeholder="Address" wire:model="detail.address"></textarea>

	        	@error('detail.address')
	        		<span class="invalid-feedback">{{ $message }}</span>
	        	@enderror
	        </div>
	        <div class="mb-3">
	        	<label class="form-label">Photo</label>
	        	<input type="file" class="form-control @error('photo') is-invalid @enderror" placeholder="Photo" wire:model="photo">
	        	<small class="form-text">Empty if not changed</small>

	        	@error('photo')
	        		<span class="invalid-feedback">{{ $message }}</span>
	        	@enderror
	        </div>
	    </div>
	    <div class="card-footer">
	    	<button class="btn btn-primary" type="submit">Save</button>
	    </div>
	</form>
	</div>
</div>