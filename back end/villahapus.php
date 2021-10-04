<?php 
 include "includes/config.php";
 if (isset($_GET['hapus']))
{
 $kodevilla= $_GET['hapus'];
 mysqli_query($connection, "DELETE FROM villa
   where villaID = '$kodevilla' ");


 echo "<script>alert('Data Telah Dihapus!');
 document.location='villa.php'</script> ";
}
?>