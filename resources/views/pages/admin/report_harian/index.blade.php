@extends('layout.admin')

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
                            <a class="btn btn-info text-white" href="report_harian/tambah">
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
                                            {{ $p->Tanggal_Laporan }}
                                        </td>
                                        <td>
                                            {{ $p->ID_Outlet }}
                                        </td>
                                        <td>
                                            Leader
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
                                            <a href="leader/edit/{{ $p->ID_Laporan}}" data-toggle="tooltip"
                                                data-placement="top" title="Perbaharui" class="btn mb-1 btn-primary"
                                                type="button"><i class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                            |
                                            <a href="/admin/report_harian/hapus/{{ $p->ID_Laporan}}"
                                                class="delete btn mb-1 btn-danger" onclick="showConfirmation(event)"
                                                data-toggle="tooltip" data-placement="top" title="Hapus" type="button"><i
                                                    class="bi bi-trash-fill"></i>&nbsp; Hapus</a>
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
            // Assuming the table has an ID of "data-table" in your HTML
            let tableHtml =
                '<table class="table table-sm"><thead><tr><th>NAMA BARANG</th><th>QTY</th><th>PCS</th></tr></thead><tbody>';

            response.forEach(data => {
                const {
                    name,
                    value1,
                    value2
                } = JSON.parse(data);
                tableHtml += `<tr><td>${name}</td><td>${value1}</td><td>${value2}</td></tr>`;
            });

            tableHtml += '</tbody></table>';

            $('#table-container').html(tableHtml);
        }

        function createTable1(response) {
            // Assuming the table has an ID of "data-table" in your HTML
            let tableHtml =
                '<table class="table table-sm"><thead><tr><th>REKAP SETORAN</th><th>PCS</th><th>JUMLAH</th></tr></thead><tbody>';

            const rowsPerGroup = 7;

            for (let i = 0; i < response.length; i++) {
                const {
                    name,
                    value1,
                    value2
                } = JSON.parse(response[i]);
                tableHtml += `<tr><td>${name}</td><td>${value1}</td><td>${value2}</td></tr>`;

                if ((i + 1) % rowsPerGroup === 0 && i + 1 !== response.length) {
                    // Add an empty row to create a visual separation between groups
                    tableHtml += '<tr><td colspan="3">&nbsp;</td></tr>';
                }
            }

            tableHtml += '</tbody></table>';

            $('#table-container1').html(tableHtml);
        }
        function createTable2(response) {
            // Assuming the table has an ID of "data-table" in your HTML
            let tableHtml =
                '<table class="table table-sm"><thead><tr><th>REKAP SETORAN</th><th>PCS</th><th>JUMLAH</th></tr></thead><tbody>';

            const rowsPerGroup = 7;

            for (let i = 0; i < response.length; i++) {
                const {
                    name,
                    value1,
                    value2
                } = JSON.parse(response[i]);
                tableHtml += `<tr><td>${name}</td><td>${value1}</td><td>${value2}</td></tr>`;

                if ((i + 1) % rowsPerGroup === 0 && i + 1 !== response.length) {
                    // Add an empty row to create a visual separation between groups
                    tableHtml += '<tr><td colspan="3">&nbsp;</td></tr>';
                }
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
