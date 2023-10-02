@extends('layout.leader')

@section('content')
<div class="pagetitle">
    <h1>Tambah Data Rekap Pengelaran</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            <form class="row g-3 needs-validation" action="/leader/rekap_pengeluaran/store" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Rekap Pemasukan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_rekap_pengeluaran" id="" value="{{$kode}}"
                            required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Pengeluaran<label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tanggal_pengeluaran" value="<?= date('Y-m-d') ?>"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Outlet <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <select name='id_pemasukan' class='form-select' style="background-color:#e6e6fa;"
                            id='myselectOutlet' onchange="selectOutlet()" required>
                            <option value="">-- Pilih Data Outlet --</option>
                            @foreach ($pemasukan as $o)
                            <option value="{{ $o->ID_Pemasukan }}" data-namaLeader="{{ $o->Nama_Leader }}"
                                data-totalpemasukan="{{ $o->Total_Pemasukan }}">
                                {{ $o->Nama_Outlet }} - {{ date('d-M-Y', strtotime($o->Tanggal_Pemasukan)) }}</option>
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
                <!-- <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Pemasukan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id='tanggal_pemasukan' name="tanggal_pemasukan" value=""
                            style="background-color:#e6e6fa;" readonly>
                    </div>
                </div> -->


                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Total Pemasukan <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" readonly id="total_pemasukan" name="total_pemasukan"
                            style="background-color:#e6e6fa;">
                        </table>
                    </div>
                </div>

                <table class=" table table-sm">
                    <tr>
                        <th colspan="3" style="text-align: center">
                            RINCIAN PENGELUARAN BELANJA OUTLET
                        </th>
                    </tr>
                    <tr>
                        <th width="60%">
                            NAMA BARANG
                        </th>
                        <th width="20%" style="text-align: center">
                            QTY
                        </th>
                        <th width="20%" style="text-align: center">
                            NILAI
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="pengeluaran[1]" class="form-control" value=""
                                style="background-color:#e6e6fa;">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="pengeluaran[2]" value="0"
                                style="background-color:#e6e6fa;">
                        </td>
                        <td class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control hitungpengeluaran" style="text-align: end"
                                name="pengeluaran[3]" value="0" style="background-color:#e6e6fa;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="pengeluaran[4]" class="form-control" value=""
                                style="background-color:#e6e6fa;">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="pengeluaran[5]" value="0"
                                style="background-color:#e6e6fa;">
                        </td>
                        <td class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control hitungpengeluaran" style="text-align: end"
                                name="pengeluaran[6]" value="0" style="background-color:#e6e6fa;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="pengeluaran[7]" class="form-control" value=""
                                style="background-color:#e6e6fa;">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="pengeluaran[8]" value="0"
                                style="background-color:#e6e6fa;">
                        </td>
                        <td class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control hitungpengeluaran" style="text-align: end"
                                name="pengeluaran[9]" value="0" style="background-color:#e6e6fa;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="pengeluaran[10]" class="form-control" value=""
                                style="background-color:#e6e6fa;">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="pengeluaran[11]" value="0"
                                style="background-color:#e6e6fa;">
                        </td>
                        <td class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control hitungpengeluaran" style="text-align: end"
                                name="pengeluaran[12]" value="0" style="background-color:#e6e6fa;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="pengeluaran[13]" class="form-control" value=""
                                style="background-color:#e6e6fa;">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="pengeluaran[14]" value="0"
                                style="background-color:#e6e6fa;">
                        </td>
                        <td class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control hitungpengeluaran" style="text-align: end"
                                name="pengeluaran[15]" value="0" style="background-color:#e6e6fa;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" readonly name="pengeluaran[16]" class="form-control"
                                value="TOTAL PENGELUARAN" style="background-color:#e6e6fa;">
                        </td>
                        <td>
                            <input type="number" min="0" class="form-control" name="pengeluaran[17]" value="0"
                                style="background-color:#e6e6fa;">
                        </td>
                        <td class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="text" class="form-control bg-danger" readonly id="totalpengeluaran"
                                style="text-align: end" name="pengeluaran[18]" value=""
                                style="background-color:#e6e6fa;">

                        </td>
                    </tr>

                </table>


                <div class="col-12">
                    <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                        Tambah</button>
                    <a href="/leader/rekap_pengeluaran" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->

        </div>
    </div>

</div>
<script>
function calculateTotal() {
    var total = 0;

    for (var i = 0; i < inputFields.length; i++) {
        var value = inputFields[i].value.replace(/[^\d.-]/g, '');
        if (value !== '') {
            total += parseFloat(value.replace(/\./g, ''));
        }
    }

    totalInput.value = formatRupiah(total); // Display the total with 2 decimal places
}
//PENGELUARAN
var inputFieldspengeluaran = document.getElementsByClassName('hitungpengeluaran');
var totalInputPengeluaran = document.getElementById('totalpengeluaran');
var totalInputPengeluaran1 = document.getElementById('totalpengeluaran1');

for (var i = 0; i < inputFieldspengeluaran.length; i++) {
    inputFieldspengeluaran[i].addEventListener('input', function() {
        formatRupiahInput(this);
        calculateTotalPengeluaran();
        calculateTotalSemua();
    });
}




function calculateTotalPengeluaran() {
    var total = 0;

    for (var i = 0; i < inputFieldspengeluaran.length; i++) {
        var value = inputFieldspengeluaran[i].value.replace(/[^\d.-]/g, '');
        if (value !== '') {
            total += parseFloat(value.replace(/\./g, ''));
        }
    }

    totalInputPengeluaran.value = formatRupiah(total); // Display the total with 2 decimal places
    totalInputPengeluaran1.value = formatRupiah(total); // Display the total with 2 decimal places
}
//TOTAL SEMUA
var totalsemua = document.getElementById('totalsemua');

function calculateTotalSemua() {
    var total = 0;


    var total1 = parseFloat(totalInput.value.replace(/\./g, ''));
    var total2 = parseFloat(totalInputPengeluaran.value.replace(/\./g, ''));
    total = total1 - total2;


    totalsemua.value = formatRupiah(total); // Display the total with 2 decimal places
}

//FORMAT RUPIAH

function formatRupiahInput(input) {
    var value = input.value.replace(/\D/g, '');
    var formattedValue = formatRupiah(value);
    input.value = formattedValue.replace(/^Rp\. /, '');
}

function formatRupiah(angka) {
    var number_string = angka.toString();
    var split = number_string.split(',');
    var sisa = split[0].length % 3;
    var rupiah = split[0].substr(0, sisa);
    var ribuan = split[0].substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        var separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
}

// SELECT 2
$('#selectLeader').select2({});
$('#single-select-layanan').select2({});
$('#myselectOutlet').select2({});
$('#myselectPembayaran').select2({});

function selectOutlet() {
    var select = document.getElementById("myselectOutlet");
    var selectedOption = select.options[select.selectedIndex];
    var nama = selectedOption.getAttribute("data-namaLeader");
    var total = selectedOption.getAttribute("data-totalpemasukan");
    if (nama && total) {
        document.getElementById("nama_leader").value = nama;
        document.getElementById("total_pemasukan").value = total;
    } else {
        document.getElementById("nama_leader").value = "";
        document.getElementById("total_pemasukan").value = "";
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