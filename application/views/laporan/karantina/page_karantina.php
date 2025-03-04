<html>

<head>

    <title>Label Karantina</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }

        table td {
            vertical-align: top;
        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .hh tr td {
            border: 0;
            padding: 0
        }

        .hh {
            margin-bottom: 2px;
        }
    </style>
</head>

<body>
    <!-- <table class="hh">
        <tr>
            <td style="width: 460px;">
                <h2 style="line-height: 0.01; font-size: 30px;">PT KAPSULINDO NUSANTARA</h2>
                <h3 style="line-height: 0.01; font-size: 23px;">Pedagang Besar Bahan Baku Farmasi</h3>
                <p style="line-height: 0.01;font-size: 12px;">Jl. Pancasila 1 Cicadas Gunung Putrri - Kab. Bogor 16964, Indonesia</p>
                <p style="line-height: 0.01;font-size: 12px;">Tlp:(021) 8671165. Fax:(021) 8671168,86861734. Email: pbbbf@kapsulindo.co.id</p>
            </td>


        </tr>
    </table>

    <hr style="line-height: 0.01;">
    <div style="text-align: center;padding-top: 5px;">
        <h3 style="float: center;line-height: 0.2;">Laporan Stok Barang</h3>
        <p style="line-height: 0.1;font-size: 12px;">Per Tanggal :</p>
    </div> -->
    <table class="bg" style="width:350px;font-size: 18px;">
        <thead>
            <tr>
                <th colspan="2" style="font-size: 12px;">
                    PT. KAPSULINDO NUSANTARA <br>
                    <span style="font-size: 8px; text-align:center;"> CICADAS - GUNUNG PUTRI</span>
                </th>
            </tr>
            <tr>
                <th colspan="2" style="font-size: 9px;">
                    LABORATORIUM QUALITY CONTROL <br>
                    <span>KARANTINA</span>
                </th>
            </tr>
            <!-- <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th class="text-right">Masuk</th>
                <th class="text-right">Keluar</th>
                <th class="text-right">Stok</th>
            </tr> -->
        </thead>
        <tbody>
            <?php
            function bulan($bulan)
            {
                if ($bulan == '01') {
                    return "Januari";
                } elseif ($bulan == '02') {
                    return "Februari";
                } elseif ($bulan == '03') {
                    return "Maret";
                } elseif ($bulan == '04') {
                    return "April";
                } elseif ($bulan == '05') {
                    return "Mei";
                } elseif ($bulan == '06') {
                    return "Juni";
                } elseif ($bulan == '07') {
                    return "Juli";
                } elseif ($bulan == '08') {
                    return "Agustus";
                } elseif ($bulan == '09') {
                    return "September";
                } elseif ($bulan == '10') {
                    return "Oktober";
                } elseif ($bulan == '11') {
                    return "November";
                } elseif ($bulan == '12') {
                    return "Desember";
                } else {
                    return "No Month";
                }
            }
            foreach ($detail as $key) {
            ?>
                <tr>
                    <td style="font-size: 9px;">Tanggal</td>
                    <td style="font-size: 9px;"><?= $key['tgl'] ?></td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">No Batch</td>
                    <td style="font-size: 9px;"><?= $key['no_batch'] ?></td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">Nama Bahan Baku</td>
                    <td style="font-size: 9px;"><?= $key['nama_barang'] ?></td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">Kode Bahan Baku</td>
                    <td style="font-size: 9px;"><?= $key['kode_barang'] ?></td>
                </tr>
                <tr>
                    <td style="font-size: 9px;">Pabrik / Supplier</td>
                    <td style="font-size: 9px;"><?= $key['nama_suplier'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>