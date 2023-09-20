<?php 

session_start();

// cek apakah session ny ada / user sudah berhasil login atau belum
if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {


    // cek apakah data berhasil ditambahkana atau tidak
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php'
            </script>";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php'
            </script>";
    }
    // if(mysqli_affected_rows($conn) > 0) {
    //     echo "berhasil";
    // } else {
    //     echo "gagal!";
    //     echo "<br>";
    //     echo mysqli_error($conn);
    // }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" id="nama" required>
                
            </li>
            <li>
                <label for="nrp">NRP: </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>