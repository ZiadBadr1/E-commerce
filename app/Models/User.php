<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserTypes;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'type',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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

        $query->when($filters['type'] ?? null, function ($query) use ($filters) {
            $query->where('type', 'like', '%'.$filters['type'].'%');
        });
    }

    public function scopeSeller($query)
    {
        $query->where('type' , UserTypes::SELLER->value);
    }

    public function scopeAdmin($query)
    {
        $query->where('type', UserTypes::ADMIN->value);
    }

    public function scopeCustomer($query)
    {
        $query->where('type', UserTypes::CUSTOMER->value);
    }

    public function getStoreAttribute()
    {
        $sellerStore = Store::where('seller_id' , $this->id)->first();
        return $sellerStore;
    }

}
