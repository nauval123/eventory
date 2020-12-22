@extends('admin/layout')
@section('kontenadmin')
    <section class="section">
        <div class="section-body">
            @if ($errors->any())
                <div class="form-group">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info alert-has-icon alert-dismissible">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>x</span>
                                    </button>
                                    <p>{{$error}}</p>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card ml-xl-5 mr-xl-5">

                <form method="post" action="{{route("stok.store")}}">
                    @csrf
                    <div class="card-header text-center">
                        <h2>Barang Masuk</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>nama barang</label>
                            <input name="nama" type="text" class="form-control" placeholder="masukkan nama barang" value="{{old('nama')}}" required>
                        </div>
                        <div class="form-group">
                            <label>jumlah</label>
                            <input name="jumlah" type="number" min="1" class="form-control" placeholder="masukkan jumlah" value="{{old('jumlah')}}" required>
                        </div>
                        <div class="form-group">
                            <label>harga</label>
                            <input name="harga" type="number" class="form-control" min='1' placeholder="masukkan harga satuan"  value="{{old('harga')}}" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">tambahkan</button>
                        <a href="{{route('admin.index')}}" class="btn btn-warning">cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
