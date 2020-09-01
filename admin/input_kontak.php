<?php
//pemanggilan file metatag
include "setting_metatag.php";

//pemanggilan file navbar
include "setting_navbar.php";
?>

        <div id="page-wrapper">

            <div class="container">
                <!-- .row -->
                <!-- Page Heading  breadcumb-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="font-weight-bolg">
                            Wisata Kabupaten Tambrauw
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Informasi Kontak
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <?php
                //variabel setiap input di form
                $nama=mysqli_real_escape_string($conect, $_POST['nama_pengelola']);  //variabel dari name input nama
                $keterangan=mysqli_real_escape_string($conect, $_POST['alamat']);     //variabel dari name input alamat
                 $keterangan=mysqli_real_escape_string($conect, $_POST['no_telp']);     //variabel dari name input nomor telpon


                //jika menekan tombol simpan
                if(isset($_POST['simpan'])){
                if(empty($nama_pengelola)){  //jika field nama kosong
                $er_nama_pengelola="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Masukan nama pengelola </div>";
                }
                elseif(empty($alamat)){ //jika field alamat kosong
                $er_alamat="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Masukan Keterangan Foto</div>";
                }
                elseif(empty($no_telp)){  //jika nomor telpon kosong
                $er_no_telp="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Masukan nomor telpon</div>";
                }
                // untuk menyimpan data ke dalam atbel kontak
                $save=mysqli_query($conect, "INSERT INTO tb_kontak (id_kontak,nama_pengelola, alamat, no_telp,)values('','$nama_pengelola','$alamat','$no_telp')");
                if($save){ //jika simpan berhasil
                echo "<script>alert('Data Berhasil Ditambahkan');document.location='kontak.php'</script>";
                }
                else{  //jika simpan gagal
                $error="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Error</div>";
                }

                }
                ?>
                <!-- .row -->
                <div class="row">

                <!-- .col lg 12 -->
                    <div class="col-lg-12">

                    <!-- panel . (Pelajari cara membuat panel di bootstrap yah)-->
                        <div class="panel panel-default">

                        <!-- panel heading -->
                            <div class="panel-heading">
                                <a href="kontak.php" title="Input data"><button name="input" class="btn btn-primary">Kembali</button></a>
                            </div>
                        <!-- /.panel heading -->

                        <!-- panel body -->
                            <div class="panel-body">

                            <!-- col sm 4 -->
                            <div class="col-sm-4">
                            <!-- /.form menggunakan form group, pelajari cara membuat form di bootstrap-->

                            <form action="" method="post" enctype="multipart/form-data" role="form">
                            <?php echo $error;?>
                            <div class="form-group">
                                <label>Nama Pengelola</label>
                                <input type="text" class="form-control" placeholder="nama pengelola" name="nama_pengelola" value="<?php echo $_POST['nama_pengelola'];?>" maxlength="50" autocomplete="off" autofocus>
                            </div>
                            <?php echo $er_nama_pengelola;?>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo $_POST['alamat'];?></textarea>
                            </div>
                            <?php echo $er_alamat;?>
                            <div class="form-group">
                                <label>Nomor Telpon</label>
                                <input type="text" class="form-control" placeholder="nomor telpon" name="no_telp" value="<?php echo $_POST['no_telp'];?>" maxlength="50" autocomplete="off" autofocus>
                            </div>
                            <?php echo $er_no_telp;?>

                            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>

                            </form>
                                <!-- /.form -->
                            </div>
                                <!-- /.col sm 4 -->
                            </div>
                            <!-- /.panel body -->

                        </div>
                        <!-- /.panel -->

                    </div>
                    <!-- /.col lg 12-->

                </div>
                <!-- /.row -->


           </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php
//pemanggilan file setting footer
include "setting_footer.php";

?>