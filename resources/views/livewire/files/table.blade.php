<div class="table-responsive">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@forelse ($files as $file)
        		<tr>
        			<td>{{ $loop->iteration }}</td>
        			<td>{{ $file->name }}</td>
        			<td>
        				@foreach ($file->categories as $category)
        					<span class="badge bg-primary">{{ $category->name }}</span>
        				@endforeach
        			</td>
        			<td>
        				<a href="{{ route('user.files.edit', $file->slug) }}" class="btn btn-sm btn-success">Edit</a>
        				<a href="{{ route('user.files.show', $file->slug) }}" class="btn btn-sm btn-info">Show</a>
        				<button onclick="remove({{ $file->id }})" class="btn btn-sm btn-danger delete">Delete</button>
        			</td>
        		</tr>
        	@empty
        		<tr>
        			<td colspan="4" align="center">Empty</td>
        		</tr>
        	@endforelse
        </tbody>
    </table>
</div>

@push('js')
    
    <script>
        const remove = id => {
            if (confirm('Delete ?')) {
                Livewire.emit('delete', id)
            }
        } 
    </script>

@endpush