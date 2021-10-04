<?php
include "includes/config.php";
if(isset($_GET['hapus']))
{
	$kodedestinasi = $_GET["hapus"];
	mysqli_query($connection,"DELETE FROM destinasi  WHERE destinasiID='$kodedestinasi'");
	echo "<script>alert('data berhasil dihapus');
	document.location='destinasi.php'</script>";

}

?>