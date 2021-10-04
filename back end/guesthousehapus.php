<?php 
 include "includes/config.php";
 if (isset($_GET['hapus']))
{
 $kodehouse= $_GET['hapus'];
 mysqli_query($connection, "DELETE FROM guesthouse where guesthouseID='$kodehouse'");


 echo "<script>alert('Data Telah Dihapus!');
 document.location='guesthouse.php'</script> ";
}
?>