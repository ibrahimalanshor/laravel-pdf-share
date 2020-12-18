<?php

namespace App\Http\Livewire\Files;

use App\Services\FileService;
use App\Repositories\FileRepository;

use Livewire\Component;

class Table extends Component
{

	protected $file;

	protected $listeners = ['delete'];

	public function delete(int $id)
	{
		$this->file->delete($id);

		session()->flash('success', 'Success Delete Data');
	}

	public function __construct()
	{
		$this->file = app()->make(FileService::class);
	}

    public function render()
    {
    	$files = $this->file->getUserFiles();

        return view('livewire.files.table', compact('files'));
    }
}
