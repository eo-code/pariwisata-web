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
                                <i class="fa fa-list"></i> Profil Wisata Kabupaten Tambrauw
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <!-- .row -->
                <div class="row">

                <!-- .col lg 12 -->
                    <div class="col-lg-12">
                    
                    <?php
                //ambil data berdasarkan id
                $tampildata=mysqli_query($conect, "select*from tbl_wisata where id_wisata='1'");
                $b=mysqli_fetch_array($tampildata);

                //variabel setiap input di form

                $lama=$_POST['foto_lama'];  //variabel foto lama
                $nama=mysqli_real_escape_string($conect, $_POST['nama']);  //variabel dari name input nama
                $deskripsi=mysqli_real_escape_string($conect, $_POST['deskripsi']);     //variabel dari name input deskripsi
                $alamat=mysqli_real_escape_string($conect, $_POST['alamat']);
                $telp=mysqli_real_escape_string($conect, $_POST['telp']);

                $foto=$_FILES['foto']['tmp_name'];               //variabel dari temporary foto
                $nama_foto=$_FILES ['foto']['name'];             //variabel dari name input foto
                $type=$_FILES['foto']['type'];                   //variabel dari type foto
                $ukuran=$_FILES['foto']['size'];                 //variabel dari ukuran foto
                $files= strtolower(substr(strrchr($nama_foto,"."),1)); //variabel untuk extensi file

                //jika menekan tombol simpan
                if(isset($_POST['simpan'])){
                if(empty($nama)){  //jika field nama kosong
                $er_nama="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Masukan Nama Wisata !</div>";
                }
                elseif(empty($deskripsi)){ //jika field deskripsi kosong
                $er_deskripsi="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Deskripsikan Tempat Wisata Secara Lengkap !</div>";
                }
                elseif(empty($alamat)){ //jika field alamat kosong
                $er_alamat="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Masukan Alamat Tempat Wisata !</div>";
                }
                elseif(empty($telp)){ //jika field telp kosong
                $er_telp="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Masukan Nomor Telp Tempat Wisata !</div>";
                }
                else{
                if(empty($foto)){  //jika foto tidak diubah maka
                $save=mysqli_query($conect, "UPDATE tbl_wisata set nama_bisnis='$nama', deskripsi='$deskripsi', alamat_bisnis='$alamat', telp_bisnis='$telp' where id_wisata='1'");
                if($save){   //save
                echo " <script>alert('Data Berhasil Diubah');document.location='wisata.php'</script>";
                }
                else{    //gagal
                $error="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Error</div>";
                }
                }
                else{ //jika foto ikut diubah maka
                if($files !="jpg" && $files !="png"){ //jika foto tidak berekstensi .jpg atau .png
                $er_foto="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Format Gambar yang diizinkan hanya .jpg dan .png</div>";
                }
                elseif($ukuran > 2000000){   //jika ukuran lebih besar dari 2MB
                $er_foto="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Maksimal ukuran gambar 2MB </div>";
                }
                elseif(strlen($nama_foto) > 100){  //jika jumlah karakter nama foto lebih dari 100 karakter
                $er_foto="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Nama File Gambar Mak 100 karakter</div>";
                }
                else{ //jika semua field terpenuhi maka simpan gambar ke folder dan simpan data ke tabel

                unlink('../assets/images/logo/'.$lama); //hapus foto lama di folder
                move_uploaded_file($foto,"../assets/images/logo/$nama_foto");  //upload foto baru
                //simpan ke tabel database
                $save=mysqli_query($conect, "UPDATE tb_wisata set logo='$nama_foto', nama_bisnis='$nama', deskripsi='$deskripsi', alamat_bisnis='$alamat', telp_bisnis='$telp' where id_wisata='1'");
                if($save){   //save
                echo " <script>alert('Data Berhasil Diubah');document.location='wisata.php'</script>";
                }
                else{  //jika simpan gagal
                $error="<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <i class='fa fa-info-circle'></i> Error</div>";
                }
                }
                }

                }
                }
                ?>

                    <!-- panel . (Pelajari cara membuat panel di bootstrap yah)-->
                        <div class="panel panel-default">

                        <!-- panel heading -->
                            <div class="panel-heading">
                                Profil Wisata Kabupaten Tambrauw
                            </div>
                        <!-- /.panel heading -->

                        <!-- panel body -->
                            <div class="panel-body">

                            <!-- col sm 4 -->
                            <div class="col-sm-7">
                            <!-- /.form menggunakan form group, pelajari cara membuat form di bootstrap-->

                            <form action="" method="post" enctype="multipart/form-data" role="form">
                            <?php echo $error;?>
                            <div class="form-group">
                                <label>Nama Tempat Wisata</label>
                                <input type="text" class="form-control" placeholder="Isi nama tempat wisata" name="nama" value="<?php echo $b['nama_wisata'];?>" maxlength="50">
                            </div>
                            <?php echo $er_nama;?>
                            <div class="form-group">
                            <label for="exampleTextarea">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="exampleTextarea" rows="6" placeholder="Isi deskripsi"><?php echo $b['deskripsi'];?></textarea>
                            </div>
                            <?php echo $er_deskripsi;?>
                            <div class="form-group">
                            <label for="exampleTextarea">Alamat </label>
                            <textarea name="alamat" class="form-control" id="exampleTextarea" rows="3" placeholder="Isikan alamat"><?php echo $b['alamat_wisata'];?></textarea>
                            </div>
                            <?php echo $er_alamat;?>
                            <div class="form-group">
                                <label>No Telp / Hp</label>
                                <input type="text" class="form-control" placeholder="No Telp / Hp" name="telp" value="<?php echo $b['telp_wisata'];?>" maxlength="50">
                            </div>
                            <?php echo $er_telp;?>
                             <div class="form-group">
                            <label>Logo </label>
                            <input type="file" name="foto" class="form-control-file" accept=".jpg, .png">
                            <small id="fileHelp" class="form-text text-muted">Logo Perusahaan akan muncul di header website</small>
                            </div>
                            <?php echo $er_foto;?>
                            <input type="hidden" name="foto_lama" value="<?php echo $b['logo'];?>">
                            <button type="submit" name="simpan" class="btn btn-success">Simpan Perubahan</button>
                            </form>
                                <!-- /.form -->
                            </div>
                                <!-- /.col sm 7 -->
                                <div class="col-sm-3">
                            <img src="../assets/images/logo/<?php echo $b['logo'];?>" class="img-thumbnail" aria-describedby="helpBlock2" style="max-width:300px; max-height:300px;">
                            <span id="helpBlock2" class="help-block">Logo</span>
                            </div>
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