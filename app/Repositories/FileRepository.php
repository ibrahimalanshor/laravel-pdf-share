<?php 

namespace App\Repositories;

use App\Models\File;

class FileRepository extends Repository {

	public function __construct(File $file)
	{
		$this->model = $file;
	}

	public function search(string $name = null): Object
	{
		return $this->model->where('name', 'like', '%'.$name.'%')->with(['categories:name'])->withAvg('rating as star', 'star')->latest()->paginate(6);
	}

	public function filter(int $categoryId, string $name = null): Object
	{
		return $this->model->where('name', 'like', '%'.$name.'%')->whereHas('categories', function ($category) use($categoryId)
		{
			return $category->where('category_file.category_id', $categoryId);
		})->with(['categories:name'])->withAvg('rating as star', 'star')->latest()->paginate(6);
	}

	public function addViewed(string $slug)
	{
		$this->model->whereSlug($slug)->increment('viewed');
	}

	public function addDownloaded(string $slug)
	{
		$this->model->whereSlug($slug)->increment('downloaded');
	}

	public function findBySlug(string $slug): Object
	{
		return $this->model->whereSlug($slug)->firstOrFail();
	}

	public function getBySlug(string $slug): Object
	{
		return $this->model->with(['categories:name', 'user:id,name'])->withAvg('rating as star', 'star')->whereSlug($slug)->firstOrFail();
	}

	public function getUserFiles(int $userId): Object
	{
		return $this->model->with(['categories' => function ($category)
		{
			return $category->take(5);
		}])->whereUserId($userId)->get(['id', 'name', 'slug']);
	}

	public function getSavedFile(int $user): Object
	{
		return $this->model->whereHas('savedFile', function ($file) use($user)
		{
			return $file->whereUserId($user);
		})->with(['categories'])->withAvg('rating as star', 'star')->latest()->paginate(6);
	}

	public function get(): Object
	{
		return $this->model->with('user:id,name')->get(['id', 'name', 'user_id']);
	}

}

 ?>