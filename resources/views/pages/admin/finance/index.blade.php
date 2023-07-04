@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Data Finance</h1>
</div><!-- End Page Title -->

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="btn btn-info text-white" href="finance/tambah">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>&nbsp;
                            Tambah data
                        </a>
                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Finance</th>
                                <th scope="col">Nama Finance</th>
                                <th scope="col">Tempat Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat Finance</th>
                                <th scope="col">Nomor Telepon Finance</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach($pgw as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$p->ID_Finance}}</td>
                                <td>{{$p->Nama_Finance}}</td>
                                <td>{{$p->Tempat_Lahir_Finance}}, {{ \Carbon\Carbon::parse($p->Tanggal_Lahir_Finance)->isoFormat('D MMMM Y') }}</td>
                                <td>{{$p->Jenis_Kelamin_Finance}}</td>
                                <td>{{$p->Alamat_Finance}}</td>
                                <td>{{$p->Nomor_Telepon_Finance}}</td>
                                <td>
                                    <a href="finance/edit/{{ $p->ID_Finance}}" data-toggle="tooltip"
                                        data-placement="top" title="Perbaharui" class="btn mb-1 btn-primary"
                                        type="button"><i class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                    |
                                    <a href="finance/hapus/{{ $p->ID_Finance}}"
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