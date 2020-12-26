@extends('admin/layout')
@section('kontenadmin')
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
                <div class="card-header">
                    <h4><a href="{{route('stok.index')}}" class="btn btn-primary">
                            +  barang baru
                        </a></h4>
                    <div class="card-header-action">
                        <form method="post" action="{{route('admin.store')}}">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="cari nama barang/id" required>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>id barang</th>
                                <th>nama barang</th>
                                <th>jumlah</th>
                                <th>Tanggal</th>
                                <th>Action</th>

                            </tr>
                            @foreach($stok as $a)
                                    <tr>
                                        <td id="idbarang">{{$a->id}} </td>
                                        <td id="namabarang">{{$a->nama}}</td>
                                        <td id="jumlah">{{$a->jumlah}}</td>
                                        <td id="created_at">{{$a->created_at}}</td>
                                        <td>
                                            <a href="{{route('stok.edit',[$a->id])}}"  class="btn btn-success">
                                                detail
                                            </a>
                                            <form action="{{route('stok.destroy',[$a->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?, histori barang keluar dan masuk yang bersangkutan akan ikut terhapus!')" type="submit">hapus</button>
                                            </form>
{{--                                            <a href="#"  class="btn btn-danger" onclick="return confirm('Yakin menghapus barang?')">--}}
{{--                                                hapus--}}
{{--                                            </a>--}}
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
                        {{$stok->links()}}
                    </div>
                </div>
            </div>
        </div>
{{--        {{session(hasil)}}--}}
        @if($cari!=null)
{{--            @if(session('hasil'))--}}
{{--                <div class="form-group">--}}
{{--                    <div class="alert alert-info alert-has-icon alert-dismissible">--}}
{{--                        <div class="alert-body">--}}
{{--                            <button class="close" data-dismiss="alert">--}}
{{--                                <span>x</span>--}}
{{--                            </button>--}}
{{--                            <p>{{session('hasil')}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$hasil}}</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>id barang</th>
                                    <th>nama barang</th>
                                    <th>jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>

                                </tr>
                                @foreach($cari as $a)
                                    <tr>
                                        <td></td>
                                        <td id="idbarang">{{$a->id}} </td>
                                        <td id="namabarang">{{$a->nama}}</td>
                                        <td id="jumlah">{{$a->jumlah}}</td>
                                        <td id="created_at">{{$a->created_at}}</td>
                                        <td>
                                            <a href="{{route('stok.edit',[$a->id])}}"  class="btn btn-success">
                                                detail
                                            </a>
                                            <a href="#"  class="btn btn-danger" onclick="return confirm('Yakin menghapus barang?')">
                                                hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$cari->links()}}
                        </div>
                    </div>
                </div>
            </div>
            @endif
    </section>
@endsection
