<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    
    protected $fillable = [ 'body', 'user_id'];
    /**
    * The table associated with the model.
    *
    * @var string
    */

    use HasFactory;
    use SoftDeletes;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function media(){
        return $this->hasMany('App\Models\Media');
    }
    public function comments()
    {
        return $this->belongsToMany(User::class,'comments')->withPivot('body');;
    }
    public function likes()
    {
        return $this->belongsToMany(User::class,'likes');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag');
    }
    

    
}
