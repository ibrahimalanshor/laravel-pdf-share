<?php 

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository extends Repository {

	public function __construct(Rating $rating)
	{
		$this->model = $rating;
	}

}

 ?>