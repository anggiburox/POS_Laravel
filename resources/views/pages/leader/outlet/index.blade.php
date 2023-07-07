@extends('layout.leader')

@section('content')
<div class="pagetitle">
    <h1>Data Outlet</h1>
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
                                <th scope="col">Nama Outlet</th>
                                <th scope="col">Alamat Outlet</th>
                                <th scope="col">Nama Leader </th>
                                <th scope="col">Alamat Leader</th>
                                <th scope="col">Nomor Telepon Leader</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;?>
                            @foreach($pgw as $p)
                            <?php $no++ ;?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$p->Nama_Outlet}}</td>
                                <td>{{$p->Alamat_Outlet}}</td>
                                <td>{{$p->Nama_Leader}}</td>
                                <td>{{$p->Alamat_Leader}}</td>
                                <td>{{$p->Nomor_Telepon_Leader}}</td>
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
@endsection