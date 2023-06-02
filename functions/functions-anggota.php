<?php
// mengkoneksikan ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'skripsi-pirda';
$conn = mysqli_connect($host, $username, $password, $dbname);

function tampilData($query) // Function untuk menampilkan data
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function editProfil($data)
{
    global $conn;
    $id_anggota = $_SESSION['id'];
    $no_kartu = htmlspecialchars($data['no_kartu']);
    $no_registrasi = htmlspecialchars($data['no_registrasi']);
    $mulai_bergabung = htmlspecialchars($data['mulai_bergabung']);
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $alamat = htmlspecialchars($data['alamat']);
    $ktp = htmlspecialchars($data['ktp']);
    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }
    $foto_bukti = uploadFotoBukti();
    if (!$foto_bukti) {
        return false;
    }

    $query = "UPDATE anggota SET username = '$username', nama = '$nama', no_kartu = '$no_kartu', no_registrasi = '$no_registrasi', alamat = '$alamat', ktp = '$ktp', foto = '$foto', foto_bukti = '$foto_bukti', mulai_bergabung = '$mulai_bergabung' WHERE id_anggota = '$id_anggota'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "indexAnggota.php?p=profil-saya";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "indexAnggota.php?p=profil-saya";</script>';
    }
    mysqli_close($conn);
}

function uploadFoto()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if (
        $error === 4
    ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $eksetensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $eksetensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if (
        $ukuranFile > 10000000
    ) {
        echo "<script>
                alert('Ukuran gambar terlalu besar! (Max. 10MB)');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'assets-admin/images/' . $namaFileBaru);
    return $namaFileBaru;
}

function uploadFotoBukti()
{
    $namaFile = $_FILES['foto_bukti']['name'];
    $ukuranFile = $_FILES['foto_bukti']['size'];
    $error = $_FILES['foto_bukti']['error'];
    $tmpName = $_FILES['foto_bukti']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if (
        $error === 4
    ) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $eksetensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $eksetensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if (
        $ukuranFile > 10000000
    ) {
        echo "<script>
                alert('Ukuran gambar terlalu besar! (Max. 10MB)');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'assets-admin/images/' . $namaFileBaru);
    return $namaFileBaru;
}
