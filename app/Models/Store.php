<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        "status", 'name', 'address', 'business_hour', 'air_condition', 'parking_lot',
        'introduction', 'front_picture', "view_picture", "inside_picture", "ac_picture",
        "parking_lot_picture", "business_license_pic", 'owner_id', 'coordinates', 'max_capacity', "confirmed_at"
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function aWorkingDay(): HasOne
    {
        return $this->hasOne(AWorkingDay::class, 'store_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, "store_id");
    }
}
