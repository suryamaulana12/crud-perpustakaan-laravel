<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Halaman Pengarang</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Data Pengarang Perpustakaan</h1>
                    <hr style="margin-bottom: 10px">
                </div>


                <div class="row">
                    <div class="card-body">
                        <a href="{{ route('tambah-pengarang') }}"><button type="button"
                                class="btn btn-success mb-3 ml-1">+
                                TambahPengarang</button></a>

                        <table class="table table-hover col-12 text-center justify-content-center">
                            <thead class="" style="font-weight: bold">
                                <td>No</td>
                                <td>Nama</td>
                                <td>Jenis Kelamin</td>
                                <td>Alamat</td>
                                <td>Karya Pengarang</td>
                                <td>Aksi</td>
                            </thead>
                            <?php $i = 1; ?>
                            @foreach ($dtpengarang as $item)
                                <tbody class="table-striped">
                                    <td><?= $i ?></td>
                                    <td>{{ $item->buku->pengarang }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->karya_pengarang }}</td>
                                    <td>
                                        <a href="{{ url('edit-pengarang', $item->id) }}"><button type="submit"
                                                class="btn btn-warning" style="margin-right: 5px;"><i
                                                    class="fas fa-pen"></i></button></a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}"><i
                                                class="fas fa-trash"></i>
                                        </a>
                                </tbody>
                                <?php $i++; ?>
                            @endforeach
                        </table>

                        <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
                            integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script>
                            $('.delete').click(function() {
                                var anggotaid = $(this).attr('data-id');
                                swal({
                                        title: "Apakah anda yakin?",
                                        text: "Data ini ingin dihapus!",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location = "/delete-pengarang/" + anggotaid + ""
                                            swal("Data berhasil dihapus!", {
                                                icon: "success",
                                            });
                                        } else {
                                            swal("Data tidak jadi dihapus!");
                                        }
                                    });
                            });
                        </script>
                    </div>



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
    @include('sweetalert::alert')


</body>

</html>
