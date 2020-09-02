<div class="container-fluid">
	<?php
	include "include/koneksi.php";

	switch (@$_GET['mod']) {
		default: ?>

			<div id_wisata="tombol" style="margin-bottom:15px;">
				<p><a href='?mod=add'><button type='button' class='btn btn-primary'><span class='glyphicon glyphicon-plus-sign'></span> Add</button></a></p>
			</div>

			<div class="row">
				<div class="col-md-12">

					<?php include "include/alert.php"; ?>

					<table id="example1" class="table table-striped">
						<thead>
							<tr>
								<th style="width:3%">No.</th>
								<th>Id_wisata</th>
								<th>Nama_wisata</th>
								<th>Alamat</th>
								<th>Deskripsi</th>
								<th>Gambar</th>
								<th>Kategori</th>
								<th>Gambar</th>
								<th class="text-center" style="width:10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$sql = $db->query("SELECT * FROM wisata");
							while ($data = $sql->fetch_array()) {
								echo " 
			              <tr>
			                <td>$no</td>
                            <td>$data[id_wisata]</td>
                            <td>$data[nama_wisata]</td>
                            <td>$data[alamat]</td>
                            <td>$data[deskripsi]</td>
                            <td>$data[gambar]</td>
                            <td>$data[kategori]</td>
                            <td>
															<img src=../gambar/$data[gambar];width=300>
														</td>
			                
			                <td><a href='?mod=edit&id_wisata=$data[id_wisata]'><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span></button></a> "; ?>

								<a href='aksi.php?mod=delete&id_wisata=<?php echo $data['id_wisata']; ?>' onClick="return confirm('Yakin akan menghapus Data?')"><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'></button></a></td>
								</tr>
							<?php $no++;
							} ?>
						</tbody>
					</table>
				</div>
			<?php
			break;


		case 'add': ?>
				<form method='POST' action='aksi.php?mod=tambah' class='form-horizontal'>
					<h4>Tambah Data Wisata</h4>
					<hr><br>

					<div class="form-group">
						<label class="col-sm-2 control-label">Id_wisata</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='id_wisata' class="form-control" placeholder="Masukan id_wisata">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Nama_wisata</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='nama_wisata' class="form-control" placeholder="Nama lengkap">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='alamat' class="form-control" placeholder="Alamat lengkap">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Deskripsi</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='deskripsi' class="form-control" placeholder="Isi deskripsi">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Gambar</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='gambar' class="form-control" placeholder="Gambar">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kategori</label>
						<div class="col-sm-4">
							<select class="form-control select2" style="width: 100%;" name="kategori">
								<option selected="selected">--Pilih Kategori--</option>
								<?php
								$queryKategori = $db->query("SELECT * FROM tbl_kategori");

								foreach ($queryKategori as $data) :
								?>
									<option value="<?= $data['nm_kategori']; ?>"><?= $data['nm_kategori']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Tambah Data?')">Tambah</button>
						</div>
					</div>
				</form>
			<?php
			break;

		case 'edit':
			$sql = $db->query("SELECT * FROM wisata WHERE id_wisata='$_GET[id_wisata]' ");
			$data = $sql->fetch_array();

			?>
				<form method='POST' action='aksi.php?mod=edit' class='form-horizontal'>
					<h4>Edit Data Wisata</h4>
					<hr><br>

					<div class="form-group">
						<label class="col-sm-2 control-label">Id_wisata</label>
						<div class="col-sm-4">
							<input type="text" required="required" readonly="true" name='id_wisata' class="form-control" value="<?php echo $data['id_wisata']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Nama_wisata</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='nama_wisata' class="form-control" value="<?php echo $data['nama_wisata']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='alamat' class="form-control" value="<?php echo $data['alamat']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Deskripsi</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='deskripsi' class="form-control" value="<?php echo $data['deskripsi']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Gambar</label>
						<div class="col-sm-4">
							<input type="text" required="required" name='gambar' class="form-control" value="<?php echo $data['gambar']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Kategori</label>
						<div class="col-sm-4">
							<input type="option" required="required" name='kategori' class="form-control" value="<?php echo $data['kategori']; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Edit Data?')">Save</button>
							<button type='reset' name='reset' class='btn btn-primary'>Reset</button>
						</div>
					</div>
				</form>
		<?php

			break;
	} ?>

			</div>
</div>