<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;


    public function files()
    {
        return $this->hasMany(RequestFiles::class,'request_id');
    }
}
