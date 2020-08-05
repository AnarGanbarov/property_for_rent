<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'house_id',
        'url_photo',
        'list_number'
    ];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
