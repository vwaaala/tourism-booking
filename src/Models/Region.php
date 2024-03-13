<?php

namespace Bunker\TourismBooking\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'tb_regions';

    protected $fillable = ['uuid', 'thumbnail', 'status', 'name_bd', 'name_en', 'slug'];


    protected static function boot() {
        parent::boot();

        static::creating(function ($region) {
            $region->slug = str()->slug($region->name_en);
        });
    }
}
