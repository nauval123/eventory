<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cari='';
        $stok=Barang::paginate(10);
        return view('admin.homepage',['stok'=>$stok,'cari'=>$cari]);
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
        try {
            $minta=$request->cari;
//            dd($request->all());
            $cari=Barang::where('nama','like',"%".$minta."%")->orWhere('id','like','%'.$minta .'%')->paginate(5);
            $stok=Barang::paginate(10);
            return view('admin.homepage',['stok'=>$stok,'cari'=>$cari,'hasil'=>$request->cari])->with('hasil','hasil pencarian  '.$request->cari);
        }
        catch (QueryException $e){
            return redirect()->route('admin.index')->with('hasil','hasil pencarian tidak ditemukan');
//            dd($e);
        }
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
