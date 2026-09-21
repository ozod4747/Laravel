<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterFace
{
    public function apply(Builder $builder);
}
