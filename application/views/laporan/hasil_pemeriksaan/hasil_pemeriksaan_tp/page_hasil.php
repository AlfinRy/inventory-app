<html>

<head>

    <title>Hasil Data Pemeriksaan Tinta Print</title>
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
        }

        table td {
            /* vertical-align: top; */
        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        table #jj {
            margin-left: 20% auto;
        }

        #judul .atas {
            font-size: 11px;
            vertical-align: top;
        }

        #judul .bawah {
            font-size: 11px;
            vertical-align: bottom;
        }

        #judul .bi {
            border: 0px;
        }

        #jj th {
            border: 0px;
            font-size: 15px;
            padding-bottom: 15px;
        }

        #jj td {
            border: 0px;
        }

        #jj .jdl {
            font-size: 11px;
            /* padding-right: 0; */
            width: 35%;
        }

        #jj .hsl {
            font-size: 11px;
            /* padding-right: 0; */
        }

        #jj .ti {
            font-size: 11px;
            width: 3%;
        }

        #hh .jdl {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }

        #hh .namapmr {
            font-size: 11px;
            vertical-align: top;
        }

        #hh .hsl {
            text-align: center;
            font-size: 11px;
        }

        #hh .syarat {
            text-align: left;
            font-size: 11px;
        }

        #hh .teks {
            text-align: left;
            font-size: 11px;
            border: 0px;
        }

        #hh .analis {
            font-size: 11px;
            border: 0px;
        }

        #hh .ttd {
            text-align: center;
            vertical-align: top;
            font-size: 11px;
            border-right: 0px;
            border-top: 0px;
            border-bottom: 0px;
        }

        #hh .penguji {
            font-size: 11px;
            border-top: 0px;
            border-right: 0px;
        }

        #hh .bi-bt {
            font-size: 11px;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        #hh .bi {
            font-size: 11px;
            border-top: 0px;
            border-bottom: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        #hh .b-right {
            font-size: 11px;
            border-top: 0px;
            border-bottom: 0px;
            border-left: 0px;
        }

        #hh .b-rb {
            font-size: 11px;
            border-top: 0px;
            border-left: 0px;
        }

        #hh .ket {
            font-size: 11px;
            vertical-align: bottom;
            border: 0px;
            padding-left: 2%;
        }

        #hh .ket-hsl {
            font-size: 11px;
            vertical-align: bottom;
            border: 0px;
        }
    </style>
</head>

<body>
    <table id="judul" style="width:90%;">
        <tr>
            <td class="bi" rowspan="3" style="text-align:left; width:60%;">
                <?php $src = base_url('assets/images/knlogo.png'); ?>
                <img style="width:30%;" src="<?= $src ?>">
            </td>
            <td height="10" class="bawah">
                Form – QCA – 48 / R0
            </td>
        </tr>
        <tr>
            <td height="10" class="atas">
                Mulai Berlaku : 02 Januari 2018
            </td>
        </tr>
        <tr>
            <td class="bi">
            </td>
        </tr>
    </table>
    <table style="width:80%;" id="jj">
        <thead>
            <tr>
                <th colspan="3">
                    DATA PEMERIKSAAN TINTA PRINT<br>
                </th>
            </tr>
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
            foreach ($detail as $key) { ?>
                <tr>
                    <?php if ($key['status'] === "Released") {
                        $tgl_rilis =  explode('-', $key['tgl_rilis'])[2] . " " . bulan(explode('-', $key['tgl_rilis'])[1]) . " " . explode('-', $key['tgl_rilis'])[0];
                    ?>
                        <td class="jdl">Tanggal Released</td>
                        <td class="ti">:</td>
                        <td class="hsl"><?= $tgl_rilis ?></td>
                    <?php } ?>
                    <?php if ($key['status'] === "Di Tolak") {
                        $tgl_reject =  explode('-', $key['tgl_reject'])[2] . " " . bulan(explode('-', $key['tgl_reject'])[1]) . " " . explode('-', $key['tgl_reject'])[0];
                    ?>
                        <td class="jdl">Tanggal Reject</td>
                        <td class="ti">:</td>
                        <td class="hsl"><?= $tgl_reject ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td class="jdl">Warna Tinta</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_barang'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Supplier</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_suplier'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Nama Produsen/Negara</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['nama_produsen'] ?> / <?= $key['negara_produsen'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">No. Batch/Lot</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['no_batch'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">No. Analisa</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['no_analis'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Total</td>
                    <td class="ti">:</td>
                    <td class="hsl"><?= $key['qty'] ?> <?= $key['satuan'] ?></td>
                </tr>
                <tr>
                    <td class="jdl">Referensi</td>
                    <td class="ti">:</td>
                    <td class="hsl"> SPEK - QCA - 015</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Tabel Hasil -->
    <?php
    $no = 1;
    ?>
    <table style="width:100%;" id="hh">
        <?php foreach ($detail as $key) { ?>
            <tr>
                <td rowspan="2" class="jdl" style="width: 10%;">NO</td>
                <td rowspan="2" class="jdl" style="width: 20%;">PARAMETER PEMERIKSAAN</td>
                <td rowspan="2" class="jdl" style="width: 20%;">SPESIFIKASI</td>
                <td colspan="4" class="jdl" style="width: 40%">HASIL PEMERIKSAAN BOTOL KE -</td>
            </tr>
            <tr>
                <td class="hsl">1</td>
                <td class="hsl">2</td>
                <td class="hsl">3</td>
                <td class="hsl">4</td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Pemerian</td>
                <td class="syarat">Cairan kental, warna sesuai dengan yang tercantum di etiket, kondisi kemasan masih baik</td>
                <td class="hsl"><?= $key['pemerian1'] ?></td>
                <td class="hsl"><?= $key['pemerian2'] ?></td>
                <td class="hsl"><?= $key['pemerian3'] ?></td>
                <td class="hsl"><?= $key['pemerian4'] ?></td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Berat Bruto (gram)</td>
                <td class="syarat">1050 - 1085 gram</td>
                <td class="hsl"><?= $key['b_bruto1'] ?></td>
                <td class="hsl"><?= $key['b_bruto2'] ?></td>
                <td class="hsl"><?= $key['b_bruto3'] ?></td>
                <td class="hsl"><?= $key['b_bruto4'] ?></td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Kekentalan (cPs)</td>
                <td class="syarat">400 - 700</td>
                <td class="hsl"><?= $key['kekentalan1'] ?></td>
                <td class="hsl"><?= $key['kekentalan2'] ?></td>
                <td class="hsl"><?= $key['kekentalan3'] ?></td>
                <td class="hsl"><?= $key['kekentalan4'] ?></td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Waktu Pengeringan</td>
                <td class="syarat">180 - 300 detik</td>
                <td class="hsl"><?= $key['waktu_p1'] ?></td>
                <td class="hsl"><?= $key['waktu_p2'] ?></td>
                <td class="hsl"><?= $key['waktu_p3'] ?></td>
                <td class="hsl"><?= $key['waktu_p4'] ?></td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Kondisi Suhu Pemeriksaan</td>
                <td class="syarat">25 °C</td>
                <td class="hsl"><?= $key['kondisi_sp1'] ?></td>
                <td class="hsl"><?= $key['kondisi_sp2'] ?></td>
                <td class="hsl"><?= $key['kondisi_sp3'] ?></td>
                <td class="hsl"><?= $key['kondisi_sp4'] ?></td>
            </tr>
            <tr>
                <td class="hsl"><?= $no++ ?></td>
                <td class="namapmr">Kondisi Penyimpanan</td>
                <td class="syarat">Dalam wadah tertutup baik dan terlindungi dari cahaya</td>
                <td class="hsl"><?= $key['kondisi_py1'] ?></td>
                <td class="hsl"><?= $key['kondisi_py2'] ?></td>
                <td class="hsl"><?= $key['kondisi_py3'] ?></td>
                <td class="hsl"><?= $key['kondisi_py4'] ?></td>
            </tr>
            <tr>
                <td colspan="3" class="teks" style="padding-left: 5%;">Ket : *) diperiksa oleh pihak ketiga.</td>
            </tr>
            <tr>
                <td class="analis" style="text-align: center; padding-top: 1%;">Analis :</td>
                <td class="teks"></td>
                <td class="teks"></td>
                <td class="teks" style="padding-top: 1%;">Diperiksa oleh:</td>
            </tr>
            <br>
            <tr>
                <td class="bi-bt" style="text-align: center; padding-top: 1%;">
                    <?= $key['penguji'] ?>
                </td>
                <td class="bi-bt"></td>
                <td class="bi-bt"></td>
                <td colspan="4" class="bi-bt" style="font-weight: bold; padding-left: 1%; padding-top: 1%;">Dewi Linda</td>
            </tr>
            <tr>
                <td class="ket"></td>
                <td class="ket" style="padding-top: 1%;">Keterangan</td>
                <td class="ket-hsl" colspan="3">: Sudah Tervalidasi *</td>
            </tr>
            <tr>
                <td class="ket"></td>
                <td class="ket">Kesimpulan</td>
                <td class="ket-hsl" colspan="3">: Tinta Print dapat digunakan</td>
            </tr>
        <?php } ?>
    </table>

    <!-- <table style="width:100%;" id="hh">
        <tr>
            <td class="jdl" style="width: 10%;">No.</td>
            <td class="jdl" style="width: 25%;">Pemeriksaan</td>
            <td class="jdl" style="width: 8%;">Unit</td>
            <td class="jdl" style="width: 10%;">Hasil</td>
            <td class="jdl">Persyaratan</td>
        </tr>
        <tr>
            <td class="jdl" height="10"></td>
            <td class="jdl"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table> -->

</body>

</html>