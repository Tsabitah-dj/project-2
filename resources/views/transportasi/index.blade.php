

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Transportasi </title>
        <link href="{{asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="{{asset('https://use.fontawesome.com/releases/v6.3.0/js/all.js')}}" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">System Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            @include('Layout/navbar')
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Kendaraan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tabel</li>
                        </ol>
                       
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Isi Data
                            </div>
                            <div class="card-body">
   <table id="datatablesSimple">
    <a class="btn btn-primary mb-3" href="{{ route('transportasi.create') }}">Tambah Data</a>
    <div class="table-responsive">
        <thead>
            <tr>
                <th>Kode Kendaraan</th>
                <th>Nama Kendaraan</th>
                <th>Karyawan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @php $no = 1 @endphp
            @foreach($transportasi as $item)
                <tr>
                    <td>{{ $item->kode_kendaraan }}</td>
                    <td>{{ $item->nama_kendaraan }}</td>
                    <td>{{ $item->karyawan->nama_karyawan}}</td>
                    <td>
                        <a href="{{ route('transportasi.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('transportasi.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </div>
</table>
                        </div>
                    </div>
                </main>
                <!-- footer -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PPL 2</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                 <!-- footer -->
            </div>
        </div>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
