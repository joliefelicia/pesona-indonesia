<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
 <?php
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
    header("location:login.php");
 


     include "header.php";?>
<div class="container-fluid">
<div class="card shadow mb-4">

<?php 
include "includes/config.php";
if(isset($_POST['Batal'])){
  header("location:kategori.php");
}

if(isset($_POST['Ubah'])){

$IDKategori=$_POST['inputidkategori'];
$namakategori=$_POST['inputnamakategori'];
$ketkategori=$_POST['inputketkategori'];
$refkategori=$_POST['inputrefkategori'];


mysqli_query($connection,"update kategori set kategorinama='$namakategori', kategoriketerangan='$ketkategori', kategorireferensi='$refkategori' where kategoriID='$IDKategori'");
header("location:kategori.php");
}

//untuk menampilkan data yang mau diedit
    $idkategori = $_GET["ubah"];
    $editkategori = mysqli_query($connection,"select * from kategori where kategoriID ='$idkategori'");
    $rowedit=mysqli_fetch_array($editkategori);
 ?>




<div class="row">

	<div class="col-sm-1" >
  </div>

  <div class="col-sm-10">

  	 <div class="jumbotron jumbotron fluid">
        	<div class="container">
        		<h1 class="display-4">edit kategori </h1>
        	</div>
        </div>	<!--penutup jumbotron-->

<form method="POST">
    <div class="form-group row">
    <label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori: </label>
      <div class="col-sm-10">
      <input type="text" class="form-control" id="kodekategori" 
      name="inputidkategori" placeholder="kode kategori" maxlength="4" value="<?php echo $rowedit["kategoriID"]?>" readonly>
    </div>
   </div>


   <div class="form-group row">
    <label for="namakategori" class="col-sm-2 col-form-label">Nama Kategori: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="namakategori" 
      name="inputnamakategori"placeholder="namakategori" value="<?php echo $rowedit["kategorinama"]?>" >
    </div>
   </div>


   <div class="form-group row">
    <label for="ketkategori" class="col-sm-2 col-form-label">keterangan kategori: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ketkategori" 
      name="inputketkategori" placeholder="keterangan kategori" value="<?php echo $rowedit["kategoriketerangan"]?>">
    </div>
   </div>


  <div class="form-group row">
    <label for="refkategori" class="col-sm-2 col-form-label">referensi kategori: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="refkategori" 
      name="inputrefkategori" placeholder="referensi kategori" value="<?php echo $rowedit["kategorireferensi"]?>">
    </div>
   </div>


    <div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
    <input type="submit" class="btn btn-primary" value="Ubah" name="Ubah"> 
    <input type="submit" class="btn btn-secondary" value="Batal" name="Batal"> 
    </div>
  </div>





</form>




<div class="col-sm-1" >
  </div>

</div>
</div>


<div class="row">
		<div class="col-sm-1"></div>
     <div class="col-sm-10">
        <div class="jumbotron jumbotron fluid">
        	<div class="container">
        		<h1 class="display-4">Daftar Kategori</h1>
        		<h2>Hasil entri</h2>
        	</div>
        </div>	<!--penutup jumbotron-->

        <form method="POST">
        	<div class="form group row mb-2">
        		<label for="search" class="col-sm-3">Nama kategori:</label>
        		<div class="col-sm-6">
        			<input type="text" name="search" class="form-control" id="search" placeholder="namakategori" value="<?php if(isset($_POST['search'])) {echo $_POST['search'];}?>">
        		</div>
        		<input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="search">
        	</div>
        </form>

        
         <table class="table table-hover table-danger">
        	<thead class="thead-dark">
        		<tr>
                <th>no</th>
                <th>IDKategori</th>
                <th>Nama Kategori</th>
                <th>keterangan</th>
                <th>referensi</th>
                <th colspan="2" style="text-align:center">Action</th>
                </tr>
        	</thead>

        	<tbody>

            <?php
            if(isset($_POST['kirim']))
             {
               $search=$_POST['search'];
               $query=mysqli_query($connection,"select * from kategori where kategorinama like '%".$search."%'" );
               
              
             }
             else
             {
             $query=mysqli_query($connection, "select * from kategori");
             }
            $nomor=1;
            while ($row = mysqli_fetch_array($query)) 
            { ?>
            	<tr>
            	  <td><?php echo $nomor; ?></td>
            	  <td><?php echo $row['kategoriID']; ?></td>
            	  <td><?php echo $row['kategorinama']; ?></td>
            	  <td><?php echo $row['kategoriketerangan']; ?></td>
            	  <td><?php echo $row['kategorireferensi']; ?></td>
                 <td>
                          

                            <a href="kategoriedit.php?ubah=<?php echo $row["kategoriID"];  ?> "class="btn btn-success btn-sm"
                                TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a> 

                        </td>


                        <td>
                          

                              <a href="kategorihapus.php?hapus=<?php echo $row["kategoriID"]; ?>" class="btn btn-danger btn-sm"
                                title="DELETE">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>
                           </a>

                        </td>
            	</tr>
             <?php $nomor = $nomor+1; ?>
             <?php   } ?>

        	</tbody>
        </table>	


     </div>
        <div class="col-sm-1"></div>

</div>
</div>
</div><!--penutup contaoner -fluid-->
<?php include "footer.php";?>

<?php  
mysqli_close($connection);
ob_end_flush();
?>
</html>