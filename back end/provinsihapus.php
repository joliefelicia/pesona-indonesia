<?php 
 include "includes/config.php";
 if (isset($_GET['hapus']))
{
 $kodeprovinsi= $_GET['hapus'];
 mysqli_query($connection, "DELETE FROM provinsi
   where provinsiID = '$kodeprovinsi' ");


 echo "<script>alert('Data Telah Dihapus!');
 document.location='provinsi.php'</script> ";
}
?>