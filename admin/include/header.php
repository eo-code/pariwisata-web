<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/dist/css/skins/_all-skins.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/dist/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bootstrap/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="bootstrap/dist/css/custom.css">

  

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition layout-top-nav bg-default">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><b>Panel</b> Admin</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="index_kategori.php"><i class="fa  fa-calendar-o"></i> Kategori <span class="sr-only">(current)</span></a></li>
               <li class="active"><a href="index.php"><i class="fa  fa-calendar-o"></i> Tempat Wisata <span class="sr-only">(current)</span></a></li>
             <li class="active"><a href="index_galeri.php"><i class="fa  fa-calendar-o"></i>Galeri <span class="sr-only">(current)</span></a></li> 
           </ul>
         
        </div>
        <!-- /.navbar-collapse -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login/logout.php"><span class="fa fa-lock"></span> Logout</a></li>
        </ul>
    </div>
    <!-- /.navbar-container -->
     
    </nav>
  </header>