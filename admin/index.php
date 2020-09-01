<?php include "include/header.php" ; ?>

 <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Admin
          <small>Kelola Data</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Admin</li>
        </ol>
      </section>

      <!-- Main content --------------------------------------------------->
      <section class="content">
        <div class="panel panel-primary">
              <div class="panel-heading">
                  <i class="glyphicon glyphicon-star"></i> Daftar Tempat Wisata
			  </div>
              
              <div class="panel-body">
                <?php include "pengunjung.php" ; ?>
              </div>    
        </div>       
        <!-- /.panel -->
      </section>
      <!-- /.content ---------------------------------------------------->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
    
 <?php include "include/footer.php" ; ?>