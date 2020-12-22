<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable=[
        'user_id','nama','jumlah','harga'
    ];

    public function barangmasuk(){
        return $this->hasMany('App\Barangmasuk');
    }


    public function barangkeluar(){
        return $this->hasMany('App\Barangkeluar');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
