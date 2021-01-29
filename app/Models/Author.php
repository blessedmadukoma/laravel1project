<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table ='author';

    public function post() {
        return $this->hasOne('App\Models\Post', 'author_id');
    }
}
