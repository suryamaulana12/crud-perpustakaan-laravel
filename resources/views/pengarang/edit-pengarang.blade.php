<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Edit Pengarang</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Edit Pengarang Perpustakaan</h1>
                    <hr style="margin-bottom: 20px">
                </div>


                <div class="row justify-content-center">
                    <div class="col-10">

                        <form action="{{ url('update-pengarang', $edit->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label">Edit Pengarang Buku :</label>
                                <select class="form-control select" name="pengarang_id" id="pengarang_id">
                                    <option disabled value>---Pilih Pengarang---</option>
                                    <option value="{{ $edit->pengarang_id }}">{{ $edit->buku->pengarang }}</option>
                                    @foreach ($buku as $item)
                                        <option value="{{ $item->id }}">{{ $item->pengarang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="">Masukan Jenis Kelamin :</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                    id="flexRadioDefault1" value="Laki-laki" value="<?= $edit['jenis_kelamin'] ?>"
                                    <?= $edit['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                    id="flexRadioDefault12" value="Perempuan" value="<?= $edit['jenis_kelamin'] ?>"
                                    <?= $edit['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexRadioDefault12">
                                    Perempuan
                                </label>
                            </div>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <label for="">Edit Alamat Pengarang :</label>
                            <div class="input-group mb-4">
                                <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample3" rows="3" name="alamat" style="width: 940px">{{ $edit->alamat }}</textarea>
                                </div>
                            </div>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-landmark"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Karya Pengarang"
                                    aria-label="alamat" aria-describedby="basic-addon1" name="karya_pengarang"
                                    value="{{ $edit->karya_pengarang }}">
                            </div>
                            @error('karya_pengarang')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <button type="submit" class="btn btn-primary">Edit Data</button>
                            <a href="/halaman-pengarang" class="btn btn-danger">Kembali</a>
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
