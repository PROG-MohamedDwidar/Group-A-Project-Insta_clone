<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Collection;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Fullname',
        'username',
        'phone',
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
    ];

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function comments()
    {
        return $this->belongsToMany(Post::class,'comments');
    }
    public function likes()
    {
        return $this->belongsToMany(Post::class,'likes');
    }
    public function following()
    {
        return $this->belongsToMany(User::class,'follows','follower_id','followed_id');
    }  
    public function followers()
    {
        return $this->belongsToMany(User::class,'follows','followed_id','follower_id');
    }
    
    public function feed()
    {
        $posts=new Collection();
        $this->following()
            ->each(function($User,$key) use (&$posts){
                $posts=$User->posts->merge($posts);
            });
        return ($posts);
    }
}
