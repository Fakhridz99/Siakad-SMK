<?php
$namasekolah = "SMK Negeri 2 Bangkalan";
$alamatsekolah = "Jl Halim Perdana Kusuma Bangkalan";
$tahunajaran = "2022/2023";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style type="text/css">
        body {
            font-size: 18px;
        }

        p {
            margin: 5px 0 0 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
            display: block;
        }

        .bold {
            font-weight: bold;
        }

        #footer {
            clear: both;
            position: relative;
            height: 40px;
            margin-top: -40px;
        }
    </style>
</head>

<body style="font-size: 12px" onload="window.print();">
    <table width="100%">
        <tr>
            <td width="50%"><img src="<?php echo base_url('assets/dist/img/SMK.png') ?>" style="width: 200px;"></td>
        </tr>
    </table>

    <p align="center">
        <span style="font-size: 30px"><b>RAPORT SISWA</span> <br>
    </p>

    <hr>

    <p>
    <table>
        <?php foreach ($nilai as $row) : ?>
            <tr>
                <th align="left"> Nama Siswa </th>
                <td> : <?php echo $row->nama_siswa; ?></td>
            </tr>
            <tr>
                <th align="left"> Nomer Induk Siswa </th>
                <td> : <?php echo $row->nis; ?></td>
            </tr>
            <tr>
                <th align="left"> Sekolah</th>
                <td> : <?php echo $namasekolah; ?></td>
            </tr>
            <tr>
                <th align="left"> Alamat</th>
                <td> : <?php echo $alamatsekolah; ?></td>
            </tr>
            <tr>
                <th align="left"> Kelas</th>
                <td> : <?php echo $row->kelas_jurusan . " " . $row->kode_jurusan . " " . $row->ruang_jurusan; ?></td>
            </tr>
            <tr>
                <th align="left"> Tahun Ajaran</th>
                <td> : <?php echo $tahunajaran; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </p>




    <p>
    <table style="border: 1px solid black;border-collapse: collapse;font-size: 11px;text-align:center;" width="100%">

        <tr style="margin: 5px">
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">Mata Pelajaran</th>
            <th style="border: 1px solid black;">Nilai Akhir</th>
            <th style="border: 1px solid black;">Capaian Kompetensi</th>
        </tr>
        <?php $no = 1;
        foreach ($nilai as $row) : ?>
            <tr style="margin: 5px">
                <td style="border: 1px solid black;"><?php echo $no++ ?></td>
                <td style="border: 1px solid black;"><?php echo $row->nama_mapel ?></td>
                <td style="border: 1px solid black;"><?php echo $row->nilai_akhir ?></td>
                <td style="border: 1px solid black;"><?php echo $row->capaian_kompetensi ?></td>

                <!-- <td style="border: 1px solid black;">-</td> -->
            </tr>
        <?php endforeach; ?>

    </table>


    </p>

    <br>

    <p>
    <table>
        <?php //foreach ($absensi as $row) : ?>
            <tr>
                <th align="left"> Kehadiran</th>
                <td> : <?php echo $hadir; ?></td>
            </tr>
            <tr>
                <th align="left"> Izin </th>
                <td> : <?php echo $izin; ?></td>
            </tr>
            <tr>
                <th align="left"> Sakit</th>
                <td> : <?php echo $sakit; ?></td>
            </tr>
            <tr>
                <th align="left"> Alpha</th>
                <td> : <?php echo $alpha; ?></td>
            </tr>
        <?php //endforeach; ?>
    </table>
    </p>

    <p>
    <table width="100%">
        <tr>
            <td align="center"><br><br><br><br><br><u></u><br></td>
            <td align="center"><br><br><br><br><br><u></u><br></td>
            <td align="center">Diketahui oleh<br><br><br><br><br><u>NUR HAZIZAH,S.PD., M.PD.</u><br>Kepala Sekolah</td>
        </tr>
    </table>
    </p>



    <p class="footer">
        <small>Tim Asset</small>
    </p>


</body>

</html>