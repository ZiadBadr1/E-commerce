<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'parent_id', 'image', 'slug', 'status', 'created_at', 'updated_at'];

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

    public function scopeFilter(Builder $builder , $filters)
    {

        $builder->when($filters['name']??false , function ($builder , $value){

            $builder->where('name','LIKE',"%{$value}%");
        });
        $builder->when($filters['status']??false , function ($builder , $value){

            $builder->where('status','=',$value);
        });

    }
}
