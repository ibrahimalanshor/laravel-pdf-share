<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\FileRepository;

use Yajra\Datatables\Datatables;

class UserService {

	protected $repo;

	public function __construct(UserRepository $repo)
	{
		$this->repo = $repo;
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->repo->get())
					->addIndexColumn()
					->addColumn('confirmed', function ($user)
					{
						return $user->confirmed;
					})
					->addColumn('action', '<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></button>')
					->rawColumns(['confirmed', 'action'])
					->make();

		return $datatables;
	}

}

 ?>