<?php
include "includes/config.php";
if(isset($_GET['hapus']))
{
	$kodekategori = $_GET["hapus"];
	mysqli_query($connection,"DELETE FROM kategori  WHERE kategoriID='$kodekategori'");
	echo "<script>alert('data berhasil dihapus');
	document.location='kategori.php'</script>";

}

?>