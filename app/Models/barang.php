<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = "barang";
    protected $primaryKey =  "id_barang";
    protected $fillable = ['nama','timestamp'];

}
