<?php 
    include('./input-config.php');
    if ($_SESSION["login"] != TRUE){
        header('location:login.php');
    }
    echo "<div class='container'>";
    echo "Selamat Datang, ". $_SESSION["username"]. "<br>";
    echo "Anda Sebagai : ". $_SESSION["role"]. "-";
    echo "<a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
    echo "<hr>";
    echo "<a class='btn btn-sm btn-primary' href='input-nilai-tambah.php'>Tambah Data</a>";
    echo "<br>";
    echo "<a class='btn btn-sm btn-warning' href='input-nilai-pdf.php'>Cetak PDF</a>";
    echo "<hr>";
    // Menampilkan data diri database
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
                        <td>
                            <a class='btn btn-sm btn-success' href='input-nilai-edit.php?nis=".$row["nis"]."'>Edit</a>
                            &nbsp;-&nbsp;
                            <a class='btn btn-sm btn-danger' href='input-nilai-hapus.php?nis=".$row["nis"]."'
                            onclick='return confirm(\"Yakin Mau Hapus ?\");'>Hapus</a>
                        </td>
                </tr>
        ";
        $no++;                
    }

    echo "
        <table class='table table-dark table-bordered table-striped'>
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
                <th>Aksi</th>
            </tr>
            $tabledata
        </table>
    ";  
    echo "</div>";        
?>