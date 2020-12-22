<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barangkeluar;
use App\Barangmasuk;
use App\Gudang;
use App\HB;
use App\HBK;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class operatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testing=User::find(\auth()->user()->id);
//       dd($testing->barang()->where('user_id',\auth()->user()->id)->get());
        $id = auth()->user()->id;
        $barangkeluar=Barangkeluar::where('user_id',$id)->paginate(10);
        $namabarang=Barang::select('id','nama')->get();
        $barangmasuk=Barangmasuk::where('user_id',$id)->paginate(10);
//        dd($barangmasuk);
//        dd($namabarang);
//        dd($barangkeluar);
//        return view('operator\homepage',['bkeluar'=>$barangkeluar,'bmasuk'=>$barangmasuk,'namabarang'=>$namabarang]);
        return view('operator\homepage',['barangkeluar'=>$barangkeluar,'barangmasuk'=>$barangmasuk,'namabarang'=>$namabarang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
