<?php 
 include "includes/config.php";
 if (isset($_GET['hapus']))
{
 $kodearea= $_GET['hapus'];
 mysqli_query($connection, "DELETE FROM area
   where areaID = '$kodearea' ");


 echo "<script>alert('Data Telah Dihapus!');
 document.location='area.php'</script> ";
}
?>