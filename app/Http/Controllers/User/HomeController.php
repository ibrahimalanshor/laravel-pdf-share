<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

class HomeController extends Controller
{

	public function index(): View
	{
		$user = auth()->user();

		$totalFiles = $user->files->count();
		$totalDownloaded = $user->files->sum('downloaded');
		$totalViewed = $user->files->sum('viewed');

		return view('user.home', compact('totalFiles', 'totalDownloaded', 'totalViewed'));
	}

}
