<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;



    protected $dates=['deleted_at'];
    protected $fillable = ['title','content'];

    public $directory = "/images/";


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->morphMany('App\Models\Photo','imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }

    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }

}
