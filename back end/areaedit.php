<!DOCTYPE html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <title> AREA FORM</title>
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

if(isset($_POST['Batal']))
    {
        header("location:area.php");
    }

if(isset($_POST['Edit']))
{

    if(isset($_REQUEST['inputnamaarea']))
    {
        $namaarea=$_REQUEST['inputnamaarea'];

    }

    if(!empty($namaarea))
    {
        $namaarea=$_REQUEST['inputnamaarea'];
    }
    else
    {
       ?><h1>Anda harus mengisi data di php</h1><?php
       die ('Anda harus mengisi data di php');
    }


        if(isset($_REQUEST['inputareawilayah']))
    {
        $areawilayah=$_REQUEST['inputareawilayah'];

    }

    if(!empty($areawilayah))
    {
        $areawilayah=$_REQUEST['inputareawilayah'];
    }
    else
    {
       ?><h1>Anda harus mengisi data di php</h1><?php
       die ('Anda harus mengisi data di php');
    }


 
  $IDarea=$_POST['inputidarea'];
  $areaketerangan=$_POST['inputareaketerangan'];
  $provinsiid=$_POST['inputprovinsiid'];


mysqli_query($connection,"update area set areanama='$namaarea' , areawilayah='$areawilayah',areaketerangan='$areaketerangan',provinsiID='$provinsiid' where areaID='$IDarea'");
header("location:area.php");

}

    $dataprovinsi = mysqli_query($connection,"select * from provinsi");
  
    //untuk menampilkan data yang mau diedit
    $idarea = $_GET["ubah"];
    $editarea = mysqli_query($connection,"select * from area where areaID ='$idarea'");
    $rowedit=mysqli_fetch_array($editarea);

    
    $editprovinsi= mysqli_query($connection,"select * from area, provinsi where areaID ='$idarea' and area.provinsiID=provinsi.provinsiID");
    $rowedit2=mysqli_fetch_array($editprovinsi);



?>

 

 

      <div class="row">
      <div class="col-sm-1" >
  </div>

  <div class="col-sm-10">
      <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Edit Area</h1>
                </div>

            </div> <!-- Penutup jumbotron -->
    <form method="POST">
  <div class="form-group row">
    <label for="IDarea" class="col-sm-2 col-form-label">ID area: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="IDarea" 
      name="inputidarea" placeholder="IDarea" maxlength="4" value="<?php echo $rowedit["areaID"] ?>" readonly>
    </div>
   </div>


   <div class="form-group row">
    <label for="namaarea" class="col-sm-2 col-form-label">Nama area: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="namaarea" 
      name="inputnamaarea"placeholder="namaarea" maxlength="35" value="<?php echo $rowedit["areanama"] ?>">
    </div>
   </div>


   <div class="form-group row">
    <label for="areawilayah" class="col-sm-2 col-form-label">area wilayah: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="areawilayah" 
      name="inputareawilayah" placeholder="areawilayah" maxlength="35" value="<?php echo $rowedit["areawilayah"] ?>">
    </div>
   </div>


   <div class="form-group row">
    <label for="areaketerangan" class="col-sm-2 col-form-label">area keterangan: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="areaketerangan" 
      name="inputareaketerangan"placeholder="areaketerangan" maxlength="255" value="<?php echo $rowedit["areaketerangan"]?>">
    </div>
   </div>




   <div class="form-group row">
    <label for="inputprovinsiid" class="col-sm-2 col-form-label">Kode Provinsi</label>
    <div class="col-sm-10">
     <select class="form-control" id="inputprovinsiid" name="inputprovinsiid">
    <option value="<?php echo $rowedit['provinsiID'] ?>"><?php echo $rowedit['provinsiID']?> <?php echo $rowedit2['provinsinama'] ?></option>
      <?php while($row = mysqli_fetch_array($dataprovinsi)) 
      { ?>
       <option value="<?php echo $row["provinsiID"]?>">
        <?php echo $row["provinsiID"]?>
        <?php echo $row["provinsinama"]?>     
       </option>
      <?php } ?>
     </select>     
    </div>    
   </div>


   <div class="form-group row">
   <div class="col-sm-2">
   </div>
    <div class="col-sm-10">
       <input type="submit" class="btn btn-primary"value="Edit" name="Edit">
       <input type="submit" class="btn btn-secondary" value="Batal" name="Batal">
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
                    <h1 class="display-4">Daftar area</h1>
                    <h2>Hasil Entri data pada Tabel area</h2>
                </div>

            </div> <!-- Penutup jumbotron -->

             <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama area</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>"placeholder="Cari Nama area">
                </div>
                <input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        
        </form>

         <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode area</th>
                    <th>Nama area</th>
                    <th>wilayah area</th>
                    <th>keterangan area</th>
                    <th>kode provinsi</th>
                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["Kirim"]))
            {
                $search = $_POST['search'];
                $query =mysqli_query($connection, "select area.* from area, provinsi where areanama 
                  like '%".$search."%' and area.provinsiID=provinsi.provinsiID ");

            }
            else
                {
             $query =mysqli_query($connection, "select area.* from area, provinsi where area.provinsiID=provinsi.provinsiID ");
                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['areaID'];?></td>
                        <td><?php echo $row['areanama'];?></td>
                        <td><?php echo $row['areawilayah'];?></td>
                        <td><?php echo $row['areaketerangan'];?></td>
                        <td><?php echo $row['provinsiID'];?></td>


                        <td>
                          

                            <a href="areaedit.php?ubah=<?php echo $row["areaID"];  ?> "class="btn btn-success btn-sm"
                                TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a> 

                        </td>


                        <td>
                          

                              <a href="areahapus.php?hapus=<?php echo $row["areaID"]; ?>" class="btn btn-danger btn-sm"
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