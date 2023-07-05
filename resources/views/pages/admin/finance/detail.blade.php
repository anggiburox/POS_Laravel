@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <h1>Detail Data Finance</h1>
</div><!-- End Page Title -->

<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            @foreach($pgw as $p)
            <form class="row g-3 needs-validation" action="" method="POST">
                {{ csrf_field() }}

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">ID Finance <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="id_finance" value="{{$p->ID_Finance}}" required
                            readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nama Finance <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_finance" value="{{$p->Nama_Finance}}"
                            required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tempat Lahir <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="tempat_lahir" value="{{$p->Tempat_Lahir_Finance}}"
                            required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Tanggal Lahir <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="tanggal_lahir"
                            value='{{ $p->Tanggal_Lahir_Finance}}' required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-4 col-form-label">Jenis Kelamin<label
                            style='color:red;'>(*)</label></label>
                    <div class="col-md-8 col-lg-8">
                        <div class="col-sm-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                    {{$p->Jenis_Kelamin_Finance == 'Perempuan' ? 'checked' : ''}} required>
                                <label class="form-check-label">
                                    Perempuan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki"
                                    {{$p->Jenis_Kelamin_Finance == 'Laki-Laki' ? 'checked' : ''}} required>
                                <label class="form-check-label">
                                    Laki-Laki
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Alamat Finance <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <textarea name='alamat_finance' class='form-control' required readonly
                            style="background-color:#e6e6fa;">{{$p->Alamat_Finance}}</textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Nomor Telepon <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="number" min='0' class="form-control" name="telepon_finance"
                            value="{{$p->Nomor_Telepon_Finance}}" required readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <input type='hidden' name='id_user' value='{{$p->ID_User}}'>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Username <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" value="{{$p->Username}}" required
                            readonly style="background-color:#e6e6fa;">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-4 col-form-label">Password <label
                            style='color:red;'>(*)</label></label>
                    <div class="col-sm-5">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name='password' value="{{$p->Password}}"
                                required id="password" readonly style="background-color:#e6e6fa;" />
                            <span class="input-group-text" onclick="showPassword()"><i
                                    class="bi bi-eye-fill"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <a href="/admin/finance" class="btn btn-secondary"><i class='bi bi-x-circle'></i>&nbsp;
                        Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->
            @endforeach

        </div>
    </div>

</div>
<script>
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
@endsection