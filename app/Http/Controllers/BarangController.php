<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/tambahstok');
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
            $request->validate([
                'nama' => 'required',
                'jumlah' => 'required',
                'harga' => 'required',
            ]);
            auth()->user()->barang()->create([
                'nama'=>$request->nama,
                'harga'=>$request->harga,
                'jumlah'=>$request->jumlah,
                'created_at'=>now(),]);
            return redirect()->route('admin.index')->with('pesan','sukses ditambahkan');
        }catch (Exception $e){
//            dd($e);
            return redirect()->route('admin.index')->with('pesan','gagal ditambahkan');
        }
        catch (QueryException $e){
//            dd($e);
            return redirect()->route('admin.index')->with('pesan','gagal ditambahkan');
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
        $detail=Barang::where('id',$id)->get();
//        dd($detail);
        return view('admin/ubahstok',["stok"=>$detail]);
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
        try {
            $request->validate([
                'nama' => 'required',
                'jumlah' => 'required',
                'harga' => 'required',
            ]);
            auth()->user()->barang()->find($id)->update([
                'nama'=>$request->nama,
                'harga'=>$request->harga,
                'jumlah'=>$request->jumlah,
                'update_at'=>now(),
                ]);
            return redirect()->route('admin.index')->with('pesan','sukses diubah');
        }catch (Exception $e){
//            dd($e);
            return redirect()->route('admin.index')->with('pesan','gagal diubah');
        }
        catch (QueryException $e){
//            dd($e);
            return redirect()->route('admin.index')->with('pesan','gagal diubah');
        }


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
