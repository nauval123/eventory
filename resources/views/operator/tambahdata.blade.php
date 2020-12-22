@extends('operator/layout')
@section('kontenoperator')
{{--    {{dd(session('pesan'))}}--}}
    @if($jenis==1)
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
                        <form method="post" action="{{route("barangmasuk.store")}}">
                            @csrf
                            <div class="card-header text-center">
                                <h2>Barang Masuk</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select  class="form-control" name="id" required>
                                        <option disabled selected value> pilih id </option>
                                        @foreach($barang as $b)
                                        <option value="{{$b->id}}">{{$b->id}}-- {{$b->nama}} </option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <label>nama barang</label>--}}
{{--                                    <input name="nama" type="text" class="form-control" placeholder="masukkan nama barang" value="{{old('nama')}}" required>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <label>pemasok</label>
                                    <input name="pemasok" type="text" class="form-control" placeholder="masukkan nama pemasok" value="{{old('pemasok')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>jumlah</label>
                                    <input name="jumlah" type="number" min="1" class="form-control" placeholder="masukkan jumlah" value="{{old('jumlah')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>harga</label>
                                    <input name="harga" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-success">tambahkan</button>
                                <a href="{{route('operator.index')}}" class="btn btn-warning">cancel</a>
                            </div>
                        </form>
                    </div>
        </div>
        </section>
    @endif
    @if($jenis==2)
        <section class="section">
            <div class="section-body">
                <div class="card ml-xl-5 mr-xl-5">
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
                    <form method="post" action="{{route("barangkeluar.store")}}">
                        @csrf
                        <div class="card-header text-center">
                            <h2>Barang keluar</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select  class="form-control" name="id" required>
                                    <option disabled selected value> pilih id </option>
                                    @foreach($barang as $b)
                                        <option value="{{$b->id}}">{{$b->id}}-- {{$b->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="form-group">--}}
{{--                               <label>nama barang</label>--}}
{{--                               <input name="nama" type="text" class="form-control" placeholder="masukkan nama barang" value="{{old('nama')}}" required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label>jumlah</label>
                                <input name="jumlah" type="number" min="1"  class="form-control" placeholder="masukkan jumlah" value="{{old('jumlah')}}" required>
                            </div>
                            <div class="form-group">
                                <label>harga</label>
                                <input name="harga" type="number" class="form-control" min='1' placeholder="masukkan harga"  value="{{old('harga')}}" required>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success">tambahkan</button>
                            <a href="{{route('operator.index')}}" class="btn btn-warning">cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif
@endsection
