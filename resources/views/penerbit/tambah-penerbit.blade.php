<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Tambah Penerbit</title>
    @include('template.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.left-sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Penerbit Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ route('simpan-penerbit') }}" method="post">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Penerbit"
                                    aria-label="judul" aria-describedby="basic-addon1" name="nama">
                            </div>
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Terbitan Populer"
                                    aria-label="penerbit" aria-describedby="basic-addon1" name="terbitan_populer">
                            </div>
                            @error('terbitan_populer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Alamat Penerbit"
                                    aria-label="alamat" aria-describedby="basic-addon1" name="alamat">
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                <input type="number" class="form-control" placeholder="Masukan Telepon Penerbit"
                                    aria-label="alamat" aria-describedby="basic-addon1" name="no_telepon">
                            </div>
                            @error('no_telepon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                            <a href="/halaman-penerbit" class="btn btn-danger">Kembali</a>
                        </form>

                    </div>


                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('template.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        @include('template.logout')

        @include('template.script')

</body>

</html>
