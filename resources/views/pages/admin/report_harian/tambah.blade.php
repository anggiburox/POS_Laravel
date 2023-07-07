@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Data Laporan</h1>
    </div><!-- End Page Title -->

    <div class="col-xl-12 col-xxl-12">

        <div class="card">
            <div class="card-body">

                <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                <!-- Custom Styled Validation -->

                <form class="row g-3 needs-validation" action="/admin/report_harian/store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Tanggal <label
                                style='color:red;'>(*)</label></label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="tanggal_laporan" value="<?= date('Y-d-m') ?>" required readonly style="background-color:#e6e6fa;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Nama Outlet <label
                                style='color:red;'>(*)</label></label>
                        <div class="col-sm-5">
                            <select name='id_outlet' id="selectOutlet" class='form-control' onchange=showOutlet() >
                                <option value="">-- Pilih Data Outlet --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Nama Leader <label
                                style='color:red;'>(*)</label></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="id_leader" value="" style="background-color:#e6e6fa;">
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="responsive-table">
                            
                           @include('pages.admin.report_harian.part_barang')
                           @include('pages.admin.report_harian.part_pemasukan')
                           @include('pages.admin.report_harian.part_pengeluaran')
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                            Tambah</button>
                        <a href="/admin/outlet" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                            Kembali</a>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>

    </div>
    <script>
        $('#selectLeader').select2({});


        function showLeader() {
            var select = document.getElementById("selectLeader");
            var selectedOption = select.options[select.selectedIndex];
            var alamatLeader = selectedOption.dataset.alamat;
            var teleponLeader = selectedOption.dataset.telepon;
            var tglLeader = selectedOption.dataset.tanggal;
            var tempatLeader = selectedOption.dataset.tempat;

            if (alamatLeader && teleponLeader && tglLeader && tempatLeader) {
                document.getElementById("alamat_leader").value = alamatLeader;
                document.getElementById("telepon_leader").value = teleponLeader;
                document.getElementById("ttl_leader").value = tempatLeader + ", " + tglLeader;
            } else {
                document.getElementById("alamat_leader").value = "";
                document.getElementById("telepon_leader").value = "";
                document.getElementById("ttl_leader").value = "";
            }
        }
    </script>
@endsection
