@extends('operator/layout')
@section('kontenoperator')

    <section class="section">
        <div class="section-header">
            <div class="container-fluid">
                <div></div>
                <h1>Halo {{auth()->user()->name}}! </h1>
            </div>
        </div>
        @if(session('pesan'))
            <div class="form-group">
                <div class="alert alert-info alert-has-icon alert-dismissible">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        <p>{{session('pesan')}}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="section-body">

            <div class="card">
                <div class="section-header">
                    <div class="container-fluid">
                        <h1>Histori Barang Masuk </h1>
                    </div>
                </div>
                <div class="card-header">
                    <h4><a href="{{route('barangmasuk.index')}}" class="btn btn-primary">
                            +  barang baru
                        </a></h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>id </th>
                                <th>nama barang</th>
                                <th>Pemasok</th>
                                <th>Harga Beli(Rp)</th>
                                <th>CreatedAt</th>
                                <th>Action</th>
                                <th>Action</th>

                            </tr>
                            @foreach($barangmasuk as $a)

                                <tr>
                                    <td>{{$a->id}}</td>
                                    <td id="idbarang">{{$a->barang_id}} </td>
                                    @foreach($namabarang as $b)
                                        @if($a->barang_id == $b->id) <td id="namabarang"> {{$b->nama}}  </td>@endif
                                    @endforeach
                                    <td id="pemasok">{{$a->pemasok}}</td>
                                    <td id="hargabeli">{{$a->hargabeli}}</td>
                                    <td id="created_at">{{$a->created_at}}</td>
                                    <td>
                                        <a href="{{route('barangmasuk.edit',[$a->id])}}"  class="btn btn-success">
                                            detail
                                        </a>
                                        <form action="{{route('barangmasuk.destroy',[$a->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')" type="submit">hapus</button>
                                        </form>
{{--                                        <a href="{{route('barangmasuk.destroy')}}"  class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')">--}}
{{--                                            hapus--}}
{{--                                        </a>--}}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                        {{$barangmasuk->links()}}
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="section-header">
                    <div class="container-fluid">
                        <h1>Histori Barang Keluar </h1>
                    </div>
                </div>
                <div class="card-header">
                    <h4><a href="{{route('barangkeluar.index')}}" class="btn btn-primary">
                            +  barang keluar
                        </a></h4>

                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>id</th>
                                <th>id barang</th>
                                <th>nama</th>
                                <th>jumlah</th>
                                <th>harga jual</th>
                                <th>CreatedAt</th>
                                <th>Action</th>

                            </tr>
                            @if($barangkeluar != null)
                                @foreach($barangkeluar as $a)

                                <tr>
                                    <td>{{$a->id}}</td>
                                    <td id="idbarang">{{$a->barang_id}} </td>
                                    @foreach($namabarang as $b)
                                        @if($a->barang_id == $b->id)<td id="namabarang"> {{$b->nama}} </td> @endif
                                    @endforeach
                                    <td id="jumlah">{{$a->jumlah}}</td>
                                    <td id="hargajual">{{$a->hargajual}}</td>
                                    <td id="created_at">{{$a->created_at}}</td>
                                    <td id="updated_at">{{$a->updated_at}}</td>
                                    <td>
                                        <a href="{{route('barangkeluar.edit',[$a->id])}}"  class="btn btn-success">
                                            detail
                                        </a>
                                        <form action="{{route('barangkeluar.destroy',[$a->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')" type="submit">hapus</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            @endif
                        </table>

                    </div>
                    {{$barangkeluar->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
