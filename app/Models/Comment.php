<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'file_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function file()
    {
    	return $this->belongsTo(File::class);
    }

    public function getTimeAttribute(): String
    {
    	return localDate($this->created_at);
    }
}
