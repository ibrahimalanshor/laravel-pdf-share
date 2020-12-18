<?php

namespace App\Http\Livewire\User;

use App\Traits\FileTrait;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{

	use WithFileUploads, FileTrait;

	public $user;
	public $detail;
	public $photo;

	protected $rules = [
		'user.name' => 'required|string',
		'detail.birth' => 'required|date',
		'detail.gender' => 'required|in:male,female',
		'detail.phone' => 'required|numeric',
		'detail.address' => 'required|string',
		'photo' => 'image|nullable'
	];

	public function save()
	{
		$data = $this->validate(array_merge($this->rules, [
			'user.name' => 'required|string|unique:users,name,'.$this->user->id
		]));

		if ($this->photo) {
			$photo = $this->uploadFile($this->photo);

			$this->detail->photo = $photo;
		}

		$this->user->save();
		$this->detail->save();

		session()->flash('success', 'Success Update Profile');
	}

	public function mount()
	{
		$this->user = auth()->user();
		$this->detail = auth()->user()->detail;
	}

    public function render()
    {
        return view('livewire.user.profile');
    }
}
