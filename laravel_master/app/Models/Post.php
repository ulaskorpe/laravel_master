<?php

namespace App\Models;

use App\Models\Scopes\PublishedWithinThirtyDaysScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Comment;
class Post extends Model
{
    use HasFactory,SoftDeletes , Prunable, PostScopes;
    protected $table ='posts';

     protected $fillable = ['title','description','slug','user_id','min_to_read','excerpt' ];
     protected $guarded = ['is_published' ];

     protected static function booted():void 
     {
      //  static::addGlobalScope(new PublishedWithinThirtyDaysScope());
     }


  

    //protected $primaryKey= 'id';
//    public $timestamps = false;
  //  public $increment = false ;
  ///protected $keyType = 'string';

  //protected $attributes  = ["user_id"=>2 , 'is_published'=>false ];

  //protected $connection = 'sqllite';
  /**
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subMonth());
    }



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'post_tag');
    }
    public function image() : MorphOne
    {
            return $this->morphOne(Image::class,'imageable');
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
