<?php
if (@$_GET['code'] == '1') { ?>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Berhasil!</strong> Data berhasil di TAMBAH.
	</div>
<?php
}
if (@$_GET['code'] == '2') { ?>
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Berhasil!</strong> Data berhasil di EDIT.
	</div>
<?php
}
if (@$_GET['code'] == '3') { ?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Berhasil!</strong> Data berhasil di DELETE.
	</div>
<?php
}
if (@$_GET['code'] == '4') { ?>
	<div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> Ada error, harap ulangi perintah.
	</div>
<?php
}
if (@$_GET['code'] == '5') { ?>
	<div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> Ukuran file lebih dari 1 mb
	</div>
<?php
}
if (@$_GET['code'] == '6') { ?>
	<div class="alert alert-warning">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> File harus berformat PNG, JPG atau JPEG
	</div>
<?php
}
if (@$_GET['code'] == '7') { ?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> Gagal menambah data, Silahkan coba lagi
	</div>
<?php
}
if (@$_GET['code'] == '8') { ?>
	<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Error!</strong> Gagal mengedit data, Silahkan coba lagi
	</div>
<?php
}

?>