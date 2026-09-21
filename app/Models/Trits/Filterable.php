<?php

namespace App\Models\Trits;

use App\Http\Filters\FilterInterFace;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{

    public function scopeFilterRequest(Builder $builder, FilterInterFace $filter)
    {
        $filter->apply($builder);

        return $builder;
    }

}
