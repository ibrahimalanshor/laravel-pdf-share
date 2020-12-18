<div class="col-sm-6 mx-auto">
	@if (session()->has('success'))
	  <div class="alert alert-success alert-dismissible">
	    {{ session('success') }}
	    <button class="close" data-dismiss="alert">&times;</button>
	  </div>
	@endif
    <div class="card">
    <form wire:submit.prevent="save">
    	<div class="card-header">
    		<h2 class="h5 card-title">Setting</h2>
    	</div>
    	<div class="card-body">
    		<div class="form-group">
    			<label>Site Name</label>
    			<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Site Name" value="{{ $name }}" wire:model="name" autofocus>

    			@error('name')
    				<span class="invalid-feedback">{{ $message }}</span>
    			@enderror
    		</div>
    	</div>
    	<div class="card-footer">
    		<button class="btn btn-primary" type="submit">Update</button>
    	</div>
    </form>
    </div>
</div>
