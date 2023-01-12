<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'status' => 'boolean'
    ];

    public function getStatusAttribute($value){
        if($value == true)
            return "Active";
        else
            return "Disabled";
    }

    public function setStatusAttribute($value){
        if($value == "true")
            $this->attributes['status'] = true;
        else
            $this->attributes['status'] = false;
    }
}
