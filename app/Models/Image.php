<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::deleted(function (Image $image) {
           unlink(storage_path('/app/public/' . $image->name));
        });
    }


    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
