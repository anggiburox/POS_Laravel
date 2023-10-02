<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN PEMASUKAN</title>
</head>

<body>
    @foreach ($pgw as $p)
    <?php
        $tanggal = date('d-M-Y', strtotime($p->Tanggal_Pengeluaran));
        $nama_leader = ($p->Nama_Leader);
        $nama_outlet = ($p->Nama_Outlet);
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
                <table border="1" cellpadding="0" cellspacing="0" style="width:100%; font-size:7pt; font-weight:bold;">
                    <tr>
                        <th style="background-color: #f2f2f2;" colspan="3">
                            RINCIAN PENGELUARAN BELANJA OUTLET
                        </th>
                    </tr>
                    <tr>
                        <th style="background-color: #f2f2f2;" width="60%">
                            NAMA BARANG
                        </th>
                        <th style="background-color: #f2f2f2;" width="20%">
                            QTY
                        </th>
                        <th style="background-color: #f2f2f2;" width="20%">
                            NILAI
                        </th>
                    </tr>
                    @foreach ($ListPengeluaran as $key => $value)
                    @if ($key % 3 === 1)
                    <tr>
                        @endif
                        @if ($key % 3 === 0)
                        <td style="text-align: right;">
                            <table border="0" style="width: 100%">
                                <tr>
                                    <td>Rp.</td>
                                    <td style="text-align: right;">{{ $value }},00</td>
                                </tr>
                            </table>
                        </td>
                        @else
                        <td>&nbsp; {{ $value }}</td>
                        @endif
                        @if ($key % 3 === 0)
                    </tr>
                    @endif
                    @endforeach
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
                            leader
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