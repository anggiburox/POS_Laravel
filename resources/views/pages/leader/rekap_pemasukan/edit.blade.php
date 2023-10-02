@extends('layout.leader')

@section('content')
<div class="pagetitle">
    <h1>Perbaharui Data Rekap Pemasukan</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            <form class="row g-3 needs-validation" action="/leader/rekap_pemasukan/update" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Rekap Pemasukan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_pemasukan" id="id_pemasukan"
                            value="{{ $pgw[0]->ID_Pemasukan}}" required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tanggal_pemasukan"
                            value="{{ $pgw[0]->Tanggal_Pemasukan}}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Outlet <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_outlet' class='form-select' style="background-color:#e6e6fa;"
                            id='myselectOutletedit' onchange="selectOutlet()" required>
                            <option value="">-- Pilih Data Outlet --</option>
                            @foreach($outlet as $o)
                            <option value="{{ $o->ID_Outlet }}" data-namaLeader="{{ $o->Nama_Leader}}">
                                {{ $o->Nama_Outlet}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Leader <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id='nama_leader' name="id_leader" value=""
                            style="background-color:#e6e6fa;" readonly>
                    </div>
                </div>

                <!-- BARANG -->
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Barang <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_barang' class='form-control' id="single-select" required>
                            <option value="">-- Pilih Data Nama Barang --</option>
                            @foreach ($barang as $pr)
                            <option value="{{ $pr->ID_Barang }}">
                                {{ $pr->Nama_Barang }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- BARANG -->
                <div class="form-row">
                    <table class="table table-sm" id="dataBarang" style="background-color: burlywood;">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    Nama Produk
                                </th>
                                <th>
                                    QTY
                                </th>
                                <th>
                                    PCS
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- END BARANG -->
                <hr>
                <!-- LAYANAN -->
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Pemasukan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_layanan' class='form-control' id="single-select-layanan" required>
                            <option value="">-- Pilih Data Nama Pemasukan --</option>
                            @foreach ($jenis_layanan as $jl)
                            <option value="{{ $jl->ID_Jenis_Layanan }}">
                                {{ $jl->Nama_Layanan }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <table class="table table-sm" id="dataLayanan" style="background: yellow;">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    Pemasukan
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- END LAYANAN -->

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">TOTAL PEMASUKAN <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <table cellspacing="0" cellpading="0" width="100%">
                            <tr>
                                <td class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" class="form-control bg-info" readonly id="total_pemasukan"
                                        name="total_pemasukan" style="background-color:#e6e6fa; text-align:end;">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- JENIS PEMBAYARAN -->
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Jenis Pembayaran <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_pembayaran' class='form-select' style="background-color:#e6e6fa;"
                            id='myselectPembayaran' onchange="selectPembayaran()" required>
                            <option value="">-- Pilih Data Jenis Pembayaran --</option>
                            @foreach ($jenis_pembayaran as $pb)
                            <option value="{{ $pb->ID_Pembayaran}}" data-namaNoRekening="{{ $pb->No_Rekening }}"
                                data-namaPemilikRekening="{{ $pb->Pemilik_Rekening }}">
                                {{ $pb->Jenis_Pembayaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">No Rekening <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id='no_rekening' name="no_rekening" value=""
                            style="background-color:#e6e6fa;" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Atas Nama Rekening <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id='pemilik_rekening' name="pemilik_rekening" value=""
                            style="background-color:#e6e6fa;" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                        Tambah</button>
                    <a href="/leader/rekap_pemasukan" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->

        </div>
    </div>

</div>
<script>
// LAYANAN
$(document).ready(function() {
    let rowCounter = 0;
    let totalAllSubTotal = 0;

    $('#single-select-layanan').on('change', function() {
        const selectedValue = $("#single-select-layanan option:selected").text();
        const id_layanan = $("#single-select-layanan option:selected").val();
        console.log(selectedValue);
        if ($(`#dataLayanan tbody tr:contains('${selectedValue}')`).length === 0) {
            rowCounter++;
            const uniqueId = `${rowCounter}`;
            const newRow = `
                <tr>
                    <td>
                        ${selectedValue}
                        <input type="hidden" class="form-control form-control-sm" id="id_layanan${rowCounter}" name="id_layanan[${rowCounter}]" value="${id_layanan}" required>
                    </td>
                    <td class="input-group"> 
                        <span class="input-group-text">Rp</span>
                        <input type="number" min="0" class="form-control harga" id="harga${rowCounter}" name="harga[${rowCounter}]" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm deleteBtn">Delete</button>
                    </td>
                </tr>`;

            $("#dataLayanan tbody").append(newRow);
        }
    });

    $("#dataLayanan").on("click", ".deleteBtn", function() {
        $(this).closest("tr").remove();

        // Menghitung ulang total pemasukan setiap kali pilihan dihapus
        updateTotalPemasukan();
    });

    // Menghitung total awal saat halaman dimuat
    updateTotalPemasukan();

    // Menggunakan event "input" untuk menghitung total saat angka diketik
    $("#dataLayanan").on("input", ".harga", function() {
        updateTotalPemasukan();
    });

    function updateTotalPemasukan() {
        totalAllSubTotal = 0;
        $(".harga").each(function() {
            totalAllSubTotal += parseFloat($(this).val()) || 0;
        });

        // Menampilkan total pemasukan dengan format Rupiah pada elemen dengan ID "total_pemasukan"
        $("#total_pemasukan").val("Rp " + totalAllSubTotal.toLocaleString("id-ID"));
    }
});
// LAYANAN

// BARANG
$(document).ready(function() {
    let rowCounter = 0;
    $('#single-select').on('change', function() {
        const selectedValue = $("#single-select option:selected").text();
        const id_barang = $("#single-select option:selected").val();
        console.log(selectedValue);
        if ($(`#dataBarang tbody tr:contains('${selectedValue}')`).length === 0) {
            rowCounter++;
            const uniqueId = `${rowCounter}`;
            const newRow = `
                <tr>
                    <td>
                        ${selectedValue}
                        <input type="hidden" class="form-control form-control-sm" id="id_barang${rowCounter}" name="id_barang[${rowCounter}]" value="${id_barang}" required>
                    </td>
                    <td> 
                        <input type="number" min="0" class="form-control form-control-sm " name="qty[${rowCounter}]" required>
                    </td>
                    <td> 
                        <input type="number" min="0" class="form-control form-control-sm " name="pcs[${rowCounter}]" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm deleteBtn">Delete</button>
                    </td>
                </tr>`;

            $("#dataBarang tbody").append(newRow);
        }
    });

    $("#dataBarang").on("click", ".deleteBtn", function() {
        $(this).closest("tr").remove();
    });
});
// END BARANG


// SELECT 2
$('#selectLeader').select2({});
$('#single-select-layanan').select2({});
$('#myselectPembayaran').select2({});

$('#myselectOutletedit').select2({});
var selectedValue = "{{ $pgw[0]->ID_Outlet }}";
$("#myselectOutletedit").val(selectedValue).trigger("change");

function selectOutlet() {
    var select = document.getElementById("myselectOutletedit");
    var selectedOption = select.options[select.selectedIndex];
    var nama = selectedOption.getAttribute("data-namaLeader");
    if (nama) {
        document.getElementById("nama_leader").value = nama;
    } else {
        document.getElementById("nama_leader").value = "";
    }
}

function selectPembayaran() {
    var select = document.getElementById("myselectPembayaran");
    var selectedOption = select.options[select.selectedIndex];
    var namanorek = selectedOption.getAttribute("data-namaNoRekening");
    var namapemilik = selectedOption.getAttribute("data-namaPemilikRekening");
    if (namanorek && namapemilik) {
        document.getElementById("no_rekening").value = namanorek;
        document.getElementById("pemilik_rekening").value = namapemilik;
    } else {
        document.getElementById("no_rekening").value = "";
        document.getElementById("pemilik_rekening").value = "";
    }
}


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