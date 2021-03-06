<?php include './admin/include/koneksi.php'; ?>
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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
            <li><a href="#">Regular link</a></li>
            <li class="disabled"><a href="#">Disabled link</a></li>
            <li><a href="#">Another link</a></li>
          </ul>
          <li class="nav-item active">
            <a class="nav-link" href="kategori.php">Kategori<span class="sr-only">(current)</span></a>
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
  <div class="jumbotron" style="background: url('img/killian-pham-Sq8rpq2KB7U-unsplash.jpg')no-repeat;background-size: cover;">
    <div class="shape"></div>
    <div class="container d-flex justify-content-center flex-column h-100">
      <h1 class="display-5 font-weight-bold">Wisata Kabupaten Tambrauw</h1>
      <p class="lead font-weight-bold">Selamat Datang di website Wisata Kabupaten Tambrauw </p>
    </div>
  </div>
  <!-- batas jumbotron header -->

  <div class="container">
    <!-- <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="img/images-pulau-dua.jpg" alt="">
          <div class="caption">
            <h3>Pulau Dua</h3>
          </div>
        </div>
      </div>


      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="img/images-pantai-jeen-wowom.jpg" alt="...">
          <div class="caption">
            <h3>Pantai Jeen Wowon</h3>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="img/image-peninggala-PD-II.jpg" alt="...">
          <div class="caption">
            <h3>Peninggalan PD II</h3>
          </div>
        </div>
      </div>
    </div> -->

    <h2>Galeri</h2>

    <div class="row-img d-flex flex-wrap w-100 mt-5 pb-5">
      <!-- <div class="column">
        <div class="img">
          <div class="shadow d-flex justify-content-center align-items-center">
            <h4>Title Here</h4>
          </div>
          <img src="img/images-pantai-jeen-wowom.jpg" alt="...">
        </div>
        <div class="img">
          <div class="shadow d-flex justify-content-center align-items-center">
            <h4>Title Here</h4>
          </div>
          <img src="img/images-pulau-dua.jpg" alt="...">
        </div>

        <img src="img/image-peninggala-PD-II.jpg" alt="...">
        <img src="img/images-pulau-dua.jpg" alt="">
      </div>
      <div class="column">
        <img src="img/images-pantai-jeen-wowom.jpg" alt="...">
        <img src="img/images-pulau-dua.jpg" alt="">
        <div class="img">
          <div class="shadow d-flex justify-content-center align-items-center">
            <h4>Title Here</h4>
          </div>
          <img src="img/image-peninggala-PD-II.jpg" alt="...">
        </div>
      </div>
      <div class="column">
        <img src="img/image-peninggala-PD-II.jpg" alt="...">
        <img src="img/images-pantai-jeen-wowom.jpg" alt="...">
        <img src="img/image-peninggala-PD-II.jpg" alt="...">
      </div> -->
      <?php
      $queryGaleri = $db->query("SELECT * FROM tb_galeri");

      foreach ($queryGaleri as $galeri) :
      ?>
        <div class="column">
          <div class="img">
            <div class="shadow d-flex justify-content-center align-items-center">
              <h4><?= $galeri['judul_gambar']; ?></h4>
            </div>
            <img src="img/<?= $galeri['nama_gambar']; ?>" alt="...">
          </div>
        </div>
      <?php endforeach; ?>
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