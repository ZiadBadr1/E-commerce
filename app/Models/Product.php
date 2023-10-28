<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory , HasSlug , SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'slug',
        'is_featured',
        'discount_precentage',
        'in_stock',
        'category_id',
        'description',
        'store_id',
        'is_active',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? null, function ($query) use ($filters) {
            $status = ($filters['status'] == 'active') ? true : (($filters['status'] == 'archived') ? false : null);

            $query->where('is_active', $status);
        });

        $query->when($filters['name'] ?? null, function ($query) use ($filters) {
            $query->where('name', 'like', '%'.$filters['name'].'%');
        });

        $query->when($filters['store_id'] ?? null, function ($query) use ($filters) {
            $query->where('store_id', $filters['store_id']);
        });

    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
