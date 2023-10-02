@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Metode Pembayaran</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            <form class="row g-3 needs-validation" action="/admin/pembayaran/store" method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Pembayaran <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_pembayaran" value="{{$kode}}" required
                            readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Jenis Pembayaran <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="jenis_pembayaran" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">No Rekening</label>
                    <div class="col-sm-5">
                        <input type="number" min="0" class="form-control" name="no_rekening" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Atas Nama Rekening</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pemilik_rekening" >
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                        Tambah</button>
                    <a href="/admin/pembayaran" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
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