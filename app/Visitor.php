<?php 

namespace App;

use App\Models\Visitor as Model;

class Visitor {

	public static function add($ip)
	{
		$user = Model::firstOrCreate([
			'user' => $ip
		]);

		$user->increment('times');
	}

	public static function count(): Int
	{
		return Model::sum('times');
	}

}

 ?>