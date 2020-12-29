<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataakun=User::paginate(10);
        $cari=null;
        return view('admin/akun',['dataakun'=>$dataakun,'cari'=>$cari]);
    }
//
    public function cari(Request $request){

        try {
            $minta=$request->cari;
//            dd($request->all());
            $cari=User::where('name','like',"%".$minta."%")->orWhere('email','like','%'.$minta .'%')->paginate(5);
//            dd($cari->all());
            $dataakun=User::paginate(10);
            return view('admin/akun',['dataakun'=> $dataakun,'cari'=>$cari])->with('hasil','hasil pencarian  '.$request->cari);
        }
        catch (QueryException $e){
            $dataakun=User::paginate(10);
            return redirect()->route('admin.index',['dataakun'=> $dataakun])->with('hasil','hasil pencarian tidak ditemukan');
//            dd($e);
        }
        catch (\Exception $e){
            $dataakun=User::paginate(10);
            return redirect()->route('admin.index',['dataakun'=> $dataakun]);
        }
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/buatakun');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        $messages = [
            'required' => 'Tidak Boleh Kosong!!',
            'unique:users'=>'email sudah digunakan',
        ];
        $this->validate($request,[
            'nama' => 'required', 'max:255',
            'email' => 'required', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'min:8',
            'status'=>'required'
        ],$messages);
        try {
            $user->create([
                'name'=>$request->nama,
                'email'=>$request->email,
                'password' => bcrypt($request->password),
                'created_at'=>now()
            ]);
            return redirect()->route('akun.index')->with('pesan','sukses ditambahkan');
        }catch (QueryException $e){
            return redirect()->route('akun.create')->with('pesan','email sudah digunakan');
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
        $akun=User::find($id);
        return view('admin\ubahakun',['dataakun'=>$akun]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun=User::find($id);
        return view('admin\ubahakun',['dataakun'=>$akun]);
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
            $user=User::where('email',$request->email)->get('email');
//            dd($user);

                User::find($id)->update([
                    'name'=>$request->nama,
                    'email'=>$request->email,
                ]);
                return redirect()->route('akun.index')->with('pesan','sukses terubah');


        }catch (QueryException $e){
            $akun=User::find($id);
            return redirect()->route('akun.edit',[$akun->id])->with('pesan','gagal terubah');
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
            $user=auth()->user();
            $akun=$user->find($id);
            $akun->delete();
            return redirect()->route('akun.index')->with('pesan','sukses terhapus');
        }
        catch (QueryException $e){
            return redirect()->route('akun.index')->with('pesan','gagal dihapus');
        }
    }
}
