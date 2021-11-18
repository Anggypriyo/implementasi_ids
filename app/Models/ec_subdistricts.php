<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ec_subdistricts extends Model
{
    protected $table = "ec_subdistricts";
    protected $primaryKey =  "subdis_id";
    protected $fillable = ['subdis_name','dis_id'];

    public function ec_districts(){
        return $this->belongsTo(ec_districts::class,'dis_id');
    }

    public function customer(){
        return $this->hasMany(customer::class,'subdis_id');
    }
}
