<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const FIRST_HOUR = 200;
    const HALF_HOUR = 100;
    const EIGHT_HOUR = 1000;
    const LONGTERM_DAY = 600;

    protected $fillable = ['total'];

    protected $casts = [
        'total' => 'integer'
    ];

    public function park()
    {
        return $this->belongsTo(Park::class);
    }
}
