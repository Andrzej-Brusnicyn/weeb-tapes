<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TapeFilter
{
    protected array $filters;

    public function __construct(Request $request)
    {
        $this->filters = $request->validated();
    }

    public function apply(Builder $query): Builder
    {
        $this->applyGenreFilter($query);
        $this->applySearchFilter($query);
        $this->applySort($query);

        return $query;
    }

    protected function applyGenreFilter(Builder $query)
    {
        if (!empty($this->filters['genre'])) {
            $genres = explode(',', $this->filters['genre']);
            $query->where(function ($q) use ($genres) {
                foreach ($genres as $genre) {
                    $q->orWhere('genre', 'like', "%$genre%");
                }
            });
        }
    }

    protected function applySearchFilter(Builder $query)
    {
        if (!empty($this->filters['search'])) {
            $words = array_filter(explode(' ', $this->filters['search']));
            foreach ($words as $word) {
                $query->where('title', 'like', "%$word%");
            }
        }
    }
    protected function applySort(Builder $query)
    {
        $sortColumn = $this->filters['sort_by'] ?? 'updated_at';
        $sortDirection = $this->filters['sort_direction'] ?? 'desc';

        $query->orderBy($sortColumn, $sortDirection);
    }
}