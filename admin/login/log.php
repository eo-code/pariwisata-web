<?php
session_start();

?>
<html>
<head>

<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include('koneksi_login.php');
$username = $_POST['username'];
$password =$_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysqli_fetch_array($cek);
        $_SESSION['username'] = $c['username'];
        $_SESSION['level_user'] = $c['level_user'];
        if($c['level_user']=="ADMINISTRATOR"){
           echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
?>
<script type="text/javascript">
		alert("Selamat Datang");
</script>
<?php
        }else if($c['level_user']=="MAHASISWA"){
            echo "<meta http-equiv='refresh' content='1; url=../../mahasiswa.html'>";
?><script type="text/javascript">
		alert("Selamat Datang");
    </script>


<?php	}else if($c['level_user']=="ANGGOTA"){
            echo "<meta http-equiv='refresh' content='1; url=main menu anggota.php'>";
?><div id="loading">Anda berhasil login, Mohon tunggu sebentar<br/><br/>
<img src="images/loading.gif"/></div>


<?php
        }
    }else{
         ?><script type="text/javascript">
		alert("Password dan Username tidak Valid...!!!");
	</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    }
}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['level_user']);
    header("location:index.php");
}
?>

</body>
</html>
