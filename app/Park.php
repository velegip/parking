<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{

    protected $fillable = ['plate','longterm'];

    protected $dates = ['created_at','updated_at','paid_to','closed_at'];

    protected $casts = [
        'longterm' => 'boolean',
    ];


    public function scopeActive($query)
    {
        return $query->whereNull('closed_at');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
