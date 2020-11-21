<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $imagePath = isset($this->image) ? $this->image : 'default/no_image_available.png';

        return '/storage/'.$imagePath;
    }
}
