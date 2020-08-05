<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenience extends Model
{
    protected $fillable = [
        'name'
    ];

    public function parameters()
    {
        return $this->belongsToMany(House::class);
    }
}
