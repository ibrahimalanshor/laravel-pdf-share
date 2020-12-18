<?php 

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends Repository {

	public function __construct(Comment $comment)
	{
		$this->model = $comment;
	}

	public function countFileComments(int $file): Int
	{
		return $this->model->whereFileId($file)->count();
	}

	public function getFileComments(int $file): Object
	{
		return $this->model->whereFileId($file)->with('user')->latest()->paginate(5);
	}

}

 ?>