<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TierList extends Model
{
    use HasFactory;

    protected $fillable = [
        'tier_merokok',
        'tier_dampak',
    ];
}
