<?php

namespace Sandbox;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Carbon;

abstract class Model extends BaseModel
{
    /**
     * Scope for valid entries.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeValid(Builder $query): Builder
    {
        return $query->whereDate('ValidUntil', '>=', Carbon::today())
                     ->orWhereNull('ValidUntil');
    }

    /**
     * Regular where scope.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeTest(Builder $query): Builder
    {
        return $query->where('Column', true);
    }

    /**
     * Or null where scope.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeTestOrNull(Builder $query): Builder
    {
        return $query->test()->orWhereNull('Column');
    }

    /**
     * Or null where scope.
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeTestWhereNull(Builder $query): Builder
    {
        return $query->whereNull('Column');
    }
}
