<!DOCTYPE html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <title>PROVINSI FROM</title>
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

if(isset($_POST['Simpan']))
{

    if(isset($_REQUEST['inputprovinsinama']))
    {
        $provinsinama=$_REQUEST['inputprovinsinama'];

    }

    if(!empty($provinsinama))
    {
        $provinsinama=$_REQUEST['inputprovinsinama'];
    }
    else
    {
       ?><h1>Anda harus mengisi data di php</h1><?php
       die ('Anda harus mengisi data di php');
    }

 
  $provinsiid=$_POST['inputidprovinsi'];
  $provinsitglberdiri=$_POST['inputprovinsitglberdiri'];


mysqli_query($connection,"insert into provinsi values('$provinsiid','$provinsinama' ,'$provinsitglberdiri')");
header("location:provinsi.php");



}

?>
 <div class="row">
  
     <div class="col-sm-1" >
  </div>
<div class="col-sm-10">

      <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Input Provinsi</h1>
                </div>

            </div> <!-- Penutup jumbotron -->
    <form method="POST">
  <div class="form-group row">
    <label for="provinsiid" class="col-sm-2 col-form-label">ID provinsi: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="provinsiid" 
      name="inputidprovinsi"  maxlength="2" placeholder="id provinsi">
    </div>
   </div>


   <div class="form-group row">
    <label for="provinsinama" class="col-sm-2 col-form-label">Nama provinsi: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="provinsinama" 
      name="inputprovinsinama" maxlength="25" placeholder="nama provinsi">
    </div>
   </div>


   <div class="form-group row">
    <label for="provinsitglberdiri" class="col-sm-2 col-form-label">tanggal provinsi berdiri: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="provinsitglberdiri" 
      name="inputprovinsitglberdiri"  placeholder="tanggal berdiri provinsi">
    </div>
   </div>


  

   <div class="form-group row">
   <div class="col-sm-2">
   </div>
    <div class="col-sm-10">
       <input type="submit" class="btn btn-primary"value="Simpan" name="Simpan">
       <input type="reset" class="btn btn-secondary" value="Reset" name="Reset">
    </div>
   </div>
   </form>
  </div>   


<div class="col-sm-1">
</div>


</div>


 <!-- memulai dengan menampilkan data -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar provinsi</h1>
                    <h2>Hasil Entri data pada Tabel provinsi</h2>
                </div>

            </div> <!-- Penutup jumbotron -->

             <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama provinsi</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>"placeholder="Cari Nama provinsi">
                </div>
                <input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        
        </form>

         <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode provinsi</th>
                    <th>Nama provinsi</th>
                    <th>Provinsi tgl berdiri</th>
                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["Kirim"]))
            {
                $search = $_POST['search'];
                $query =mysqli_query($connection, "select * from provinsi where provinsinama 
                  like '%".$search."%' ");

            }
            else
                {
             $query =mysqli_query($connection, "select * from provinsi " );
                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['provinsiID'];?></td>
                        <td><?php echo $row['provinsinama'];?></td>
                        <td><?php echo $row['provinsitglberdiri'];?></td>

                        <td>
                          

                            <a href="provinsiedit.php?ubah=<?php echo $row["provinsiID"];  ?> "class="btn btn-success btn-sm"
                                TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a> 

                        </td>


                        <td>
                          

                              <a href="provinsihapus.php?hapus=<?php echo $row["provinsiID"]; ?>" class="btn btn-danger btn-sm"
                                title="DELETE">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>
                           </a>

                        </td>

                    </tr>

            <?php $nomor = $nomor + 1; ?>
            <?php } ?>

            </tbody>

        </table>


        </div>
        <div class="col-sm-1"></div>

    </div>
</div>
</div><!--penutup container -fluid-->
<?php include "footer.php";?>

<?php  
mysqli_close($connection);
ob_end_flush();
?>

    
  
</html>