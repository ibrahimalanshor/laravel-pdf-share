<?php 

namespace App\Repositories;

use App\Models\SavedFile;

class SavedFileRepository {

	public function __construct(SavedFile $savedFile)
	{
		$this->model = $savedFile;
	}

	public function create(array $data)
	{
		$this->model->create($data);
	}

	public function delete(int $id, int $user)
	{
		$this->model->where([
			'file_id' => $id,
			'user_id' => $user,
		])->delete();
	}

}

 ?>