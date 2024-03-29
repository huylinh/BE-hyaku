<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AWorkingDay extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['store_id', 'guests', 'updated_time'];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
