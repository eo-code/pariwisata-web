<?php
	
	include "include/koneksi.php";
	include "include/fungsi_antiinjection.php";
	include "include/fungsi_waktu.php";

	$id_kategori = antiinjection($_POST['id_kategori']);
    $nm_kategori = antiinjection($_POST['nm_kategori']);
	
	if ($_GET['mod']=='tambah') {
		$sql = $db->query("INSERT INTO tbl_kategori (id_kategori, nm_kategori) VALUES ('$id_kategori','$nm_kategori'");
        header('location:index_kategori.php?code=1');
	}

	elseif ($_GET['mod']=='edit') {
		$sql = $db->query("UPDATE tbl_kategori SET id_kategori='$id_kategori', nm_kategori='$nm_kategori'WHERE id_kategori='$id_kategori'");
		header('location:index_kategori.php?code=2');
	}

	   $id_kategori = $_GET['id_kategori'];
	if($_GET['mod']=='delete') {
			$sql1 = $db->query("DELETE FROM tbl_kategori WHERE id_kategori='$id_kategori' ");
			header('location:index_kategori.php?code=3');
	}

?>