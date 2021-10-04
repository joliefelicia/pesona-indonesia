<?php
include "includes/config.php";
if(isset($_GET['hapusfoto']))
{
	$kodefoto= $_GET["hapusfoto"];
	$hapusfoto=mysqli_query($connection, "SELECT * FROM fotodestinasi WHERE fotoID='$kodefoto'");
	$hapus=mysqli_fetch_array($hapusfoto);
	$namafile=$hapus['fotofile'];
	mysqli_query($connection,"DELETE FROM fotodestinasi  WHERE fotoID='$kodefoto'");
	unlink('images/'.$namafile);
	echo "<script>alert('data berhasil dihapus');
	document.location='fotodestinasi.php'</script>";

}

?>