<?php

namespace Bunker\TourismBooking\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionLang extends Model
{
    use HasFactory;

    protected $table = 'region_lang';

    protected $fillable = ['region_id', 'lang', 'name'];

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
