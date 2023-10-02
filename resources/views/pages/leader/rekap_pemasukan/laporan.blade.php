<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN PEMASUKAN</title>
</head>

<body>
    @foreach ($pgw as $p)
    <?php
        $tanggal = date('dmy', strtotime($p->Tanggal_Pemasukan));
        $total_pemasukan = ($p->Total_Pemasukan);
        $jenis_pembayaran = ($p->Jenis_Pembayaran);
        $no_rekening = ($p->No_Rekening);
        $pemilik_rekening = ($p->Pemilik_Rekening);
        $nama_leader = ($p->Nama_Leader);
        $nama_outlet = ($p->Nama_Outlet);
        $namaproduk = explode(',', $p->produk_names);
        $qty = explode(',', $p->produk_qty);
        $pcs = explode(',', $p->produk_pcs);
        $nama_pemasukan = explode(',', $p->nama_layanan);
        $jumlahpemasukan = explode(',', $p->harga_barang);
    ?>
    <table style="width: 100%">
        <tr>
            <td>
                <table border="1" cellpadding="0" cellspacing="0" style="
                            width: 100%;
                            font-weight: bold;
                            font-size: 12pt;
                            text-align: center;
                            ">
                    <tr>
                        <td>LAPORAN TRANSAKSI HARIAN OUTLET</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border="1" cellpadding="0" cellspacing="0"
                    style="width: 100%; font-size: 7pt; font-weight: bold">
                    <tr>
                        <td style="width: 60%">
                            &nbsp; TANGGAL/BULAN/TAHUN
                        </td>
                        <td style="width: 40%">
                            &nbsp; {{ $tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 60%">&nbsp; LEADER OUTLET</td>
                        <td style="width: 40%; text-transform: capitalize">
                            &nbsp; {{ $nama_leader }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 60%">&nbsp; OUTLET</td>
                        <td style="width: 40%; text-transform: capitalize">
                            &nbsp; {{ $nama_outlet }}
                        </td>
                    </tr>
                </table>
                <table border="1" cellpadding="0" cellspacing="0"
                    style="width: 100%; font-size: 7pt; font-weight: bold">
                    <tr>
                        <th style="background-color: #f2f2f2" colspan="3">
                            Total Goreng Ayam
                        </th>
                    </tr>
                    <tr>
                        <th style="background-color: #f2f2f2" width="60%">
                            Nama Barang
                        </th>
                        <th style="background-color: #f2f2f2" width="20%">
                            QTY
                        </th>
                        <th style="background-color: #f2f2f2" width="20%">
                            PCS
                        </th>
                    </tr>
                    <tr>
                        <td>
                            @foreach ($namaproduk as $val)
                            {{ $val }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($qty as $val)
                            {{ $val }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($pcs as $val)
                            {{ $val }}<br>
                            @endforeach
                        </td>
                    </tr>
                </table>
                <table border="1" cellpadding="0" cellspacing="0"
                    style="width: 100%; font-size: 7pt; font-weight: bold">
                    <tr>
                        <th style="background-color: #f2f2f2" colspan="2">
                            REKAP SETORAN
                        </th>
                    </tr>
                    <tr>
                        <th style="background-color: #f2f2f2" width="60%">
                            PEMASUKAN
                        </th>
                        <th style="background-color: #f2f2f2" width="40%">
                            JUMLAH
                        </th>
                    </tr>
                    <tr>
                        <td>
                            @foreach ($nama_pemasukan as $val)
                            {{ $val }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($jumlahpemasukan as $val)
                            {{ $val }}<br>
                            @endforeach
                        </td>
                    </tr>
                </table>
                <table border="1" cellpadding="0" cellspacing="0"
                    style="width: 100%; font-size: 7pt; font-weight: bold">
                    <tr>
                        <td style="width: 60%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; Jenis Pembayaran
                        </td>
                        <td style="width: 40%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; {{ $jenis_pembayaran }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 60%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; No Rekening
                        </td>
                        <td style="width: 40%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; {{ $no_rekening }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 60%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; Atas Nama Rekening
                        </td>
                        <td style="width: 40%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; {{ $pemilik_rekening }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 60%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; TOTAL PEMASUKAN
                        </td>
                        <td style="width: 40%; 
                                    background-color: #f2f2f2;
                                    text-align: center;">
                            &nbsp; {{ $total_pemasukan }}
                        </td>
                    </tr>
                </table>
                <table border="1" cellpadding="0" cellspacing="0"
                    style="width: 100%; font-size: 7pt; font-weight: bold">
                    <tr>
                        <td style="
                                    background-color: #f2f2f2;
                                    text-align: center;
                                    " colspan="2">
                            Mengetahui
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            <br />
                            <br />
                            <br />
                        </td>
                        <td style="width: 50%">
                            <br />
                            <br />
                            <br />
                        </td>
                    </tr>
                    <tr>
                        <td style="
                                    background-color: #f2f2f2;
                                    text-align: center;
                                ">
                            Admin
                        </td>
                        <td style="
                                    background-color: #f2f2f2;
                                    text-align: center;
                                    text-transform: capitalize;
                                    ">
                            Leader Outlet {{ $nama_leader }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

@endforeach

</html>