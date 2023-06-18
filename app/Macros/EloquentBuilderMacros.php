<?php

namespace App\Macros;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;

class EloquentBuilderMacros
{
    public static function register()
    {
        /**
         * search multiple columns using the LIKE operator
         */
        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $attributes = Arr::wrap($attributes);

            return $this->where(function (Builder $q) use ($attributes, $searchTerm) {
                foreach ($attributes as $attribute) {
                    $q->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                }
            });
        });
    }
}
