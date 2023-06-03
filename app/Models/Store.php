<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'store_id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class, 'store_id');
    }

    public function a_working_day(): HasOne
    {
        return $this->hasOne(AWorkingDay::class, 'store_id');
    }
}
