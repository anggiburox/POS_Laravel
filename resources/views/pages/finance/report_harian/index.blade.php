@extends('layout.finance')

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
                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Outlet</th>
                                <th scope="col">Nama Outlet</th>
                                <th scope="col">Alamat Outlet</th>
                                <th scope="col">Nama Leader </th>
                                <th scope="col">Alamat Leader</th>
                                <th scope="col">Nomor Telepon Leader</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            <!-- @foreach($pgw as $p) -->
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>
                                    <a href="finance/report_harian/cetak_pdf_satuan/{{ $no}}"
                                        class="btn mb-1 btn-secondary btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Cetak" type="button"><i class="bi bi-printer-fill"></i>
                                </td>
                            </tr>
                            <!-- @endforeach -->
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