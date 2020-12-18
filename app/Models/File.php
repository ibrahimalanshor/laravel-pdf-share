<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\FileTrait;

class File extends Model
{
    use HasFactory, FileTrait;

    protected $fillable = ['name', 'slug', 'writer', 'size', 'description', 'cover', 'file', 'user_id'];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function rating()
    {
    	return $this->hasMany(Rating::class);
    }

    public function savedFile()
    {
        return $this->hasMany(SavedFile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setSlugAttribute($name)
    {
        $this->attributes['slug'] = Str::slug($name);
    }

    public function getCoverAttribute($cover): String
    {
    	return image($cover);
    }

    public function getSizeAttribute($size): String
    {
        return $this->convertSize($size);
    }

    public function getDescriptionLimitAttribute(): String
    {
        return Str::limit($this->description, 50);
    }

    public function getDateAttribute(): String
    {
        return localDate($this->created_at);
    }
}
