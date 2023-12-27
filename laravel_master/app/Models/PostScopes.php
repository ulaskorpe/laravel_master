<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
trait PostScopes {


    public function scopePublished(Builder $builder)
    {
       return $builder->where('is_published',true);
    }

    public function scopeWithUserData(Builder $builder){
       return $builder->join('users','posts.user_id','=','users.id')
       ->select('posts.*','users.name','users.email' );
    }

    public function scopePublishedByUser(Builder $builder,$user_id){
       return $builder->where('user_id',$user_id);

    }
}