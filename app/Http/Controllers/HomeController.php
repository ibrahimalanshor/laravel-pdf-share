<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepository;
use App\Repositories\RatingRepository;
use App\Repositories\UserRepository;
use App\Services\SavedFileService;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{

	protected $file;

	public function __construct(FileRepository $file)
	{
		$this->file = $file;
	}

	public function detail(string $slug): View
	{
		$this->file->addViewed($slug);

		$file = $this->file->getBySlug($slug);

		return view('detail', compact('file'));
	}

	public function download(Request $request, string $slug, RatingRepository $rating)
	{
		$this->file->addDownloaded($slug);
		$file = $this->file->getBySlug($slug);

		if ($request->filled('star')) {
			$request->merge([
				'file_id' => $file->id
			]);

			$rating->create($request->all());
		}

		return response()->download('storage/images/'.$file->file);
	}

	public function user(int $id, UserRepository $repo): View
	{
		$user = $repo->getOne($id);

		return view('user', compact('user'));
	}

	public function save(string $slug, SavedFileService $service): RedirectResponse
	{
		$user = auth()->id();
		$file = $service->saveFile($user, $slug);

		return back()->with('success', 'Success Save File');
	}
}
