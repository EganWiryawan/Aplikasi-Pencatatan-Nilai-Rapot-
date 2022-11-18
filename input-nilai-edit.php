<?php
    if  ( isset($_GET["nis"])){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM datanilai WHERE nis = '$nis';";
        include ('./input-config.php');
        $query = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($query);
    }
?>
<div class='container'>
<h1>Edit Data</h1>
<form action="input-nilai-edit.php" method="POST">
    <label for="nis"> Nomor Induk Siswa :</label>
    <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12103102"/><br>

    <label for="nama">Nama Lengkap</label>
    <input class="form-control" value="<?php echo $row["namalengkap"]; ?>" type="text" name="nama" placeholder="Ex. Firdaus"/><br>

    <label for="jeniskelamin">Jenis Kelamin</label>
    <input class="form-control" value="<?php echo $row["jeniskelamin"]; ?>" type="text" name="jeniskelamin"/><br>

    <label for="kelas">Kelas</label>
    <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas"/><br>

    <label for="nilai">Nilai  Kehadiran:</label>
    <input class="form-control" value="<?php echo $row["nilai_kehadiran"]; ?>"  type="number" name="nilai_kehadiran" placeholder="Ex. 80.56"/><br>
    
    <label for="nilai">Nilai  Tugas:</label>
    <input class="form-control" value="<?php echo $row["nilai_tugas"]; ?>"  type="number" name="nilai_tugas" placeholder="Ex. 80.56"/><br>
    
    <label for="nilai">Nilai  PTS:</label>
    <input class="form-control" value="<?php echo $row["nilai_pts"]; ?>"  type="number" name="nilai_pts" placeholder="Ex. 80.56"/><br>
    
    <label for="nilai">Nilai  PAS:</label>
    <input class="form-control" value="<?php echo $row["nilai_pas"]; ?>"  type="number" name="nilai_pas" placeholder="Ex. 80.56"/><br>

    <input class="btn btn-sm btn-success" type="submit" name="simpan" value="Edit Data"/>
    <a class="btn btn-sm btn-secondary" href="input-nilai.php">Kembali</a>
</form>
</div>

<?php
    if( isset($_POST["simpan"])){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pts"];
        $nilai_pas = $_POST["nilai_pas"];


        // EDIT - Memperbaharui Data 
        $query = "
                UPDATE datanilai SET namalengkap = '$nama',
                jeniskelamin = '$jeniskelamin',
                kelas = '$kelas',
                nilai_kehadiran = '$nilai_kehadiran',
                nilai_tugas = '$nilai_tugas',
                nilai_pts = '$nilai_pts',
                nilai_pas = '$nilai_pas'
                WHERE nis = '$nis'; 
                ";

    include ('./input-config.php');
    $update = mysqli_query($mysqli, $query);

        if($update){
        echo "
            <script>
            alert('Data berhasil diperbarui');
            window.location='input-nilai.php';
            </script>
        ";
        }else{
        echo "
            <script>
            alert('Data gagal');
            window.location='input-nilai-edit.php?nis=$nis';
            </script>
        ";
        }
    }
?>
