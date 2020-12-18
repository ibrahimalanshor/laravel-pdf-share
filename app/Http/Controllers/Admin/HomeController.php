<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\FileRepository;
use App\Repositories\UserRepository;
use App\Visitor;
use App\Http\Controllers\Controller;

use Illuminate\View\View;

class HomeController extends Controller
{

	public function index(FileRepository $file, UserRepository $user): View
	{
		$totalFile = $file->count();
		$totalUser = $user->count();
		$totalVisitor = Visitor::count();

		return view('admin.home', compact('totalFile', 'totalUser', 'totalVisitor'));
	}

}
