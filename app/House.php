<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'address',
        'description',
        'count_room',
        'apartment_area',
        'x_coordinate',
        'y_coordinate',
        'bought',
        'cost'
        ];

    // Один ко многим
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    // Многие ко многим
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class);
    }

    // Многие ко многим
    public function conveniences()
    {
        return $this->belongsToMany(Convenience::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
