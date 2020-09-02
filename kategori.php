<?php
  include './admin/include/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Wisata Kab. Tambrauw</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/images/logo/logo.png">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-expand-lg bg-warning fixed-top">
    <div class="container">
      <a class="navbar-brand custom_navbar-brand font-weight-bold ">Wisata Kab. Tambrauw</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="kategori.php">Kategori<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="galeri.php">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontak.php">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/login/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <!-- Jumbotron Header -->
  <div class="jumbotron" style="background: url('img/gambar1.jpg')no-repeat;background-size: cover;">
    <div class="shape"></div>
    <div class="container d-flex justify-content-center flex-column h-100">
      <h1 class="display-5 font-weight-bold">Wisata Kabupaten Tambrauw</h1>
      <p class="lead font-weight-bold">Selamat Datang di website Wisata Kabupaten Tambrauw </p>
    </div>
  </div>
  <!-- batas jumbotron header -->

  <div class="kategori pb-5">
    <div class="container">
      
      <?php if(!isset($_GET['k'])):?>
      <h2>Kategori</h2>
      <div class="wrap-kategori row mt-5">
        <!-- <div class="col-md-3">
          <div class="card-p">
            <div class="img">
              <div class="shape-shadow"></div>
              <img src="img/download.jpg" alt="">
            </div>
            <div class="detail">
              <h5>Title Here</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-p">
            <div class="img">
              <div class="shape-shadow"></div>
              <img src="img/download.jpg" alt="">
            </div>
            <div class="detail">
              <h5>Title Here</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-p">
            <div class="img">
              <div class="shape-shadow"></div>
              <img src="img/download.jpg" alt="">
            </div>
            <div class="detail">
              <h5>Title Here</h5>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-p">
            <div class="img">
              <div class="shape-shadow"></div>
              <img src="img/download.jpg" alt="">
            </div>
            <div class="detail">
              <h5>Title Here</h5>
            </div>
          </div>
        </div> -->
        <?php 
          $queryKategori = $db->query("SELECT * FROM tbl_kategori");

          foreach($queryKategori as $kategori):
        ?>
        <div class="col-md-4">
          <a href="kategori.php?k=<?= $kategori['nm_kategori'];?>">
            <div class="card-k">
              <div class="img">
                <img src="./img/download.jpg" alt="">
                <div class="shadow"></div>
                <h3><?= $kategori['nm_kategori'];?></h3>
              </div>
            </div>
          </a>
        </div>
        <?php endforeach;?>
      </div>
      <?php endif;?>
      
      <?php if(isset($_GET['k'])):?>
        <h2><?= $_GET['k'];?></h2>
        <div class="wrap-kategori row mt-5">
        <?php
          $kategori = $_GET['k'];
          $queryProdukKategori = $db->query("SELECT * FROM wisata WHERE kategori='$kategori'");
          if(mysqli_num_rows($queryProdukKategori) >= 1):
            foreach($queryProdukKategori as $produk):
        ?>
            <div class="col-md-3">
              <div class="card-p">
                <div class="img">
                  <div class="shape-shadow"></div>
                  <img src="img/download.jpg" alt="">
                </div>
                <div class="detail">
                  <h5><?= $produk['nama_wisata'];?></h5>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        <?php endif;?>
        <?php if(mysqli_num_rows($queryProdukKategori) < 1) :?>
          <div class="d-flex justify-content-center align-items-center w-100 mt-5 pb-5 flex-column">
            <h4>Tidak ada produk untuk kategori <?= $_GET['k'];?></h4>
            <a href="kategori.php" class="btn bg-warning mt-5" style="color: #ffffff; width: 120px; height: 40px;">
              Kembali
            </a>
          </div>
        <?php endif;?>
        </div>
      <?php endif;?>
    </div>
  </div>


  <!-- Footer -->
  <footer class="py-3 bg-light">
    <div class="container">
      <p class="text-center font-weight-bold">Copyright &copy;WisatKabTamb</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>