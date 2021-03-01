<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function district(){
        return $this->belongsTo('App\Models\shipDistrict','district_id');
    }
    public function division(){
        return $this->belongsTo('App\Models\shipDivision','division_id');
    }
    public function thana(){
        return $this->belongsTo('App\Models\shipThana','thana_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
