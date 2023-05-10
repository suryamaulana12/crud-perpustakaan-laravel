<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpustakaan | Halaman Buku</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Data Buku Perpustakaan</h1>
                    <hr style="margin-bottom: 10px">
                </div>


                <div class="row">
                    <div class="card-body">
                        <a href="{{ route('tambah-buku') }}"><button type="button" class="btn btn-success mb-3 ml-1">+
                                TambahBuku</button></a>

                        <table class="table table-hover col-12 text-center justify-content-center">
                            <thead class="" style="font-weight: bold">
                                <td>No</td>
                                <td>Judul</td>
                                <td>Pengarang</td>
                                <td>Penerbit</td>
                                <td>Genre</td>
                                <td>Tahun Terbit</td>
                                <td>Gambar</td>
                                <td>Aksi</td>
                            </thead>
                            <?php $i = 1; ?>
                            @foreach ($buku as $item)
                                <tbody class="table-striped">
                                    <td><?= $i ?></td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->pengarang }}</td>
                                    <td>{{ $item->penerbit }}</td>
                                    <td>{{ $item->genre->genre }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->tahun_terbit)) }}</td>
                                    <td><img src="{{ asset('template/img/' . $item->gambar) }}" width="30%"
                                            height="30%" alt=""></td>
                                    <td>
                                        <a href="{{ url('edit-buku', $item->id) }}"><button type="submit"
                                                class="btn btn-warning" style="margin-right: 5px;"><i
                                                    class="fas fa-pen"></i></button></a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{ $item->id }}"><i
                                                class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tbody>
                                <?php $i++; ?>
                            @endforeach
                        </table>

                        {{-- menambahkan konfirmasi delete pakai sweet alert --}}
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
                                            window.location = "/delete-buku/" + anggotaid + ""
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
