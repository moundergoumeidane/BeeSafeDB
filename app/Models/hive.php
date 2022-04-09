<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hive extends Model
{
    protected $fillable=[
        'temperature','humidity','weight','sound_level','longitude','latitude','activity'
    ];

    public function site()
    {
        return $this->hasOne(site::class);
    }
}
