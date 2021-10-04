<?php 
 include "includes/config.php";
 if (isset($_GET['hapus']))
{
 $koderestoran= $_GET['hapus'];
 mysqli_query($connection, "DELETE FROM restoran
   where restoranID = '$koderestoran' ");


 echo "<script>alert('Data Telah Dihapus!');
 document.location='restoran.php'</script> ";
}
?>