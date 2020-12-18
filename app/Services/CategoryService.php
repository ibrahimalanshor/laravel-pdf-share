<?php 

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService {

	protected $repo;

	public function __construct(CategoryRepository $repo)
	{
		$this->repo = $repo;
	}

	public function getIdByName(array $names): Array
	{
		$categoryId = collect();
		$names = collect($names);

		$names->each(function ($name) use($categoryId)
		{
			$id = $this->repo->getIdByName($name);
			$categoryId->push($id);
		});

		return $categoryId->all();
	}

}

 ?>