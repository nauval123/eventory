<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>E_ventory</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/components.css">

    <script type="text/javascript" src="{{url('/')}}/assets/DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/DataTables/media/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/DataTables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/DataTables/media/css/dataTables.bootstrap.css">

</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{route('admin.index')}}">E-Ventory</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{route('admin.index')}}">EV</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Halo Admin</li>
                    <li class="nav-item dropdown"><a class="nav-link" href="#"><i class="fas fa-user"></i> <span>Profil</span></a></li>
                    <li class="nav-item dropdown"><a class="nav-link" href="{{route('akun.index')}}"><i class="fas fa-book"></i> <span>Akun</span></a></li>
                </ul>

                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Akun</h1>
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
                <form method="post" action="{{route('akun.update',[$dataakun->id])}}">
                    @csrf
                    @method('put')
                    <div class="card-header">
                        <h4>Input Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>nama</label>
                            <input name="nama" type="text" class="form-control" @if($dataakun!=null)value="{{$dataakun->name}}"@endif required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" @if($dataakun!=null)value="{{$dataakun->email}}"@endif required>                        </div>
                        <div class="form-group">
{{--                            <label>Password</label>--}}
{{--                            <input name="password" type="text" class="form-control" @if($dataakun!=null)value="{{decrypt($dataakun->password)}}"@endif required>--}}
                        </div>
                        <div class="form-group">
                            <select  class="form-control" name="status" required>
                                    @if($dataakun->admin==1)
                                        <option value="1" disabled selected value>admin</option>
                                    @elseif($dataakun->admin==0)
                                        <option value="0" disabled selected value>operator</option>
                                    @endif
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
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            E-Ventory-0.5.0
        </div>
    </footer>
    </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{url('/')}}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{url('/')}}/assets/js/scripts.js"></script>
    <script src="{{url('/')}}/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    </body>
    </html>

