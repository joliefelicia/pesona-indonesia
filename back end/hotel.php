<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Hotel</title>
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


    if(isset($_POST['Simpan']))
    {
        if (isset($_REQUEST['inputidhotel']))
        {
            $hotelid = $_REQUEST['inputidhotel'];
        }

        if (!empty($hotelid))
        {
            $hotelid = $_POST['inputidhotel'];
        }
        else {
            die ("Anda harus memasukkan kodenya");
        }

        $namahotel = $_POST['inputnamahotel'];
        $alamathotel = $_POST['inputalamathotel'];
        $area =$_POST['kodearea'];
        $bintang=$_POST['inputbintanghotel'];
  

        mysqli_query($connection, "insert into hotel values ('$hotelid', 
        '$namahotel', '$alamathotel', '$area','$bintang')");

        header("location:hotel.php");
    }

    $dataarea = mysqli_query($connection, "select * from area");


?>
<div class="row">
<div class="col-sm-1">
  </div>

  <div class="col-sm-10">

  <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Input Hotel</h1>
                </div>

            </div> <!-- Penutup jumbotron -->


  <form method="POST">
  <div class="form-group row">
    <label for="kodehotel" class="col-sm-2 col-form-label">ID Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="kodehotel" name="inputidhotel" placeholder="Kode Hotel" maxlength="4" required="">
    </div>
  </div>

  <div class="form-group row">
    <label for="namahotel" class="col-sm-2 col-form-label">Nama hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputnamahotel" id="namahotel" placeholder="Nama hotel">
    </div>
  </div>

  <div class="form-group row">
    <label for="alamathotel" class="col-sm-2 col-form-label">Alamat Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputalamathotel" id="alamathotel" placeholder="Alamat Hotel">
    </div>
  </div>

  <div class="form-group row">
    <label for="refarea" class="col-sm-2 col-form-label">Area Hotel</label>
    <div class="col-sm-10">
    <select class="form-control" name="kodearea" id="kodearea" >
      <div name="kodearea">
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
    <label for="bintanghotel" class="col-sm-2 col-form-label">Bintang Hotel</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="inputbintanghotel" id="bintanghotel" placeholder="Bintang Hotel">
    </div>
  </div>



  <div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
    <input type="submit" class="btn btn-primary" value="Simpan" name="Simpan"> 
    <input type="reset" class="btn btn-secondary" value="Reset" name="Reset"> 
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
                    <h1 class="display-4">Daftar Hotel</h1>
                    <h2>Hasil Entri data pada Tabel Hotel</h2>
                </div>

            </div> <!-- Penutup jumbotron -->


        <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Hotel</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>"placeholder="Cari Nama Hotel">
                </div>
                <input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        
        </form>



        <table class="table table-hover table-info">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Id Hotel</th>
                    <th>Nama Hotel</th>
                    <th>Alamat Hotel</th>
                    <th>ID Area</th>
                    <th>Nama Area</th>
                    <th>Bintang</th>
                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["Kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select hotel.*,area.areaID,area.areanama from hotel,area 
                where namahotel like '%".$search."%' and hotel.areaID=area.areaID order by hotelID ");


            }else
                {
                $query = mysqli_query($connection,  " select hotel.*,area.areaID,area.areanama from hotel,area 
                where hotel.areaID=area.areaID order by hotelID");

                }

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['hotelID'];?></td>
                        <td><?php echo $row['namahotel'];?></td>
                        <td><?php echo $row['alamathotel'];?></td>
                        <td><?php echo $row['areaID'];?></td>
                        <td><?php echo $row['areanama'];?></td>
                        <td><?php echo $row['bintang'];?></td>
                        

                    <td>
                            <a href="hoteledit.php?ubah=<?php echo $row["hotelID"]; ?> "class="btn btn-success btn-sm"
                                TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>


                        </td>


                        <td>
                            <a href="hotelhapus.php?hapus=<?php echo $row["hotelID"];?>" class="btn btn-danger btn-sm"
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