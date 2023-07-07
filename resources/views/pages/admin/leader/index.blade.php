@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Data Leader</h1>
</div><!-- End Page Title -->

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a class="btn btn-info text-white" href="leader/tambah">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>&nbsp;
                            Tambah data
                        </a>
                    </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Leader</th>
                                <th scope="col">Nama Leader</th>
                                <th scope="col">Tempat Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat Leader</th>
                                <th scope="col">Nomor Telepon Leader</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach($pgw as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$p->ID_Leader}}</td>
                                <td>{{$p->Nama_Leader}}</td>
                                <td>{{$p->Tempat_Lahir_Leader}},
                                    {{ \Carbon\Carbon::parse($p->Tanggal_Lahir_Leader)->isoFormat('D MMMM Y') }}</td>
                                <td>{{$p->Jenis_Kelamin_Leader}}</td>
                                <td>{{$p->Alamat_Leader}}</td>
                                <td>{{$p->Nomor_Telepon_Leader}}</td>
                                <td>
                                    <a href="leader/edit/{{ $p->ID_Leader}}" data-toggle="tooltip" data-placement="top"
                                        title="Perbaharui" class="btn mb-1 btn-primary" type="button"><i
                                            class="ri-edit-box-line"></i>&nbsp; Edit</a>
                                    |
                                    <a href="leader/detail/{{ $p->ID_Leader}}" data-toggle="tooltip"
                                        data-placement="top" title="Detail" class="btn mb-1 btn-warning"
                                        type="button"><i class="bi bi-eye-fill"></i>&nbsp; Detail</a>
                                    |
                                    <a href="leader/hapus/{{ $p->ID_Leader}}" class="delete btn mb-1 btn-danger"
                                        onclick="showConfirmation(event)" data-toggle="tooltip" data-placement="top"
                                        title="Hapus" type="button"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>
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