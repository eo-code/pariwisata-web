<?php

include "include/koneksi.php";
include "include/fungsi_antiinjection.php";
include "include/fungsi_waktu.php";

$id_kategori = antiinjection($_POST['id_kategori']);
$nm_kategori = antiinjection($_POST['nm_kategori']);

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
			$sql = $db->query("INSERT INTO tbl_kategori (id_kategori, nm_kategori,gambar_kategori) VALUES ('$id_kategori', '$nm_kategori','$upload_gambar')");
			header('location:index_kategori.php?code=1');
			if ($sql) {
				header('location:index_kategori.php?code=1');
			} else {
				header('location:index_kategori.php?code=7');
			}
		}
	}
} elseif ($_GET['mod'] == 'edit') {
	$gambar =  $_FILES['gambar']['name'];
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
					$sql = $db->query("UPDATE tbl_kategori SET nm_kategori='$nm_kategori', gambar_kategori='$upload_gambar'WHERE id_kategori='$id_kategori'");
					if ($sql) {
						header('location:index_kategori.php?code=2');
					} else {
						header('location:index_kategori.php?code=7');
					}
				}
			} else {
				header('location:index_kategori.php?code=5');
			}
		} else {
			header('location:index_kategori.php?code=6');
		}
	} else {
		$sql = $db->query("UPDATE tbl_kategori SET nm_kategori='$nm_kategori'WHERE id_kategori='$id_kategori'");
		if ($sql) {
			header('location:index_kategori.php?code=2');
		} else {
			header('location:index_kategori.php?code=7');
		}
	}
}

if ($_GET['mod'] == 'delete') {
	$id_kategori = $_GET['id_kategori'];
	$data = mysqli_fetch_array(mysqli_query($db, "SELECT gambar FROM tbl_kategori WHERE id_kategori='$id_kategori'"));
	if ($data['gambar'] != "") {
		$b = '../img/' . $data['gambar'];
		$hapus_gambar_lama = unlink($b);
		if ($hapus_gambar_lama) {
			$sql1 = $db->query("DELETE FROM wisata WHERE id_wisata='$id_wisata'");
			header('location:index.php?code=3');
		}
	}
	$sql = $db->query("DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori'");
	if ($sql) {
		header('location:index_kategori.php?code=3');
	}
}
