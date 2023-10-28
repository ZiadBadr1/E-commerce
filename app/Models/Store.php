<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'seller_id',
        'description',
        'is_active',
    ];

    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['name'] ?? false, function ($builder, $value) {

            $builder->where('name', 'LIKE', "%{$value}%");
        });
        $builder->when($filters['is_active'] ?? false, function ($builder, $value) {

            $builder->where('is_active', '=', $value);
        });
    }

}
