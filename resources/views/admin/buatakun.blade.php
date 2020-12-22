@extends('admin/layout')
@section('kontenadmin')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Akun</h1>
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
                 <div class="card ml-xl-5 mr-xl-5">
                        <form method="post" action="{{route('akun.store')}}">
                            @csrf
                            <div class="card-header">
                                <h4>Input Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>nama</label>
                                    <input name="nama" type="text" class="form-control" value="{{old('nama')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Masukkan Email" value="{{old('email')}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="text" class="form-control" placeholder="masukkan password" value="{{old('password')}}" required>
                                </div>
                                <div class="form-group">
                                        <select  class="form-control" name="status" required>
                                            <option disabled selected value> pilih status </option>
                                            <option value="1">admin</option>
                                            <option value="0">operator</option>
                                        </select>
                                </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Simpan</button>
                                <a href="{{route('akun.index')}}" class="btn btn-danger">Cancel</a>
                            </div>
                            </div>
                        </form>
                 </div>
                    </div>
        </section>

@endsection
