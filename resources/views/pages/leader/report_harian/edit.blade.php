@extends('layout.admin')

@section('content')
    <div class="pagetitle">
        <h1>Update Data Laporan</h1>
    </div><!-- End Page Title -->

    <div class="col-xl-12 col-xxl-12">

        <div class="card">
            <div class="card-body">

                <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
                <!-- Custom Styled Validation -->

                <form class="row g-3 needs-validation" action="/leader/report_harian/update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="ID_Laporan" value="{{ $pgw[0]->ID_Laporan}}">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Tanggal <label
                                style='color:red;'>(*)</label></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal_laporan" value="<?= date('Y-m-d') ?>" required readonly style="background-color:#e6e6fa;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Nama Outlet <label
                                style='color:red;'>(*)</label></label>
                        <div class="col-sm-5">
                            <select name='id_outlet' class='form-select' style="background-color:#e6e6fa;" id='myselectOutletedit' onchange="selectOutlet()"
                            required>
                                <option value="">-- Pilih Data Outlet --</option>
                                @foreach($outlet as $o)
                                <option value="{{ $o->ID_Outlet }}" data-namaLeader="{{ $o->Nama_Leader}}"> {{ $o->Nama_Outlet}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Nama Leader <label
                                style='color:red;'>(*)</label></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id='nama_leader' name="id_leader" value="" style="background-color:#e6e6fa;" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="responsive-table">
                            
                           @include('pages.admin.report_harian.partedit_barang')
                           @include('pages.admin.report_harian.partedit_pemasukan')
                           @include('pages.admin.report_harian.partedit_pengeluaran')
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success" type="submit"><i class='bi bi-check-circle'></i>&nbsp;
                            Update</button>
                        <a href="/admin/report_harian" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                            Kembali</a>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>

    </div>
    <script>
         //PEMASUKAN
         var inputFields = document.getElementsByClassName('hitungedit');
        var totalInputedit = document.getElementById('totaledit');

        for (var i = 0; i < inputFields.length; i++) {
            inputFields[i].addEventListener('input', function() {
                formatRupiahInputedit(this);
                calculateTotaledit();
                calculateTotaleditSemua();

            });
        }

        


        function calculateTotaledit() {
            var total = 0;

            for (var i = 0; i < inputFields.length; i++) {
                var value = inputFields[i].value.replace(/[^\d.-]/g, '');
                if (value !== '') {
                    total += parseFloat(value.replace(/\./g, ''));
                }
            }

            totalInputedit.value = formatRupiahedit(total); // Display the total with 2 decimal places
        }
        //PENGELUARAN
        var inputFieldspengeluaran = document.getElementsByClassName('hitungpengeluaranedit');
        var totalInputeditPengeluaran = document.getElementById('totalpengeluaranedit');
        var totalInputeditPengeluaran1 = document.getElementById('totalpengeluaran1edit');

        for (var i = 0; i < inputFieldspengeluaran.length; i++) {
            inputFieldspengeluaran[i].addEventListener('input', function() {
                formatRupiahInputedit(this);
                calculateTotaleditPengeluaran();
                calculateTotaleditSemua();
            });
        }

        


        function calculateTotaleditPengeluaran() {
            var total = 0;

            for (var i = 0; i < inputFieldspengeluaran.length; i++) {
                var value = inputFieldspengeluaran[i].value.replace(/[^\d.-]/g, '');
                if (value !== '') {
                    total += parseFloat(value.replace(/\./g, ''));
                }
            }

            totalInputeditPengeluaran.value = formatRupiahedit(total); // Display the total with 2 decimal places
            totalInputeditPengeluaran1.value = formatRupiahedit(total); // Display the total with 2 decimal places
        }
          //TOTAL SEMUA
          var totalsemua = document.getElementById('totalsemuaedit');
        function calculateTotaleditSemua() {
            var total = 0;
            
            
            var total1 = parseFloat(totalInputedit.value.replace(/\./g, ''));
            var total2 = parseFloat(totalInputeditPengeluaran.value.replace(/\./g, ''));
            total=total1-total2;
             

            totalsemua.value = formatRupiahedit(total); // Display the total with 2 decimal places
        }
        //FORMAT RUPIAH

        function formatRupiahInputedit(input) {
            var value = input.value.replace(/\D/g, '');
            var formattedValue = formatRupiahedit(value);
            input.value = formattedValue.replace(/^Rp\. /, '');
        }

        function formatRupiahedit(angka) {
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

        $('#selectLeader').select2({});


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