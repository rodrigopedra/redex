<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading_List extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_reading_list');
    }
}

