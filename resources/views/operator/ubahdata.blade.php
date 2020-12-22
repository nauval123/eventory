@extends('operator/layout')
@section('kontenoperator')
    @if($jenis==1)
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
                    <form method="POST" action="{{route("barangmasuk.update",[$barangmasuk->id])}}">
                        @csrf
                        @method('put')
                        <div class="card-header text-center">
                            <h2>Barang Masuk</h2>
                        </div>
{{--                        {{dd($barang[0]->id)}}--}}
                        <div class="card-body">
                            <div class="form-group">
                                <label >id barang</label>
                                <select  class="form-control" name="id" required>
                                    @foreach($barang as $b)
                                        <option value="{{$b->id}}">{{$b->id}}--{{$b->nama}}</option>
                                    @endforeach
                                    @foreach($barangtotal as $b)
                                        <option value="{{$b->id}}">{{$b->id}}-- {{$b->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label>nama barang</label>--}}
{{--                                <input name="nama" type="text" class="form-control" @if($barang) value="{{$barang[0]->nama}}" @endif required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label>pemasok</label>
                                <input name="pemasok" type="text" class="form-control"  @if($barangmasuk) value="{{$barangmasuk->pemasok}}" @endif required>
                            </div>
                            <div class="form-group">
                                <label>jumlah</label>
                                <input name="jumlah" type="number" min="1" class="form-control"  @if($barangmasuk) value="{{$barangmasuk->jumlah}}" @endif required>
                            </div>
                            <div class="form-group">
                                <label>harga beli</label>
                                <input name="harga" type="number" class="form-control" min='1' placeholder="masukkan harga"   @if($barangmasuk) value="{{$barangmasuk->hargabeli}}" @endif required>
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
                    <form method="POST" action="{{route("barangkeluar.update",[$barangkeluar->id])}}">
                        @csrf
                        @method('put')
                        <div class="card-header text-center">
                            <h2>Barang Masuk</h2>
                        </div>
                        {{--                        {{dd($barang[0]->id)}}--}}
                        <div class="card-body">
                            <div class="form-group">
                                <label >id barang</label>
                                <select  class="form-control" name="id" required>
                                    @foreach($barang as $b)
                                        <option value="{{$b->id}}">{{$b->id}}--{{$b->nama}}</option>
                                    @endforeach
                                    @foreach($barangtotal as $b)
                                        <option value="{{$b->id}}">{{$b->id}}-- {{$b->nama}} </option>
                                    @endforeach
                                </select>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <label>nama barang</label>--}}
                            {{--                                <input name="nama" type="text" class="form-control" @if($barang) value="{{$barang[0]->nama}}" @endif required>--}}
                            {{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>pemasok</label>--}}
{{--                                <input name="pemasok" type="text" class="form-control"  @if($barangmasuk) value="{{$barangmasuk->pemasok}}" @endif required>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label>jumlah</label>
                                <input name="jumlah" type="number" min="1" class="form-control"  @if($barangkeluar) value="{{$barangkeluar->jumlah}}" @endif required>
                            </div>
                            <div class="form-group">
                                <label>harga beli</label>
                                <input name="harga" type="number" class="form-control" min='1' placeholder="masukkan harga"   @if($barangkeluar) value="{{$barangkeluar->hargajual}}" @endif required>
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
