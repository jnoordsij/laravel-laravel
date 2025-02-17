<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Relation;

class Related extends Model
{
    /**
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeSearchOriginal(Builder $query, ?string $search = null): Builder
    {
        return $query->whereHas('user', fn ($q) => $q->search($search));
    }

    /**
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeSearch(Builder $query, ?string $search = null): Builder
    {
        $user = $query->getModel()->user();

        return $query->whereHas($user, fn ($q) => $q->search($search));
    }

    /**
     * @param  Builder<static>  $query
     * @return Builder<static>
     */
    public function scopeSearchAlternative(Builder $query, ?string $search = null): Builder
    {
        return $query->whereHas(
            Relation::noConstraints(fn () => $query->getModel()->user()),
            fn ($q) => $q->search($search),
        );
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
