<?php 

namespace App\Services;

use App\Repositories\FileRepository;
use App\Traits\FileTrait; 

use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class FileService {

	use FileTrait;

	protected $repo;

	public function __construct(FileRepository $repo)
	{
		$this->repo = $repo;
	}

	public function store(object $data)
	{
		$categories = $this->getCategories($data->category);
		
		$cover = $this->uploadFile($data->cover);
		$file = $this->uploadFile($data->file);
		$fileSize = $this->getFileSize($data->file);

		$data = collect($data->except('cover', 'file'));
		$data = $data->merge([
			'cover' => $cover,
			'file' => $file,
			'size' => $fileSize,
			'user_id' => Auth::id()
		]);

		$file = $this->repo->create($data->all());
		$file->categories()->attach($categories);
	}

	public function update(object $data, int $id)
	{
		$categories = $this->getCategories($data->category);
		
		if ($data->hasFile('cover')) {
			$cover = $this->uploadFile($data->cover);
			
			$data = collect($data->except('cover'));
			$data = $data->merge([
				'cover' => $cover
			]);
		} else {
			$data = collect($data->except('cover'));
		}

		$file = $this->repo->update($data->all(), $id);
		$file->categories()->sync($categories);
	}

	public function delete(int $id)
	{
		$file = $this->repo->find($id);

		if (request()->user()->cannot('delete', $file)) {
			abort(403);
		};

		$file->delete();
	}

	public function getCategories(array $name): Array
	{
		$category = app()->make(CategoryService::class);
		$categories = $category->getIdByName($name);

		return $categories;
	}

	public function getUserFiles(): Object
	{
		return $this->repo->getUserFiles(Auth::id());
	}

	public function getDatatables(): Object
	{
		$datatables = Datatables::of($this->repo->get())
					->addIndexColumn()
					->addColumn('date', function ($file)
					{
						return $file->date;
					})
					->addColumn('action', '<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></button>')
					->make();

		return $datatables;
	}

}

 ?>