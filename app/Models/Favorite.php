<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Note that here `Favorite` extends from `Pivot` instead from `Model`.
 * `Pivot` is already a sub-class of `Model` but with added methods useful
 * for pivot models.
 *
 * Having a custom pivot model is also optional for a many-to-many relation
 * as Laravel will try to instantiate a shallow `Pivot` model if none is defined.
 *
 * But it might be useful if later on an admin panel you want to iterate
 * favorites regardless of user or book for reporting/statistics purposes.
 *
 * Custom Pivot models are described more in-depth in the docs:
 * https://laravel.com/docs/8.x/eloquent-relationships#defining-custom-intermediate-table-models
 */
class Favorite extends Pivot
{
    protected $table = 'favorites';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
