<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['stars', 'comment', 'picture', 'user_id', "store_id"];
    public $timestamps = false;

    public function history(): HasOne
    {
        return $this->hasOne(History::class, 'review_id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, "store_id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
