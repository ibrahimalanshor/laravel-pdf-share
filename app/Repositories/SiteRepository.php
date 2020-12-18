<?php 

namespace App\Repositories;

use App\Models\Site;

class SiteRepository {

	protected $site;

	public function __construct(Site $site)
	{
		$this->site = $site->first();
	}

	public function update($data)
	{
		$this->site->update($data);
	}

}

 ?>