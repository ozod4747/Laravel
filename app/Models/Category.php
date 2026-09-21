<?php

namespace App\Models;

use App\Models\Trits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
