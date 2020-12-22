@extends('admin/layout')
@section('kontenadmin')

        <section class="section">
            <div class="section-header">
                <div class="container-fluid">
                    <div></div>
                    <h1>Data Akun</h1>
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
{{--            @if($cari!=null)--}}
{{--                <div class="section-body">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>Daftar Akun</h4>--}}
{{--                            <form class="card-header-form">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="search" class="form-control" placeholder="Search">--}}
{{--                                    <div class="input-group-btn">--}}
{{--                                        <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-0">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-striped">--}}
{{--                                    <tr>--}}
{{--                                        <th>Nama</th>--}}
{{--                                        <th>Email</th>--}}
{{--                                        <th>Status</th>--}}
{{--                                        <th>CreatedAt</th>--}}
{{--                                        <th>UpdatedAt</th>--}}
{{--                                        <th>Action</th>--}}
{{--                                    </tr>--}}
{{--                                    @foreach($cari as $a)--}}
{{--                                        <tr>--}}
{{--                                            <td id="nama">{{$a->name}} </td>--}}
{{--                                            <td id="email">{{$a->email}}</td>--}}
{{--                                            @if($a->admin==0)--}}
{{--                                                <td id="admin">operator</td>--}}
{{--                                            @else--}}
{{--                                                <td id="admin">admin</td>--}}
{{--                                            @endif--}}
{{--                                            <td id="created_at">{{$a->created_at}}</td>--}}
{{--                                            <td id="updated_at">{{$a->updated_at}}</td>--}}
{{--                                            <td>--}}
{{--                                                <a href=""  class="btn btn-success">--}}
{{--                                                    detail--}}
{{--                                                </a>--}}
{{--                                                <a href="{{route('hapusakun',[$a->id])}}"  class="btn btn-danger" onclick="return confirm('Yakin menghapus akun?')">--}}
{{--                                                    hapus--}}
{{--                                                </a>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                </table>--}}
{{--                                {{$dataakun->links()}}--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
            <div class="section-body">
                <div class="card">
                        <div class="card-header">
                            <h4><a href="{{route('akun.create')}}" class="btn btn-primary">
                                    +  tambah
                                </a></h4>

                            <div class="card-header-action">
                                <form method="post" action="{{route('cariakun')}}">
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>CreatedAt</th>
                                    <th>UpdatedAt</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($dataakun as $a)
                                        <tr>
                                            <td id="nama">{{$a->name}} </td>
                                            <td id="email">{{$a->email}}</td>
                                            @if($a->admin==0)
                                                <td id="admin">operator</td>
                                            @else
                                                <td id="admin">admin</td>
                                            @endif
                                            <td id="created_at">{{$a->created_at}}</td>
                                            <td id="updated_at">{{$a->updated_at}}</td>
                                            <td>
                                                <a href="{{route('akun.edit',[$a->id])}}"  class="btn btn-success">
                                                   detail
                                                </a>
                                                <a href="{{route('hapusakun',[$a->id])}}"  class="btn btn-danger" onclick="return confirm('Yakin menghapus akun?')">
                                                   hapus
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                            </table>
                            {{$dataakun->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @if($cari!=null)
        <div class="card">
            <div class="card-header">
               <h4>{{$hasil}}</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>CreatedAt</th>
                            <th>UpdatedAt</th>
                            <th>Action</th>
                        </tr>
                        @foreach($cari as $a)
                            <tr>
                                <td id="nama">{{$a->name}} </td>
                                <td id="email">{{$a->email}}</td>
                                @if($a->admin==0)
                                    <td id="admin">operator</td>
                                @else
                                    <td id="admin">admin</td>
                                @endif
                                <td id="created_at">{{$a->created_at}}</td>
                                <td id="updated_at">{{$a->updated_at}}</td>
                                <td>
                                    <a href="{{route('akun.edit',[$a->id])}}"  class="btn btn-success">
                                        detail
                                    </a>
                                    <a href="{{route('hapusakun',[$a->id])}}"  class="btn btn-danger" onclick="return confirm('Yakin menghapus akun?')">
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
    @endif
@endsection
