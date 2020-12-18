<?php 

namespace App\Services;

use App\Repositories\SavedFileRepository;
use App\Repositories\FileRepository;

class SavedFileService {

	protected $savedFile;

	public function __construct(SavedFileRepository $savedFile)
	{
		$this->savedFile = $savedFile;
	}

	public function saveFile(int $id, string $slug)
	{
		$file = app()->make(FileRepository::class);

		$file = $file->findBySlug($slug);

		$this->savedFile->create([
			'user_id' => $id,
			'file_id' => $file->id
		]);
	}

}

 ?>