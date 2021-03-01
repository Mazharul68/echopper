<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipDistrict extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
        return $this->belongsTo('App\Models\shipDivision','division_id');
    }
}
