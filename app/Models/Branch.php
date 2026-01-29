<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Branch extends Model
{
    protected $fillable = ['business_id', 'name', 'location', 'is_main'];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function scopeForUser(Builder $query, $user)
    {
        // Super Admin → everything
        if ($user->hasRole('super-admin')) {
            return $query;
        }

        // Manager → branches under same business
        if ($user->hasRole('manager')) {
            return $query->where('business_id', $user->business_id);
        }

        // Staff / Cashier → own branch only
        return $query->where('id', $user->branch_id);
    }

}
