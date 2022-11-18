<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./input-config.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli," SELECT * FROM datanilai");
    while($row = mysqli_fetch_array($data)){
        $nilai_akhir = ($row["nilai_kehadiran"]+$row["nilai_tugas"]+$row["nilai_pts"]+$row["nilai_pas"])/4;
        $tabledata .= "
                <tr>
                <td>".$row["nis"]."</td>
                <td>".$row["namalengkap"]."</td>
                <td>".$row["jeniskelamin"]."</td>
                <td>".$row["kelas"]."</td>
                <td>".$row["nilai_kehadiran"]."</td>
                <td>".$row["nilai_tugas"]."</td>
                <td>".$row["nilai_pts"]."</td>
                <td>".$row["nilai_pas"]."</td>
                <td>".$nilai_akhir."</td>
                </tr>
        ";
        $no++;                
    }

    $waktu_cetak = date('d M Y - H:i:s');
    $table = "
        <h1>Laporan Data Nilai</h1>
        <h6>Waktu Cetak : $waktu_cetak</h6>
        <table width='100%' cellpadding=5 border=1 cellspacing=0>
            <tr>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Nilai Kehadiran</th>
            <th>Nilai Tugas</th>
            <th>Nilai PTS</th>
            <th>Nilai PAS</th>
            <th>Nilai Akhir</th>
            </tr>
            $tabledata
        </table>
    ";            

    $mpdf -> WriteHTML($table);
    $mpdf -> Output();
?>