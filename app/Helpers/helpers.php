<?php 

function active(string $url, $group = null): String
{
	$active = $group ? request()->is($url) || request()->is($url.'/*') : request()->is($url);

	return $active ? 'active' : '';
}

function site(string $key)
{
	return cache('site')->$key;
}

function image(string $img = null): String
{
	$img = $img ?? 'default.jpg';
	return asset('storage/images/'.$img);
}

function localDate(string $date = null): String
{
	$date = $date ? date('d M Y', strtotime($date)) : date('d M Y');
	
	return $date;
}

 ?>