<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Dashboard</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Buku Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>


                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ url('update-buku', $edit->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Judul Buku"
                                    aria-label="judul" aria-describedby="basic-addon1" name="judul"
                                    value="{{ $edit->judul }}" required>
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama Pengarang"
                                    aria-label="pengarang" aria-describedby="basic-addon1" name="pengarang"
                                    value="{{ $edit->pengarang }}" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Penerbit"
                                    aria-label="penerbit" aria-describedby="basic-addon1" name="penerbit"
                                    value="{{ $edit->penerbit }}" required>
                            </div>

                            <label for="">Genre Buku :</label>
                            <div style="margin-left: 25px;">
                                <div class="input-group mb-2">
                                    <input class="form-check-input" type="checkbox" value="Romantis" name="genre"
                                        id="flexCheckDefault" value="<?= $edit['genre'] ?>"
                                        <?= $edit['genre'] == 'Romantis' ? 'checked' : '' ?>>
                                    <label class=" form-check-label" for="flexCheckDefault" romantis>
                                        Romantis
                                    </label>
                                </div>

                                <div class="input-group mb-2">
                                    <input class="form-check-input" type="checkbox" value="Pendidikan" name="genre"
                                        id="flexCheckDefaultt" value="<?= $edit['genre'] ?>"
                                        <?= $edit['genre'] == 'Pendidikan' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="flexCheckDefaultt" Pendidikan>
                                        Pendidikan
                                    </label>
                                </div>

                                <div class="input-group mb-2">
                                    <input class="form-check-input" type="checkbox" value="Misteri" name="genre"
                                        id="misteri" value="<?= $edit['genre'] ?>"
                                        <?= $edit['genre'] == 'Misteri' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="misteri" misteri>
                                        Misteri
                                    </label>
                                </div>
                            </div>
                            <label for="" style="font-size: 15px; color: red;">Pilih salah satu *</label>


                            <div class="input-group mb-4">
                                <input type="date" class="form-control" placeholder="Masukan link Buku"
                                    aria-label="link" aria-describedby="basic-addon1" name="tahun_terbit"
                                    value="<?= date('Y-m-d', strtotime($edit['tahun_terbit'])) ?>">
                            </div>

                            <div class="mb-4">
                                <label for="formFile" class="form-label">Edit gambar Buku :</label><br>
                                <img src="{{ asset('template/img/' . $edit->gambar) }}" width="10%" height="10%"
                                    alt="">
                                <input class="form-control mt-3" type="file" id="formFile" name="gambar"
                                    value="{{ $edit->gambar }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit Data</button>
                            <a href="/halaman-buku" class="btn btn-danger">Kembali</a>
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        @include('template.script')

</body>

</html>
