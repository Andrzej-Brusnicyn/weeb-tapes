<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     *
     *
     * @param Builder $query
     * @param TapeFilter $filter
     * @return Builder
     */
    public function scopeFilter(Builder $query, TapeFilter $filter): Builder
    {
        return $filter->apply($query);
    }
}
