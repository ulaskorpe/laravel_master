<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name','code'];

    public function posts() : HasManyThrough
    {
        return $this->hasManyThrough(Post::class,User::class,
                    'country_id','user_id','id','id'
            );
    }
}
