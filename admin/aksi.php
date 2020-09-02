<?php

include "include/koneksi.php";
include "include/fungsi_antiinjection.php";
include "include/fungsi_waktu.php";

$id_wisata = antiinjection($_POST['id_wisata']);
$nama_wisata = antiinjection($_POST['nama_wisata']);
$alamat = antiinjection($_POST['alamat']);
$kategori = antiinjection($_POST['kategori']);
$deskripsi = antiinjection($_POST['deskripsi']);
if ($_GET['mod'] == 'tambah') {
	$gambar =  $_FILES['gambar']['name'];
	$awal = substr($gambar, 0, -4);
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
	$upload_gambar = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
	//file tmp
	$file_tmp = $_FILES['gambar']['tmp_name'];
	$ukuran = $_FILES['gambar']['size'];
	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
		if ($ukuran < 10044070) {
			move_uploaded_file($file_tmp, '../img/' . $upload_gambar);
			$sql = $db->query("INSERT INTO wisata (id_wisata, nama_wisata, alamat, deskripsi, gambar,id_kategori) VALUES ('$id_wisata','$nama_wisata', '$alamat', '$deskripsi', '$upload_gambar','$kategori') ");
			if ($sql) {
				header('location:index.php?code=1');
			} else {
				header('location:index.php?code=7');
			}
		} else {
			header('location:index.php?code=5');
		}
	} else {
		header('location:index.php?code=6');
	}
} else if ($_GET['mod'] == 'edit') {
	$gambar =  $_FILES['gambar']['name'];
	$file_tmp = $_FILES['gambar']['tmp_name'];
	$awal = substr($gambar, 0, -4);
	$x = explode('.', $gambar);
	$ekstensi = strtolower(end($x));
	$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
	$upload_gambar = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
	//file tmp
	$file_tmp = $_FILES['gambar']['tmp_name'];
	$ukuran = $_FILES['gambar']['size'];
	if ($gambar != "") {
		if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
			if ($ukuran < 10044070) {
				$a = $_POST['a'];
				$b = '../img/' . $a;
				$hapus_gambar_lama = unlink($b);
				if ($hapus_gambar_lama) {
					move_uploaded_file($file_tmp, '../img/' . $upload_gambar);
					$sql = $db->query("UPDATE wisata SET nama_wisata='$nama_wisata', alamat='$alamat', deskripsi='$deskripsi',id_kategori='$kategori' ,gambar='$upload_gambar' WHERE id_wisata='$id_wisata'");
					if ($sql) {
						header('location:index.php?code=2');
					} else {
						header('location:index.php?code=8');
					}
				}
			} else {
				header('location:index.php?code=5');
			}
		} else {
			header('location:index.php?code=6');
		}
	} else {
		$sql = $db->query("UPDATE wisata SET nama_wisata='$nama_wisata', alamat='$alamat', deskripsi='$deskripsi',id_kategori='$kategori' WHERE id_wisata='$id_wisata'");
		if ($sql) {
			header('location:index.php?code=2');
		} else {
			header('location:index.php?code=8');
		}
	}
}

if ($_GET['mod'] == 'delete') {
	$id_wisata = $_GET['id_wisata'];
	$data = mysqli_fetch_array(mysqli_query($db, "SELECT gambar FROM wisata WHERE id_wisata='$id_wisata'"));
	if ($data['gambar'] != "") {
		$b = '../img/' . $data['gambar'];
		$hapus_gambar_lama = unlink($b);
		if ($hapus_gambar_lama) {
			$sql1 = $db->query("DELETE FROM wisata WHERE id_wisata='$id_wisata'");
			header('location:index.php?code=3');
		}
	}
	$sql1 = $db->query("DELETE FROM wisata WHERE id_wisata='$id_wisata'");
	header('location:index.php?code=3');
}
