<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";
    protected $primaryKey =  "id_customer";
    protected $fillable = ['nama','alamat','foto','file_path','id_kel'];
    public $incrementing = false;
    public $timestamps = false;
    public function ec_subdistricts(){
        return $this->belongsTo(ec_subdistricts::class,'id_kel');
    }
}
