<?php

namespace App\Models;

use App\Models\Media;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'code','sellprice','buyprice','description'
    ];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    function likes()
    {
        return $this->belongsToMany(Article::class);
    }

    public function isLiked()
    {
        if(auth()->check()){
            return auth()->user()->likes->contains('id',$this->id);
        }
    }
}
