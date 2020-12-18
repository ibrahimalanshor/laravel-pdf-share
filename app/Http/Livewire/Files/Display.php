<?php

namespace App\Http\Livewire\Files;

use App\Repositories\FileRepository;

use Illuminate\Http\Request;

use Livewire\Component;
use Livewire\WithPagination;

class Display extends Component
{

	use WithPagination;

	public $search;
	public $category;

	protected $repo;
	protected $paginationTheme = 'bootstrap';
	protected $listeners = ['filter' => 'setCategory'];

	public function __construct()
	{
		$this->repo = app()->make(FileRepository::class);
	}

	public function setCategory(int $category = null)
	{
		$this->category = $category ?? null;
	}

	public function search(): Object
	{
		return $this->repo->search($this->search);
	}

	public function filter(): Object
	{
		return $this->repo->filter($this->category, $this->search);
	}

	public function mount(Request $request)
	{
		$this->search = $request->q;
	}

    public function render()
    {
		$files = $this->category ? $this->filter() : $this->search();
        return view('livewire.files.display', compact('files'));
    }
}
