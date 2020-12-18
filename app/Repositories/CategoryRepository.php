<?php 

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository {

	public function __construct(Category $category)
	{
		$this->model = $category;
	}

	public function search(): Object
	{
		return $this->model->pluck('name');
	}

	public function get(): Object
	{
		return $this->model->whereHas('files')->withCount('files')->get();
	}

	public function getIdByName(string $name): Int
	{
		return $this->model->firstOrCreate(['name' => $name])->id;
	}

}

 ?>