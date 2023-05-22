<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'skripsi-pirda';

$conn = mysqli_connect($host, $username, $password, $dbname);

function tampilData($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahDataPengurus($data)
{
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $jabatan = htmlspecialchars($data['jabatan']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $ktp = htmlspecialchars($data['ktp']);

    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO pengurus VALUES ('', '$nama', '$jabatan', '$no_hp', '$ktp', '$foto')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "indexAdmin.php?p=pengurus";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "indexAdmin.php?p=pengurus";</script>';
    }
    mysqli_close($conn);
}

function hapusDataPengurus($data)
{
    global $conn;
    $id_pengurus = htmlspecialchars($data['btn-hapus']);

    $query = "DELETE FROM pengurus WHERE pengurus.id_pengurus = '$id_pengurus'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=pengurus";</script>';
    } else {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=pengurus";</script>';
    }
    mysqli_close($conn);
}

function editDataPengurus($data)
{
    global $conn;
    $id_pengurus = htmlspecialchars($data['btn-edit']);
    $nama = htmlspecialchars($data['nama']);
    $jabatan = htmlspecialchars($data['jabatan']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $ktp = htmlspecialchars($data['ktp']);

    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $query = "UPDATE pengurus SET nama = '$nama', jabatan = '$jabatan', no_hp = '$no_hp', ktp = '$ktp', foto = '$foto' WHERE id_pengurus = '$id_pengurus'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "indexAdmin.php?p=pengurus";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "indexAdmin.php?p=pengurus";</script>';
    }
    mysqli_close($conn);
}

function tambahDataAnggota($data)
{
    global $conn;
    $no_kartu = htmlspecialchars($data['no_kartu']);
    $no_registrasi = htmlspecialchars($data['no_registrasi']);
    $mulai_bergabung = htmlspecialchars($data['mulai_bergabung']);
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $alamat = htmlspecialchars($data['alamat']);
    $ktp = htmlspecialchars($data['ktp']);
    $luas_plasma = htmlspecialchars($data['luas_plasma']);
    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }
    $foto_bukti = uploadFotoBukti();
    if (!$foto_bukti) {
        return false;
    }

    $query = "INSERT INTO anggota VALUES ('', '$username', '$password', '$nama', '$no_kartu', '$no_registrasi', '$alamat', '$ktp', '$luas_plasma', '$foto', '$foto_bukti', '$mulai_bergabung')";
    if (mysqli_query($conn, $query)) {
        $id = mysqli_insert_id($conn);
        $query2 = "INSERT INTO simpanan_pokok VALUES ('', '$id', 50000)";
        if (mysqli_query($conn, $query2)) {
            echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "indexAdmin.php?p=anggota";</script>';
        } else {
            echo '<script>alert("Data Gagal Ditambahkan"); location.href = "indexAdmin.php?p=anggota";</script>';
        }
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "indexAdmin.php?p=anggota";</script>';
    }
    mysqli_close($conn);
}

function hapusDataAnggota($data)
{
    global $conn;
    $id_anggota = htmlspecialchars($data['btn-hapus']);

    $query = "DELETE FROM anggota WHERE anggota.id_anggota = '$id_anggota'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=anggota";</script>';
    } else {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=anggota";</script>';
    }
    mysqli_close($conn);
}

function editDataAnggota($data)
{
    global $conn;
    $id_anggota = htmlspecialchars($data['btn-edit']);
    $no_kartu = htmlspecialchars($data['no_kartu']);
    $no_registrasi = htmlspecialchars($data['no_registrasi']);
    $mulai_bergabung = htmlspecialchars($data['mulai_bergabung']);
    $nama = htmlspecialchars($data['nama']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $alamat = htmlspecialchars($data['alamat']);
    $ktp = htmlspecialchars($data['ktp']);
    $luas_plasma = htmlspecialchars($data['luas_plasma']);
    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }
    $foto_bukti = uploadFotoBukti();
    if (!$foto_bukti) {
        return false;
    }

    $query = "UPDATE anggota SET username = '$username', password = '$password', nama = '$nama', no_kartu = '$no_kartu', no_registrasi = '$no_registrasi', alamat = '$alamat', ktp = '$ktp', luas_plasma = '$luas_plasma', foto = '$foto', foto_bukti = '$foto_bukti', mulai_bergabung = '$mulai_bergabung' WHERE id_anggota = '$id_anggota'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "indexAdmin.php?p=anggota";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "indexAdmin.php?p=anggota";</script>';
    }
    mysqli_close($conn);
}

function tambahDataTahun($data)
{
    global $conn;
    $tahun = htmlspecialchars($data['tahun']);

    $cek = tampilData("SELECT tahun FROM tahun WHERE tahun = $tahun");
    if (count($cek) > 0) {
        echo '<script>alert("Data Gagal Ditambahkan, Tahun Sudah Ada"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
    } else {
        $query = "INSERT INTO tahun VALUES ('', '$tahun')";
        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
        } else {
            echo '<script>alert("Data Gagal Ditambahkan"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
        }
    }
    mysqli_close($conn);
}

function editDataTahun($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-edit']);
    $tahun = htmlspecialchars($data['tahun']);

    $cek = tampilData("SELECT tahun FROM tahun WHERE tahun = $tahun");

    if (count($cek) > 0) {
        echo '<script>alert("Data Gagal Diedit, Tahun Sudah Ada"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
    } else {
        $query = "UPDATE tahun SET tahun = '$tahun' WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Data Berhasil Diedit"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
        } else {
            echo '<script>alert("Data Gagal Diedit"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
        }
    }
    mysqli_close($conn);
}

function hapusDataTahun($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-hapus']);

    $query = "DELETE FROM tahun WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
    } else {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=simpanan-wajib-tahun";</script>';
    }
    mysqli_close($conn);
}

function tambahDataBulan($data)
{
    global $conn;
    $id_tahun = htmlspecialchars($data['btn-tambah']);
    $bulan = htmlspecialchars($data['bulan']);

    $cek = tampilData("SELECT bulan FROM bulan WHERE bulan = '$bulan' AND id_tahun = $id_tahun");

    if (count($cek) > 0) {
        echo "<script>
                alert('Data Gagal Ditambahkan, Bulan Sudah Ada'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
    } else {
        $query = "INSERT INTO bulan VALUES ('', '$id_tahun', '$bulan')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Data Berhasil Ditambahkan'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Ditambahkan'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
        }
    }
    mysqli_close($conn);
}

function editDataBulan($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-edit']);
    $id_tahun = htmlspecialchars($data['id_tahun']);
    $bulan = htmlspecialchars($data['bulan']);

    $cek = tampilData("SELECT bulan FROM bulan WHERE bulan = '$bulan' AND id_tahun = $id_tahun");

    if (count($cek) > 0) {
        echo "<script>
                alert('Data Gagal Diedit, Bulan Sudah Ada'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
    } else {
        $query = "UPDATE bulan SET bulan = '$bulan' WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Data Berhasil Diedit'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Diedit'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
        }
    }
    mysqli_close($conn);
}

function hapusDataBulan($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-hapus']);
    $id_tahun = htmlspecialchars($data['id_tahun']);

    $query = "DELETE FROM bulan WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data Berhasil Dihapus'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Dihapus'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib-bulan&id=" . $id_tahun . "';
            </script>";
    }
    mysqli_close($conn);
}

function tambahDataSimpananWajib($data)
{
    global $conn;
    $id_anggota = htmlspecialchars($data['no_kartu']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $simpanan_wajib = htmlspecialchars($data['simpanan_wajib']);

    $query = "INSERT INTO simpanan_wajib VALUES ('', '$id_anggota','$simpanan_wajib','$id_bulan')";
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data Berhasil Ditambahkan'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib&id=" . $id_bulan . "';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib&id=" . $id_bulan . "';
            </script>";
    }
    mysqli_close($conn);
}

function editDataSimpananWajib($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-edit']);
    $id_anggota = htmlspecialchars($data['no_kartu']);
    $id_bulan = htmlspecialchars($data['id_bulan']);
    $simpanan_wajib = htmlspecialchars($data['simpanan_wajib']);

    $query = "UPDATE simpanan_wajib SET id_anggota = '$id_anggota', simpanan_wajib = '$simpanan_wajib' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data Berhasil Diedit'); 
            location.href = 'indexAdmin.php?p=simpanan-wajib&id=" . $id_bulan . "';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diedit'); 
            location.href = 'indexAdmin.php?p=simpanan-wajib&id=" . $id_bulan . "';
        </script>";
    }
    mysqli_close($conn);
}

function hapusDataSimpananWajib($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-hapus']);
    $id_bulan = htmlspecialchars($data['id_bulan']);

    $query = "DELETE FROM simpanan_wajib WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data Berhasil Dihapus'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib&id=" . $id_bulan . "';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Dihapus'); 
                location.href = 'indexAdmin.php?p=simpanan-wajib&id=" . $id_bulan . "';
            </script>";
    }
    mysqli_close($conn);
}

function tambahDataTransaksi($data)
{
    global $conn;
    $id_anggota = htmlspecialchars($data['id_anggota']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $sumber_dana = htmlspecialchars($data['sumber_dana']);
    $nama_produk = htmlspecialchars($data['nama_produk']);
    $bank_penerima = htmlspecialchars($data['bank_penerima']);
    $no_rek = htmlspecialchars($data['no_rek']);
    $nama_rek = htmlspecialchars($data['nama_rek']);
    $mata_uang = htmlspecialchars($data['mata_uang']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $reference_number = htmlspecialchars($data['reference_number']);

    $query = "INSERT INTO transaksi VALUES ('', '$id_anggota', '$tanggal','$sumber_dana','$nama_produk','$bank_penerima','$no_rek','$nama_rek','$mata_uang','$jumlah','$reference_number')";
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data Berhasil Ditambahkan'); 
                location.href = 'indexAdmin.php?p=transaksi';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan'); 
                location.href = 'indexAdmin.php?p=transaksi';
            </script>";
    }
    mysqli_close($conn);
}

function editDataTransaksi($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-edit']);
    $id_anggota = htmlspecialchars($data['id_anggota']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $sumber_dana = htmlspecialchars($data['sumber_dana']);
    $nama_produk = htmlspecialchars($data['nama_produk']);
    $bank_penerima = htmlspecialchars($data['bank_penerima']);
    $no_rek = htmlspecialchars($data['no_rek']);
    $nama_rek = htmlspecialchars($data['nama_rek']);
    $mata_uang = htmlspecialchars($data['mata_uang']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $reference_number = htmlspecialchars($data['reference_number']);

    $query = "UPDATE transaksi SET 
                id_anggota = '$id_anggota', 
                tanggal = '$tanggal', 
                sumber_dana = '$sumber_dana', 
                nama_produk = '$nama_produk', 
                bank_penerima = '$bank_penerima', 
                no_rek = '$no_rek', 
                nama_rek = '$nama_rek', 
                mata_uang = '$mata_uang', 
                jumlah = '$jumlah', 
                reference_number = '$reference_number'
            WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data Berhasil Diedit'); 
            location.href = 'indexAdmin.php?p=transaksi';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Diedit'); 
            location.href = 'indexAdmin.php?p=transaksi';
        </script>";
    }
    mysqli_close($conn);
}

function hapusDataTransaksi($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-hapus']);

    $query = "DELETE FROM transaksi WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data Berhasil Dihapus'); 
                location.href = 'indexAdmin.php?p=transaksi';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal Dihapus'); 
                location.href = 'indexAdmin.php?p=transaksi';
            </script>";
    }
    mysqli_close($conn);
}

function tambahDataGaleri($data)
{
    global $conn;
    $judul = htmlspecialchars($data['judul']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO galeri VALUES ('', '$foto', '$judul', '$keterangan')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Ditambahkan"); location.href = "indexAdmin.php?p=galeri";</script>';
    } else {
        echo '<script>alert("Data Gagal Ditambahkan"); location.href = "indexAdmin.php?p=galeri";</script>';
    }
    mysqli_close($conn);
}

function hapusDataGaleri($data)
{
    global $conn;
    $id_galeri = htmlspecialchars($data['btn-hapus']);

    $query = "DELETE FROM galeri WHERE galeri.id_galeri = '$id_galeri'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=galeri";</script>';
    } else {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "indexAdmin.php?p=galeri";</script>';
    }
    mysqli_close($conn);
}

function editDataGaleri($data)
{
    global $conn;
    $id_galeri = htmlspecialchars($data['btn-edit']);
    $judul = htmlspecialchars($data['judul']);
    $keterangan = htmlspecialchars($data['keterangan']);

    $foto = uploadFoto();
    if (!$foto) {
        return false;
    }

    $query = "UPDATE galeri SET foto = '$foto', judul = '$judul', keterangan = '$keterangan' WHERE id_galeri = '$id_galeri'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "indexAdmin.php?p=galeri";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "indexAdmin.php?p=galeri";</script>';
    }
    mysqli_close($conn);
}

function simpanKontak($data)
{
    global $conn;
    $id_kontak = htmlspecialchars($data['btn-simpan']);
    $alamat = htmlspecialchars($data['alamat']);
    $telp = htmlspecialchars($data['telp']);
    $email = htmlspecialchars($data['email']);

    $query = "UPDATE kontak SET alamat = '$alamat', telp = '$telp', email = '$email' WHERE id_kontak = '$id_kontak'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Disimpan"); location.href = "indexAdmin.php?p=kontak";</script>';
    } else {
        echo '<script>alert("Data Gagal Disimpan"); location.href = "indexAdmin.php?p=kontak";</script>';
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
