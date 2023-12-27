<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\BalanceVerifiedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Job;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected static function booted():void 
    {
      //  static::addGlobalScope(new BalanceVerifiedScope());

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function contact():HasOne{
        return $this->hasOne(Contact::class );
    }

    public function posts():HasMany {
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function companyPhoneNumber() : HasOneThrough { ///6 arg 
        return $this->hasOneThrough(
                PhoneNumber::class, // model that own the relationship
                 Company::class, // model we are joining 
                  'user_id', // name of FK on joinin table
                  'company_id', // name of FK the model joinin on phone_numbers table 
                  'id',// name of local key 
                  'id' // name of the local key we are joing on 
                  /// if naming is right you dont need last 4 only 2 class names are required

        );
    }
  /**
     * @return HasOne
     */
    public function latestJob()
    {
        return $this->hasOne(Job::class)->latestOfMany();
    }

    /**
     * @return HasOne
     */
    public function oldestJob()
    {
        return $this->hasOne(Job::class)->oldestOfMany();
    }

    public function image() : MorphOne
    {
            return $this->morphOne(Image::class,'imageable');
    }

 
    public function latestImage() : MorphOne
    {
        return $this->morphOne(Image::class,'imageable')->latestOfMany();
    }
    public function oldestImage() : MorphOne
    {
        return $this->morphOne(Image::class,'imageable')->oldestOfMany();
    }

}
