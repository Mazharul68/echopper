<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipThana extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function district(){
        return $this->belongsTo('App\Models\shipDistrict','district_id');
    }
    public function division(){
        return $this->belongsTo('App\Models\shipDivision','division_id');
    }
}
