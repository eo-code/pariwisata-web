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
                        <h3 class="font-weight-bold">
                            Wisata Kabupaten Tambrauw
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home
                            </li>
                            <li class="active">
                                <i class="fa fa-list"></i> Daftar Admin
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- .row -->
                <div class="row">
                    <!-- panel . (Pelajari cara membuat panel di bootstrap yah)-->
                        <div class="panel panel-default">

                        <!-- panel heading -->
                            <div class="panel-heading">
                            <?php
                            //jika admin memiliki level Super Admin Maka dapat menambahkan data baru, namu jika bukan super admin tidak dapat menginput admin baru
                            if($admin['level_admin'] =='Super Admin'){
                             ?>
                                <a href="input_admin.php" title="Input data"><button name="input" class="btn btn-primary"><i class="fa fa-plus-square-o fa-fw"></i> Input</button></a>
                            <?php
                            }
                            ?>
                            </div>
                        <!-- /.panel heading -->

                        <!-- panel body -->
                            <div class="panel-body">

                            <!-- /.tabel responsive -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Admin</th>
                                                <th>Email</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        //jika admin memiliki level Super Admin Maka dapat mengelola semua akun dan menambahkan data baru
                                        if($admin['level_admin'] =='Super Admin'){

                                        $ambildata=mysqli_query($conect, "select*from tb_admin order by id_admin");
                                        $jumlah=mysqli_num_rows($ambildata);  /*mysql_num_rows untuk menghitung total baris di tabel databse*/
                                        if($jumlah == 0){  //jika tidak ada data
                                            ?>
                                        <tr>
                                            <td colspan="6">Tidak Terdapat Data</td>
                                        </tr>
                                        <?php
                                        }else{
                                        //jika ada data di tb_brand
                                        while($a=mysqli_fetch_array($ambildata)){ /*mysql_fetch array untuk mengambil data di setiap field di tabel databse*/
                                        ?>
                                        <tr>
                                            <td><?php echo $posisi=$posisi+1;?></td>
                                            <td><?php echo $a['nama_admin'];?></td>
                                            <td><?php echo $a['email_admin'];?></td>
                                            <td><?php echo $a['action'];?></td>
                                            <td><a href="hapus_admin.php?id_admin=<?php echo $a['id_admin'];?>" onclick="return confirm('Yakin akan meghapus data ini')" title="Hapus data"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i> Hapus</button></a>
                                            <a href="edit_admin.php?id_admin=<?php echo $a['id_admin'];?>" title="Edit data"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</button> </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        }else{
                                            //jika admin hanya level admin maka hanya dapat mengedit akunnya sendiri
                                        $ambildata=mysqli_query($conect, "select*from tb_admin where id_admin='$admin[id_admin]'");
                                        $a=mysqli_fetch_array($ambildata); /*mysql_fetch array untuk mengambil data di setiap field di tabel databse*/
                                        ?>
                                        <tr>
                                            <td><?php echo $posisi=$posisi+1;?></td>
                                            <td><?php echo $a['nama_admin'];?></td>
                                            <td><?php echo $a['email_admin'];?></td>
                                            <td><?php echo $a['action'];?></td>
                                            <td><a href="edit_admin.php?id_admin=<?php echo $a['id_admin'];?>" title="Edit data"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</button> </a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tabel responsive -->

                            </div>
                            <!-- /.panel body -->

                        </div>
                        <!-- /.panel -->

                <!-- .col lg 12 -->
                    <div class="col-lg-12">



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