<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Comment;
class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title','url','description'];
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
