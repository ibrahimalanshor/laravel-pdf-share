<?php

namespace App\Http\Livewire\User;

use App\Repositories\FileRepository;
use App\Repositories\SavedFileRepository;

use Livewire\Component;
use Livewire\WithPagination;

class Saved extends Component
{

    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

	public function delete(int $id, SavedFileRepository $repo)
	{
		$user = auth()->id();

		$repo->delete($id, $user);
	}

    public function render(FileRepository $file)
    {
    	$user = auth()->id();
    	$files = $file->getSavedFile($user);

        return view('livewire.user.saved', compact('files'));
    }
}
