<div class='container'>
<h1>Tambah Data</h1>
<form action="input-nilai-tambah.php" method="POST">
    <label for="nis"> Nomor Induk Siswa :</label>
    <input class="form-control" type="number" name="nis" placeholder="Ex. 12103102"/><br>

    <label for="nama">Nama Lengkap</label>
    <input class="form-control" type="text" name="nama" placeholder="Ex. Firdaus"/><br>

    <label for="tanggal_lahir">Jenis Kelamin</label>
    <input class="form-control" type="text" name="jeniskelamin"/><br>

    <label for="nilai">Kelas</label>
    <input class="form-control" type="text" name="kelas" placeholder="Ex. 80.56"/><br>

    <label for="nilai">Nilai Kehadiran:</label>
    <input class="form-control" type="number" name="nilai_kehadiran" placeholder="Ex. 80.56"/><br>

    <label for="nilai">Nilai Tugas:</label>
    <input class="form-control" type="number" name="nilai_tugas" placeholder="Ex. 80.56"/><br>

    <label for="nilai">Nilai PTS:</label>
    <input class="form-control" type="number" name="nilai_pts" placeholder="Ex. 80.56"/><br>

    <label for="nilai">Nilai PAS:</label>
    <input class="form-control" type="number" name="nilai_pas" placeholder="Ex. 80.56"/><br>

    <input class="btn btn-sm btn-success" type="submit" name="simpan" value="Simpan Data"/>
    <a class="btn btn-sm btn-secondary" href="input-nilai.php">Kembali</a>
</form>
</div>

<?php
    include('./input-config.php');
    if( $_SESSION["login"] != TRUE ) {
        header('location:login.php');
    }

    if( $_SESSION["role"] != "admin" ) {
        echo "
            <script>
                alert('Akses tidak diberikan, kamu bukan Admin');
                window.location='input-nilai.php';
            </script>
        ";
    }

    if (isset($_GET["nis"]) && $_SESSION["role"] == "admin"){
        $nis = $_GET["nis"];
    } 

    if( isset($_POST["simpan"])){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $jeniskelamin = $_POST["jeniskelamin"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pts"];
        $nilai_pas = $_POST["nilai_pas"];

        // CREATE - Menambahkan Data ke Database 
        $query = "
                INSERT INTO datanilai VALUES
                ('$nis', '$nama', '$jeniskelamin', '$kelas', '$nilai_kehadiran', '$nilai_tugas', '$nilai_pts', '$nilai_pas');
                ";

                include ('./input-config.php');
                $insert = mysqli_query($mysqli, $query);

                if ($insert){
                    echo "
                            <script>
                                    alert('Data berhasil ditambahkan');
                                    window.location='input-nilai.php';
                            </script>
                    ";
                }
    }
