<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['stars', 'comment', 'store_id', 'picture', 'history_id'];

    public function history(): BelongsTo
    {
        return $this->belongsTo(History::class, 'history_id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsToThrough(Store::class, History::class);
    }
}
