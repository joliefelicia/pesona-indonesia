<?php
include "includes/config.php";
if(isset($_GET['hapus']))
{
	$kodeadmin= $_GET['hapus'];
	mysqli_query($connection,"DELETE FROM admin  WHERE adminID = '$kodeadmin' ");
	echo "<script>alert('data berhasil dihapus');
	document.location='registrasi.php'</script>";

}

?>