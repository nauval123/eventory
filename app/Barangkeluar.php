<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    protected $table = 'barangkeluar';
    protected $fillable=[
        'user_id','jumlah','hargajual','barang_id'
    ];

    public function barang(){
        return $this->belongsTo('App\Barang');
    }
}
