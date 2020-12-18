<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = ['birth', 'gender', 'phone', 'address', 'photo', 'user_id'];

    public function getPhotoSrcAttribute(): String
    {
    	return image($this->photo);
    }

    public function getBirthDateAttribute()
    {
    	return localDate($this->birth);
    }

    public function getAddressAttribute($address)
    {
    	return $address ?? 'World';
    }

    public function getPhoneAttribute($phone)
    {
    	return $phone ?? '+62';
    }

    public function getGenderAttribute($Gender)
    {
    	return $phone ?? 'male';
    }
}
