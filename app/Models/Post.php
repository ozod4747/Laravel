<?php

namespace App\Models;

use App\Models\Trits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = false;


    protected $fillable = [
        'title',
        'content',
        'image',
        'likes',
        'is_published',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
