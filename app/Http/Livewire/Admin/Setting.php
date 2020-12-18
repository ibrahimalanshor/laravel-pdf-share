<?php

namespace App\Http\Livewire\Admin;

use App\Repositories\SiteRepository;

use Livewire\Component;

class Setting extends Component
{

	public $name;

	protected $site;
	protected $rules = [
		'name' => 'required|string'
	];

	public function __construct()
	{
		$this->site = app()->make(SiteRepository::class);
	}

	public function mount()
	{
		$this->name = site('name');
	}

	public function save()
	{
		$data = $this->validate();

		$this->site->update($data);
		session()->flash('success', 'Success Update Setting');
	}

    public function render()
    {
        return view('livewire.admin.setting');
    }
}
