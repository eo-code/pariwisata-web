<?php
	
	include "include/koneksi.php";
	include "include/fungsi_antiinjection.php";
	include "include/fungsi_waktu.php";

	$id_wisata = antiinjection($_POST['id_wisata']);
    $nama_wisata = antiinjection($_POST['nama_wisata']);
	$alamat = antiinjection($_POST['alamat']);
	$deskripsi = antiinjection($_POST['deskripsi']);
    $gambar = antiinjection($_POST['gambar']);
 
	if ($_GET['mod']=='tambah') {
		$sql = $db->query("INSERT INTO wisata (id_wisata, nama_wisata, alamat, deskripsi, gambar) VALUES ('$id_wisata','$nama_wisata', '$alamat', '$deskripsi','$gambar') ");
        header('location:index.php?code=1');
	}

	elseif ($_GET['mod']=='edit') {
		$sql = $db->query("UPDATE wisata SET id_wisata='$id_wisata', nama_wisata='$nama_wisata', alamat='$alamat', deskripsi='$deskripsi', gambar='gambar' WHERE id_wisata='$id_wisata' ");
		header('location:index.php?code=2');
	}

	   $id_wisata = $_GET['id_wisata'];
	if($_GET['mod']=='delete') {
			$sql1 = $db->query("DELETE FROM wisata WHERE id_wisata='$id_wisata' ");
			header('location:index.php?code=3');
	}

?>