@extends('layout.leader')

@section('content')
    <div class="pagetitle">
        <h1>Data Report Harian</h1>
    </div><!-- End Page Title -->

    <section class="section">

        <!-- row -->

        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="btn btn-info text-white" href="/leader/report_harian/tambah">
                                <i class="bi bi-plus-lg" aria-hidden="true"></i>&nbsp;
                                Tambah data
                            </a>
                        </h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Outlet</th>
                                    <th scope="col">Nama Leader</th>
                                    <th scope="col">Goreng Ayam</th>
                                    <th scope="col">Setoran </th>
                                    <th scope="col">Pengeluaran </th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($pgw as $p)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($p->Tanggal_Laporan)) }}
                                        </td>
                                        <td>
                                            {{ $p->Nama_Outlet }}
                                        </td>
                                        <td>
                                            {{ $p->Nama_Leader }}
                                        </td>
                                        <td>
                                            <a class="delete btn mb-1 btn-info"
                                                onclick="listLaporanAyam({{ $p->ID_Laporan }})" data-toggle="tooltip"
                                                data-placement="top" title="List Barang" type="button"><i
                                                    class="bi bi-eye-fill"></i>&nbsp; Lihat</a>
                                        </td>
                                        <td>
                                            <a class="delete btn mb-1 btn-info"
                                                onclick="listLaporanPemasukan({{ $p->ID_Laporan }})" data-toggle="tooltip"
                                                data-placement="top" title="List Pemasukan" type="button"><i
                                                    class="bi bi-eye-fill"></i>&nbsp; Lihat</a>
                                        </td>
                                        <td>
                                            <a class="delete btn mb-1 btn-info"
                                                onclick="listLaporanPengeluaran({{ $p->ID_Laporan }})" data-toggle="tooltip"
                                                data-placement="top" title="List Pengeluaran" type="button"><i
                                                    class="bi bi-eye-fill"></i>&nbsp; Lihat</a>
                                        </td>
                                        <td>
                                            <a href="/leader/report_harian/edit/{{ $p->ID_Laporan }}" data-toggle="tooltip"
                                                data-placement="top" title="Perbaharui" class="btn mb-1 btn-primary"
                                                type="button"><i class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                            |
                                            <a href="/leader/report_harian/hapus/{{ $p->ID_Laporan }}"
                                                class="delete btn mb-1 btn-danger" onclick="showConfirmation(event)"
                                                data-toggle="tooltip" data-placement="top" title="Hapus" type="button"><i
                                                    class="bi bi-trash-fill"></i>&nbsp; Hapus</a>
                                            <br>
                                            <a href="/leader/report_harian/cetak/{{ $p->ID_Laporan }}"
                                                class="delete btn mb-1 btn-warning" data-toggle="tooltip"
                                                data-placement="top" title="Cetak" type="button"><i
                                                    class="bi bi-printer-fill"></i>&nbsp; Cetak</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
        @include('pages/admin/report_harian/modal_list_barang')
        @include('pages/admin/report_harian/modal_list_pemasukan')
        @include('pages/admin/report_harian/modal_list_pengeluaran')
    </section>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function showConfirmation(event) {
            event.preventDefault();
            var deleteLink = event.target.getAttribute('href');

            swal({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin menghapus data ini?",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            }).then((confirm) => {
                if (confirm) {
                    window.location.href = deleteLink;
                }
            });
        }

        function listLaporanAyam(id) {
            $.ajax({
                url: '/ajax/report_ayam/' + id,
                type: 'get',
                dataType: 'json',

                success: function(response) {
                    // Handle the response
                    createTable(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error, if any
                    console.log(error);
                }
            });
            $('#ModalBarang').modal('show');
        }

        function listLaporanPemasukan(id) {
            $.ajax({
                url: '/ajax/report_pemasukan/' + id,
                type: 'get',
                dataType: 'json',

                success: function(response) {
                    // Handle the response
                    createTable1(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error, if any
                    console.log(error);
                }
            });
            $('#ModalPemasukan').modal('show');
        }

        function listLaporanPengeluaran(id) {
            $.ajax({
                url: '/ajax/report_pengeluaran/' + id,
                type: 'get',
                dataType: 'json',

                success: function(response) {
                    // Handle the response
                    createTable2(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error, if any
                    console.log(error);
                }
            });
            $('#ModalPengeluaran').modal('show');
        }

        function createTable(response) {
            var key = Object.keys(response);
            let tableHtml =
                '<table class="table table-sm"><thead><tr><th>NAMA BARANG</th><th>QTY</th><th>PCS</th></tr></thead><tbody>';


            for (var i = 0; i < key.length; i += 3) {
                tableHtml += '<tr>';

                // Create three table cells in each row
                for (var j = 0; j < 3; j++) {
                    var keya = key[i + j];
                    var value = response[keya];

                    tableHtml += '<td>' + value + '</td>';
                }

                // Append the row to the table
                tableHtml += '</tr>';
            }
            tableHtml += '</tbody></table>';

            // Assuming the table has an ID of "data-table" in your HTML


            $('#table-container').html(tableHtml);
        }

        function createTable1(response) {
            var key = Object.keys(response);

            // Assuming the table has an ID of "data-table" in your HTML
            let tableHtml =
                '<table class="table table-sm"><thead><tr><th>REKAP SETORAN</th><th>JUMLAH</th></tr></thead><tbody>';

            for (var i = 0; i < key.length; i += 2) {
                // Create five rows
                tableHtml += '<tr>';
                for (var j = 0; j < 2; j++) {
                    var currentIndex = i + j;

                    var keya = key[currentIndex];
                    var value = response[keya];
                    if ((j) % 2 === 0) {
                        // Add two additional rows
                        tableHtml += '<td>' + value + '</td>';
                    } else {

                        tableHtml += '<td>Rp. ' + value + '</td>';
                    }

                    // Add additional columns if needed
                }
                tableHtml += '</tr>';

                // Add two additional rows
                if ((i + 2) % 7 === 0) {
                    // Add two additional rows
                    tableHtml += '<tr><td colspan="3">&nbsp;</td></tr>';
                }
            }
            tableHtml += '</tbody></table>';

            $('#table-container1').html(tableHtml);
        }

        function createTable2(response) {
            var key = Object.keys(response);
            // Assuming the table has an ID of "data-table" in your HTML
            let tableHtml =
                '<table class="table table-sm"><thead><tr><th>NAMA BARANG</th><th>QTY</th><th>NILAI</th></tr></thead><tbody>';



            for (var i = 0; i < key.length; i += 3) {
                // Create five rows
                tableHtml += '<tr>';
                for (var j = 0; j < 3; j++) {
                    var currentIndex = i + j;


                    var keya = key[currentIndex];
                    var value = response[keya];

                    if (j === 2) {
                        // Update the condition for the third column
                        tableHtml += '<td>Rp. ' + value + '</td>';
                    } else {
                        tableHtml += '<td>' + value + '</td>';
                    }
                    // Add additional columns if needed
                }
                tableHtml += '</tr>';



            }
            tableHtml += '</tbody></table>';

            $('#table-container2').html(tableHtml);
        }
    </script>
    @if (Session::has('success'))
        <script>
            swal("Sukses", "{{ Session::get('success') }}", "success");
        </script>
    @endif

    @if (Session::has('danger'))
        <script>
            swal("Sukses", "{{ Session::get('danger') }}", "success");
        </script>
    @endif
@endsection
