@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Perbaharui Data barang</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            @foreach($pgw as $pp)
            <form class="row g-3 needs-validation" id="form-perbaharui" action="/admin/barang/update"
                method="POST">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Barang <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_barang" value="{{$pp->ID_Barang}}"
                            required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama barang <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_barang"
                            value='{{$pp->Nama_Barang}}' required>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="button" onclick="showConfirmation()"><i
                            class='bi bi-check-circle'></i>&nbsp;
                        Perbaharui</button>
                    <a href="/admin/barang" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->
            @endforeach

        </div>
    </div>

</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
function showConfirmation() {
    // Menjalankan validasi form sebelum menampilkan konfirmasi
    if (document.getElementById('form-perbaharui').checkValidity()) {
        swal({
            title: "Konfirmasi",
            text: "Apakah Anda yakin memperbaharui data ini?",
            icon: "warning",
            buttons: ["Batal", "Ya"],
            dangerMode: true,
        }).then((confirm) => {
            if (confirm) {
                document.getElementById('form-perbaharui').submit();
            }
        });
    } else {
        // Menampilkan pesan error jika validasi form gagal
        swal({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap lengkapi semua kolom yang diperlukan!',
        });
    }
}


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