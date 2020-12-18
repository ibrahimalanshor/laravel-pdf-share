<?php

namespace App\Http\Livewire;

use App\Repositories\CommentRepository;

use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{

	use WithPagination;

	public $text;
	public $file;

	protected $repo;
	protected $paginationTheme = 'bootstrap';
	protected $rules = [
		'text' => 'required|string'
	];

	public function __construct()
	{
		$this->repo = app()->make(CommentRepository::class);
	}

	public function comment()
	{
		$this->validate();

		$data = [
			'text' => $this->text,
			'user_id' => auth()->id(),
			'file_id' => $this->file
		];

		$this->repo->create($data);
	}

	public function mount(int $file)
	{
		$this->file = $file;
	}

    public function render()
    {
    	$comments = $this->repo->getFileComments($this->file);
		$count = $this->repo->countFileComments($this->file);
		
        return view('livewire.comment', compact('comments', 'count'));
    }
}
