<?php

namespace App\Http\Controllers\User;

use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

	protected $category;

	public function __construct(CategoryRepository $category)
	{
		$this->category = $category;
	}

	public function search(): Object
	{
		return $this->category->search();
	}

}
