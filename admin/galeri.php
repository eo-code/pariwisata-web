<?php include 'include/koneksi.php';
switch (@$_GET['mod']) {
    default:
?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Daftar Gambar</h2>
                    <a href="index_galeri.php?mod=add" class="btn btn-primary mt-3">Tambah Gambar</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;
                            include 'include/koneksi.php';
                            $data = $db->query('SELECT * FROM tb_galeri');
                            foreach ($data as $d) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="../img/<?= $d['nama_gambar']; ?>" alt="" width="100" height="100"></td>
                                    <td><?= $d['judul_gambar']; ?></td>
                                    <td><a href="index_galeri.php?mod=edit&id=<?= $d['id_gambar']; ?>" class="btn btn-success">Edit</a>
                                        <a href="aksi_galeri.php?mod=delete&id=<?= $d['id_gambar']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php break;
    case 'add':
    ?>
        <form method='POST' action='aksi_galeri.php?mod=tambah' class='form-horizontal' enctype="multipart/form-data">
            <h4>Tambah Data Gambar</h4>
            <hr><br>

            <div class="form-group">
                <label class="col-sm-2 control-label">Judul Gambar</label>
                <div class="col-sm-4">
                    <input type="text" required="required" name='judul' class="form-control" placeholder="Masukan Judul gambar">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-4">
                    <input type="file" required="required" name='foto' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Tambah Data?')">Tambah</button>
                </div>
            </div>
        <?php break;
    case 'edit':
        ?>
            <form method='POST' action='aksi_galeri.php?mod=edit' class='form-horizontal' enctype="multipart/form-data">
                <h4>Edit Data Gambar</h4>
                <hr><br>
                <?php
                $id = $_GET['id'];
                $query = $db->query("SELECT * FROM tb_galeri WHERE id_gambar ='$id' ");
                $d = mysqli_fetch_array($query);
                ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Judul Gambar</label>
                    <div class="col-sm-4">
                        <input type="text" required="required" name='judul' class="form-control" placeholder="Masukan Judul gambar" value="<?= $d['judul_gambar']; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Gambar</label>
                    <div class="col-sm-4">
                        <input type="hidden" name="a" value="<?= $d['nama_gambar']; ?>">
                        <input type="file" name='foto' class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button type='submit' name='submit' class='btn btn-primary' onClick="return confirm('Yakin akan Edit Data?')">Edit</button>
                    </div>
                </div>
                <?php break; ?>
        <?php } ?>