<?php 

namespace App\Traits;

trait FileTrait {

	public function uploadFile(object $file): String
	{
		$fileName = $this->getFileName($file);
		$file->storeAs('public/images', $fileName);

		return $fileName;
	}

	public function getFileName(object $file): String
	{
		$fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
		$extension = $file->extension();

		$fileName = $fileName.'_'.time().'.'.$extension;

		return $fileName;
	}

	public function getFileSize(object $file): Int
	{
		return $file->getSize();
	}

	public function convertSize(int $size): String
	{
		$bytes = collect([
			'mb' => pow(1024, 2),
			'kb' => 1024,
			'b' => 1
		]);

		$bytes->each(function ($byte, $type) use(&$size)
		{
			if ($size >= $byte) {
				$size = number_format($size / $byte, 2).' '.$type;
				return false;
			}
		});

		return $size;
	}

}

 ?>