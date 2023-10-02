@extends('layout.leader')

@section('content')
<div class="pagetitle">
    <h1>Data Pemasukan</h1>
</div><!-- End Page Title -->

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="btn btn-info text-white" href="rekap_pemasukan/tambah">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>&nbsp;
                            Tambah data
                        </a>
                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Nama Outlet</th>
                                <th scope="col">Nama Leader</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">No Rekening</th>
                                <th scope="col">Atas Nama Rekening</th>
                                <th scope="col">Total Pemasukan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach($pgw as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{ date('d-m-Y', strtotime($p->Tanggal_Pemasukan)) }}</td>
                                <td>{{$p->Nama_Outlet}}</td>
                                <td>{{$p->Nama_Leader}}</td>
                                <td>{{$p->Nama_Barang}}</td>
                                <td>{{$p->Jenis_Pembayaran}}</td>
                                <td>{{$p->No_Rekening}}</td>
                                <td>{{$p->Pemilik_Rekening}}</td>
                                <td>{{$p->Total_Pemasukan}}</td>
                                <td>
                                    <a href="rekap_pemasukan/edit/{{ $p->ID_Pemasukan}}" data-toggle="tooltip"
                                        data-placement="top" title="Perbaharui" class="btn mb-1 btn-primary"
                                        type="button"><i class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                    |
                                    <a href="rekap_pemasukan/hapus/{{ $p->ID_Pemasukan}}"
                                        class="delete btn mb-1 btn-danger" onclick="showConfirmation(event)"
                                        data-toggle="tooltip" data-placement="top" title="Hapus" type="button"><i
                                            class="bi bi-trash-fill"></i>&nbsp; Hapus</a>
                                    |
                                    <a href="rekap_pemasukan/cetak/{{ $p->ID_Pemasukan }}"
                                        class="delete btn mb-1 btn-warning" data-toggle="tooltip" target="_blank"
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
</script>
@if(Session::has('success'))
<script>
swal("Sukses", "{{ Session::get('success') }}", "success");
</script>
@endif

@if(Session::has('danger'))
<script>
swal("Sukses", "{{ Session::get('danger') }}", "success");
</script>
@endif
@endsection