<?php
include "include/koneksi.php";
include "include/fungsi_antiinjection.php";
include "include/fungsi_waktu.php";

$judul = antiinjection($_POST['judul']);

if ($_GET['mod'] == 'tambah') {
    $foto_awal = $_FILES['foto']['name'];
    //ekstensi atau format foto (png,jpg,jpeg)
    $x = explode('.', $foto_awal);
    $ekstensi = strtolower(end($x));
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $awal = substr($foto_awal, 0, -4);
    $foto = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    //file tmp
    $file_tmp = $_FILES['foto']['tmp_name'];
    //
    $ukuran = $_FILES['foto']['size'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 10044070) {
            move_uploaded_file($file_tmp, '../img/' . $foto);
            $query_tambah = $db->query("INSERT INTO tb_galeri VALUES ('','$judul','$foto')");
            if ($query_tambah) {
                echo "<script>window.location.href = 'index_galeri.php?code=1'</script>";
            } else {
                echo "<script>window.location.href = 'index_galeri.php?code=4'</script>";
            }
        } else {
            echo "<script>alert('Ukuran File Tidak Boleh Lebih Dari 1 MB');window.location.href = 'index_galeri.php?code=4'</script>";
        }
    } else {
        echo "<script>alert('Format foto Harus JPEG, JPG, atau PNG');window.location.href = 'index_galeri.php?code=4'</script>";
    }
} else if ($_GET['mod'] == 'delete') {
    $id = $_GET['id'];
    $data = mysqli_fetch_array($db->query("SELECT nama_gambar FROM tb_galeri WHERE id_gambar='$id'"));
    $a = '../img/' . $data['nama_gambar'];
    $hapus_foto = unlink($a);
    if ($hapus_foto) {
        $delete_query = $db->query("DELETE FROM tb_galeri WHERE id_gambar='$id'");
        if ($delete_query) {
            echo "<script>window.location.href = 'index_galeri.php?code=3'</script>";
        } else {
            echo "<script>window.location.href = 'index_galeri.php?code=4'</script>";
        }
    } else {
        $delete_query = $db->query("DELETE FROM tb_galeri WHERE id_gambar='$id'");
        if ($delete_query) {
            echo "<script>window.location.href = 'index_galeri.php?code=3'</script>";
        } else {
            echo "<script>window.location.href = 'index_galeri.php?code=4'</script>";
        }
    }
} else if ($_GET['mod'] == 'edit') {
    $id = antiinjection($_POST['id']);
    $foto_sebelumnya = $_POST['a'];
    //file foto dari form edit barang
    $foto_awal = $_FILES['foto']['name'];
    //ekstensi atau format foto (png,jpg,jpeg)
    $x = explode('.', $foto_awal);
    $ekstensi = strtolower(end($x));
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $awal = substr($foto_awal, 0, -4);
    $foto = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
    //file tmp
    $file_tmp = $_FILES['foto']['tmp_name'];
    // ukuran foto
    $ukuran = $_FILES['foto']['size'];
    if ($foto_awal == "") {
        $query_edit = $db->query("UPDATE tb_galeri SET judul_gambar='$judul' WHERE id_gambar='$id'");
        if ($query_edit) {
            echo "<script>window.location.href = 'index_galeri.php?code=2'</script>";
        } else {
            echo "<script>window.location.href = 'index_galeri.php?code=4'</script>";
        }
    } else {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 10044070) {
                $a = '../img/' . $foto_sebelumnya;
                $hapus_foto = unlink($a);
                move_uploaded_file($file_tmp, '../img/' . $foto);
                $query_edit = $db->query("UPDATE tb_galeri SET nama_gambar='$foto',judul_gambar='$judul' WHERE id_gambar='$id'");
                if ($query_edit) {
                    echo "<script>window.location.href = 'index_galeri.php?code=2'</script>";
                } else {
                    echo "<script>window.location.href = 'index_galeri.php?code=4'</script>";
                }
            } else {
                echo "<script>alert('Ukuran File Tidak Boleh Lebih Dari 1 MB');window.location.href = 'index_galeri.php?code=4'</script>";
            }
        } else {
            echo "<script>alert('Format foto Harus JPEG, JPG, atau PNG');window.location.href = 'index_galeri.php?code=4'</script>";
        }
    }
}
