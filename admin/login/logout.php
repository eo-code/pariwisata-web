<?php session_start();
session_destroy();
?><script type="text/javascript">
	alert("Anda telah Berhasil Logout");
</script>
<?php
echo "<meta http-equiv='refresh' content='0; url=../../index.php'>";
?>