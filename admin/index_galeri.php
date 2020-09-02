<?php include 'include/header.php'; ?>
<?php include 'include/alert.php'; ?>
<div class="content-wrapper">
    <div class="container">
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
        <!-- main content -->
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="glyphicon glyphicon-star"></i> Daftar Geleri
                </div>
                <!-- content -->
                <div class="panel-body">
                    <?php include 'galeri.php' ?>

                </div>
            </div>

        </section>

    </div>
</div>
<?php include 'include/footer.php'; ?>