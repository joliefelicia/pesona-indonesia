<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Restoran</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
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
        header("location:restoran.php");
    }
    

    if(isset($_POST['Ubah']))
    {
        if (isset($_REQUEST['inputidrestoran']))
        {
            $restorankode = $_REQUEST['inputidrestoran'];
        }

        if (!empty($restorankode))
        {
            $restorankode = $_POST['inputidrestoran'];
        }
        else {
            die ("Anda harus memasukkan kodenya");
        }

        $restorannama = $_POST['inputnamarestoran'];
        $restoranpemilik=$_POST['inputpemilik'];
        $jenismakanan=$_POST['inputjenismakanan'];
        $alamatrestoran = $_POST['inputalamatrestoran'];
        $rating=$_POST['inputratingrestoran'];
        $kodearea = $_POST['kodearea'];

      

        mysqli_query($connection,"update restoran set restorannama='$restorannama' ,restoranpemilik='$restoranpemilik',jenismakanan='$jenismakanan', restoranalamat='$alamatrestoran',rating='$rating',areaID='$kodearea' where restoranID='$restorankode'");
      

        header("location:restoran.php");

    }

   

   
    $dataarea = mysqli_query($connection, "select * from area");

    //untuk menampilkan data yang mau diedit
    $koderestoran = $_GET["ubah"];
    $editrestoran = mysqli_query($connection,"select * from restoran where restoranID ='$koderestoran'");
    $rowedit=mysqli_fetch_array($editrestoran);


    $editarea = mysqli_query($connection,"select * from restoran, area where restoranID = '$koderestoran'and restoran.areaID = area.areaID");
    $rowedit2 = mysqli_fetch_array($editarea);




?>


    
<div class="row">
<div class="col-sm-1">
  </div>

  <div class="col-sm-10">

  <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">EDIT restoran</h1>
                </div>

            </div> <!-- Penutup jumbotron -->


  <form method="POST">

 <div class="form-group row">
    <label for="koderestoran" class="col-sm-2 col-form-label">Kode Restoran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="koderestoran" name="inputidrestoran" placeholder="Kode Restoran" maxlength="4" required="" value="<?php echo $rowedit["restoranID"]?>" readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="namarestoran" class="col-sm-2 col-form-label">Nama Restoran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputnamarestoran" id="namarestoran" placeholder="Nama Restoran" value="<?php echo $rowedit["restorannama"]?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="namapemilikrestoran" class="col-sm-2 col-form-label">Nama Pemiliki Restoran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputpemilik" id="namapemilikrestoran" placeholder="Nama Pemilik Restoran" value="<?php echo $rowedit["restoranpemilik"]?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="jenismakanan" class="col-sm-2 col-form-label">Jenis Makanan </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputjenismakanan" id="jenismakanan" placeholder="jenis makanan" value="<?php echo $rowedit["jenismakanan"] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat Restoran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputalamatrestoran" id="alamat" placeholder="Alamat Restoran" value="<?php echo $rowedit["restoranalamat"]?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="refkategori" class="col-sm-2 col-form-label">Area Restoran</label>
    <div class="col-sm-10">
    <select class="form-control" name="kodearea" id="kodearea">
      <div name="kodearea">
       <option value="<?php echo $rowedit["areaID"] ?>"><?php echo $rowedit["areaID"] ?><?php echo $rowedit2["areanama"]?></option>  
            <?php 
                while($row = mysqli_fetch_array($dataarea)) {
            ?>
        <option value="<?php echo $row['areaID']?>">
        <?php echo $row['areaID']; ?>
        <?php echo $row['areanama']; ?>
        
        </option>
        <?php } ?>
      </div>
    </select>
    </div>
  </div>


    <div class="form-group row">
    <label for="rating" class="col-sm-2 col-form-label">Rating Restoran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputratingrestoran" id="rating" placeholder="Rating Restoran" value="<?php echo $rowedit["rating"]?>">
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

  </div>

    <div class="col-sm-1">
    </div>

    </div> <!-- Penutup kelas row -->

   <!-- memulai dengan menampilkan data -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Restoran</h1>
                    <h2>Hasil Entri data pada Tabel Restoran</h2>
                </div>

            </div> <!-- Penutup jumbotron -->


        <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Restoran</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>"placeholder="Cari Nama Restoran">
                </div>
                <input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        
        </form>



        <table class="table table-hover table-warning">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Restoran</th>
                    <th>Nama Restoran</th>
                    <th>Pemilik Restoran</th>
                    <th>Jenis Makanan</th>
                    <th>Alamat Restoran</th>
                    <th>Rating</th>
                    <th>Kode Area</th>
                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["Kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select restoran.*, 
                area.areaID, area.areanama
                from restoran, area 
                where restorannama like '%".$search."%' 
                and restoran.areaID = area.areaID
                ");


            }else
                {
                $query = mysqli_query($connection,  "select restoran.*, 
                area.areaID, area.areanama
                from restoran, area 
                where restoran.areaID = area.areaID
                ");

                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['restoranID'];?></td>
                        <td><?php echo $row['restorannama'];?></td>
                        <td><?php echo $row['restoranpemilik'];?></td>
                        <td><?php echo $row['jenismakanan'];?></td>
                        <td><?php echo $row['restoranalamat'];?></td>
                        <td><?php echo $row['rating'];?></td>
                        <td><?php echo $row['areaID'];?></td>
  

                        <td>
                            <a href="restoranedit.php?ubah=<?php echo $row["restoranID"]; ?> "class="btn btn-success btn-sm"
                                TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>


                        </td>


                        <td>
                            <a href="restoranhapus.php?hapus=<?php echo $row["restoranID"]; ?>" class="btn btn-danger btn-sm"
                                TITLE="DELETE">
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