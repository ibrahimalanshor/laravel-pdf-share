<?php 

namespace App\Repositories;

class Repository {

	public $model;

	public function create(array $data): Object
	{
		return $this->model->create($data);
	}

	public function update(array $data, int $id)
	{
		$model = $this->model->findOrFail($id);
		$model->update($data);

		return $model;
	}

	public function delete(int $id)
	{
		$model = $this->model->findOrFail($id);
		$model->delete();
	}

	public function find(int $id, array $relation = [])
	{
		return $this->model->with($relation)->findOrFail($id);
	}

	public function get(): Object
	{
		return $this->model->get();
	}

	public function count(): Int
	{
		return $this->model->count();
	}

}

 ?>