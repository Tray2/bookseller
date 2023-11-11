<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected function published(): Attribute
    {
        return Attribute::make(
            set: function (bool $value) {
                if ($value) {
                   return Carbon::now();
                }
                return null;
            }
        );
    }

}
