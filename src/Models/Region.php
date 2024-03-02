<?php

namespace Bunker\TourismBooking\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';

    protected $fillable = ['uuid', 'thumbnail', 'status'];

    public function languages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RegionLang::class);
    }

    public function getRegionByLocale($locale)
    {
        return $this->languages()->where('lang', $locale)->first();
    }

}
