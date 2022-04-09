<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hive;

class site extends Model
{
    protected $fillable=[
        'name'
];

    public function hives()
    {
        return $this->hasOne(hive::class);
    }
}
