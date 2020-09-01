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
                                <i class="fa fa-list"></i> Kelola Data Kontak
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- .row -->
                <div class="row">

                <!-- .col lg 12 -->
                    <div class="col-lg-12">

                    <!-- panel . (Pelajari cara membuat panel di bootstrap yah)-->
                        <div class="panel panel-default">

                        <!-- panel heading -->
                            <div class="panel-heading">
                                <a href="input_kontak.php" title="Input data"><button name="input" class="btn btn-primary"><i class="fa fa-plus-square-o fa-fw"></i> Input</button></a>
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
                                                <th>Nama Pengelola</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
                                        $batas = 10; /*batas tampilan setiap halaman*/
                                        if ( empty( $pg ) ) {
                                        $posisi = 0;
                                        $pg = 1;
                                        } else {
                                        $posisi = ( $pg - 1 ) * $batas;
                                        }
                                        /*Jika variabel $pg kosong maka akan menampilkan halaman pertama dengan batas baris 10*/

                                        $ambildata=mysqli_query($conect, "select*from tb_kontak order by id_fasilitas desc limit $posisi, $batas");
                                        $jumlah=mysqli_num_rows($ambildata);  /*mysql_num_rows untuk menghitung total baris di tabel database*/
                                        if($jumlah == 0){  //jika tidak ada data
                                            ?>
                                        <tr>
                                            <td colspan="6">Tidak Terdapat Data</td>
                                        </tr>
                                        <?php
                                        }else{
                                        //jika ada data di tb_fasilitas
                                        while($a=mysqli_fetch_array($ambildata)){ /*mysql_fetch array untuk mengambil data di setiap field di tabel databse*/
                                        ?>
                                        <tr>
                                            <td><?php echo $posisi=$posisi+1;?></td>
                                            <td><?php echo $a['nama_pengelola'];?></td>
                                            <td><?php echo $a['alamat'];?></td>
                                            <td><?php echo $a['no_telp'];?></td>
                                            <td><a href="hapus_kontak.php?id_kontak=<?php echo $a['id_kontak'];?>" onclick="return confirm('Yakin akan menghapus data ini')" title="Hapus data"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i> Hapus</button></a>
                                            <a href="edit_kontak.php?id_kontak=<?php echo $a['id_kontak'];?>" title="Edit data"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</button> </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tabel responsive -->

                                <div class="text-center">
                                    <?php
                                //script paging, untuk menampikan setiap halaman
                                $jml_data = mysqli_num_rows(mysqli_query($conect, "select*from tb_kontak order by id_kontak desc"));
                                $JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
                                if($jml_data != 0){
                                if ( $pg > 1 ) {
                                $link = $pg-1;
                                $prev = "<a href='?pg=$link'><button name='prev' class='btn btn-primary btn-sm'>Prev</button></a> ";
                                } else {
                                $prev = "<button name='prev' class='btn btn-default btn-sm'>Prev </button> ";
                                }
                                $nmr = '';
                                for ( $i = 1; $i<= $JmlHalaman; $i++ ){

                                if ( $i == $pg ) {
                                $nmr .= "<button name='prev' class='btn btn-primary btn-sm'>$i</button> ";
                                } else {
                                $nmr .= "<a href='?pg=$i'><button name='prev' class='btn btn-default btn-sm'>$i</button></a> ";
                                }
                                }
                                if ( $pg < $JmlHalaman ) {
                                $link = $pg + 1;
                                $next = "<a href='?pg=$link'><button name='prev' class='btn btn-primary btn-sm'>Next</button></a> ";
                                } else {
                                $next = "<button name='prev' class='btn btn-default btn-sm'>Next</button> ";
                                }
                                echo $prev.$nmr.$next;
                                ?>
                                <br><br>
                                <span class="text-muted">Menampilkan <?php echo $jumlah; ?> dari <?php echo $jml_data; ?> Record </span>
                                <?php
                                }
                                ?>
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