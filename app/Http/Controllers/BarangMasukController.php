<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barangkeluar;
use App\Barangmasuk;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis=1;
        $barang=Barang::all();
        return view('operator.tambahdata',['jenis'=>$jenis,'barang'=>$barang]);
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
                'id' => 'required',
                'pemasok'=>'required',
                'jumlah' => 'required',
                'harga' => 'required',
            ]);

                Barangmasuk::create([
                    'user_id'=>auth()->user()->id,
                    'barang_id'=>$request->id,
                    'pemasok'=>$request->pemasok,
                    'hargabeli'=>$request->harga,
                    'jumlah'=>$request->jumlah,
                    'created_at'=>now(),
                ]);
            $barange=Barang::where('id',$request->id)->firstOrFail();;
            $keluar=Barangkeluar::where('barang_id',$request->id)->sum('jumlah');
            $masuk=Barangmasuk::where('barang_id',$request->id)->sum('jumlah');
            $jumlahbarang=$masuk-$keluar;
          $this->masukin($barange,$jumlahbarang);
                return redirect()->route('operator.index')->with('pesan','barang berhasil ditambahkan');

        }catch (QueryException $e){

            return redirect()->route('barangmasuk.index')->withInput('pesan','barang berhasil ditambahkan');
        }
    }

     public function masukin($request,$id){
        try {
            Barang::find($request->id)->update([
                'jumlah'=>$id,
            ]);
            return redirect()->route('barangmasuk.index')->with('pesan','barang berhasil ditambahkan');
        }catch (QueryException $e){
            return redirect()->route('barangmasuk.index')->with('pesan','barang gagal ditambahkan');
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
        $jenis=1;
        $data=Barangmasuk::where('id',$id)->firstOrFail();
        $data2=Barang::select('id','nama')->where('id',$data->barang_id)->get();
        $data3=Barang::all();
        return view('operator.ubahdata',['jenis'=>$jenis,'barang'=>$data2,'barangtotal'=>$data3,'barangmasuk'=>$data]);
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
                'id' => 'required',
                'pemasok'=>'required',
                'jumlah' => 'required',
                'harga' => 'required',
            ]);

            Barangmasuk::find($id)->update([
                'user_id'=>auth()->user()->id,
                'barang_id'=>$id,
                'pemasok'=>$request->pemasok,
                'hargabeli'=>$request->harga/$request->jumlah,
                'jumlah'=>$request->jumlah,
                'updated_at'=>now(),
            ]);
            $keluar=Barangkeluar::where('barang_id',$request->id)->sum('jumlah');
            $masuk=Barangmasuk::where('barang_id',$request->id)->sum('jumlah');
            $jumlahbarang=$masuk-$keluar;
            Barang::find($request->id)->update([
                'jumlah'=>$jumlahbarang,
            ]);
            return redirect()->route('operator.index')->with('pesan','data barang masuk berhasil diubah');
        }catch (\Exception $e){
            return redirect()->route('operator.index')->with('pesan','data barang masuk gagal diubah');
        }catch (QueryException $e){
            return redirect()->route('operator.index')->with('pesan','data barang masuk gagal diubah');
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
        try {
            $hapus=Barangmasuk::find($id);
            $hapus->delete();
            $keluar=Barangkeluar::where('barang_id',$hapus->barang_id)->sum('jumlah');
            $masuk=Barangmasuk::where('barang_id',$hapus->barang_id)->sum('jumlah');
            $jumlahbarang=$masuk-$keluar;
            Barang::find($hapus->barang_id)->update([
                'jumlah'=>$jumlahbarang,
            ]);
            return redirect()->route('operator.index')->with('pesan','sukses terhapus');
        }
        catch (QueryException $e){
            return redirect()->route('operator.index')->with('pesan','gagal dihapus');
        }
    }
}
