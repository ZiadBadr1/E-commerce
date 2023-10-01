<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $fillable = ['name', 'description', 'parent_id', 'image', 'slug', 'is_active', 'created_at', 'updated_at'];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['name'] ?? false, function ($builder, $value) {

            $builder->where('name', 'LIKE', "%{$value}%");
        });
        $builder->when($filters['is_active'] ?? false, function ($builder, $value) {

            $builder->where('is_active', '=', $value);
        });
    }

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
}
