<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    protected $table = 'barangmasuk';
    protected $fillable=[
        'user_id','pemasok','jumlah','hargabeli','barang_id'
    ];

    public function barang(){
        return $this->belongsTo('App\Barang');
    }
}
