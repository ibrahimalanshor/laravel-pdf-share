<?php

namespace App\Http\Livewire;

use App\Repositories\CategoryRepository;

use Livewire\Component;

class Sidebar extends Component
{

	public $active;

	public function filter(int $categoryId)
	{
		if ($this->active === $categoryId) {
			$this->emit('filter');
			$this->reset('active');
		} else {
			$this->emit('filter', $categoryId);
			$this->active = $categoryId;
		}
	}

    public function render(CategoryRepository $category)
    {
    	$categories = $category->get();
    	$active = $this->active;

        return view('livewire.sidebar', compact('categories', 'active'));
    }
}
