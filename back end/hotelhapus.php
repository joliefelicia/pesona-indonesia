<?php
include "includes/config.php";
if(isset($_GET['hapus']))
{
	$kodehotel = $_GET["hapus"];
	mysqli_query($connection,"DELETE FROM hotel  WHERE hotelID='$kodehotel'");
	echo "<script>alert('data berhasil dihapus');
	document.location='hotel.php'</script>";

}

?>