<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ec_districts extends Model
{
    protected $table = "ec_districts";
    protected $primaryKey =  "dis_id";
    protected $fillable = ['dis_name','city_id'];

    public function ec_cities(){
        return $this->belongsTo(ec_cities::class,'city_id');
    }
    public function ec_subdistricts(){
        return $this->hasMany(ec_subdistricts::class,'dis_id');
    }
}
