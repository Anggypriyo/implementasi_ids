<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ec_cities extends Model
{
    protected $table = "ec_cities";
    protected $primaryKey =  "city_id";
    protected $fillable = ['city_name','prov_id'];

    public function ec_provinces(){
        return $this->belongsTo(ec_provinces::class,'prov_id');
    }
    public function ec_districts(){
        return $this->hasMany(ec_districts::class,'city_id');
    }
}
