<?php
	
include "include/koneksi.php";
include "include/fungsi_antiinjection.php";
include "include/fungsi_waktu.php";

$id_wisata = antiinjection($_POST['id_wisata']);
$nama_wisata = antiinjection($_POST['nama_wisata']);
$alamat = antiinjection($_POST['alamat']);
$kategori = antiinjection($_POST['kategori']);
$deskripsi = antiinjection($_POST['deskripsi']);
$gambar = antiinjection($_POST['gambar']);
 
if ($_GET['mod']=='tambah') {
	$sql = $db->query("INSERT INTO wisata (id_wisata, nama_wisata, alamat, deskripsi, kategori, gambar) VALUES ('$id_wisata','$nama_wisata', '$alamat', '$deskripsi', '$kategori', '$gambar') ");
			header('location:index.php?code=1');
}

else if ($_GET['mod']=='edit') {
	$sql = $db->query("UPDATE wisata SET nama_wisata='$nama_wisata', alamat='$alamat', deskripsi='$deskripsi',kategori='$kategori' ,gambar='$gambar' WHERE id_wisata='$id_wisata'");
	header('location:index.php?code=2');
}

if($_GET['mod']=='delete') {
		$id_wisata = $_GET['id_wisata'];
		$sql1 = $db->query("DELETE FROM wisata WHERE id_wisata='$id_wisata'");
		header('location:index.php?code=3');
}

?>