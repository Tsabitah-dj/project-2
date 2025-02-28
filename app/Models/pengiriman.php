<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';
    protected $primarykey = 'id';
    protected $fillable = ['karyawan_id','barang_id','jumlah','alamat'];

    public function karyawan()
    {
        return $this->belongsTo('App\Models\karyawan');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\barang');
    }
}

    