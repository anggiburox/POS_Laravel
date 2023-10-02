@extends('layout.leader')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title text-black">
                                Total Outlet
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-menu-button-wide"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class='text-black'>{{$outlet}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Revenue Card -->

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title text-black">
                                Total Barang
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-archive"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class='text-black'>{{$barang}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title text-black">
                                Total Jenis Layanan
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-car-front"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class='text-black'>{{$layanan}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customers Card -->
                <!-- <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title text-black">
                                Total Report
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class='text-black'>{{$report}}</h6>

                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- End Left side columns -->
        </div>
    </div>
</section>
@endsection