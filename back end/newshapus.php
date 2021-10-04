<?php
include "includes/config.php";
if(isset($_GET['hapusnews']))
{
	$kodeberita= $_GET["hapusnews"];
	$hapusberita=mysqli_query($connection, "SELECT * FROM news WHERE idnews='$kodeberita'");
	$hapus=mysqli_fetch_array($hapusberita);
	$namafile=$hapus['foto'];
	mysqli_query($connection,"DELETE FROM news  WHERE idnews='$kodeberita'");
    	echo "<script>alert('data berhasil dihapus');
	document.location='news.php'</script>";

}

?>