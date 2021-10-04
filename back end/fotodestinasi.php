<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
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
        if (isset($_REQUEST['inputkodefoto']))
        {
            $kodefoto = $_REQUEST['inputkodefoto'];
        }

        if (!empty($kodefoto))
        {
            $kodefoto = $_POST['inputkodefoto'];
        }
        else {
            die ("Anda harus memasukkan kodenya");
        }

        $namafoto = $_POST['inputnamafoto'];
        $kodedestinasi = $_POST['kodedestinasi'];

        $nama=$_FILES['file']['name'];
        $file_tmp=$_FILES["file"]["tmp_name"];

        $ekstensifile=pathinfo($nama,PATHINFO_EXTENSION);

        //PERIKSA EKSTENSI FILE HARUS JPG ATAU PNG
        if(($ekstensifile == "jpg") or($ekstensifile=="JPG")){
             move_uploaded_file($file_tmp, 'images/'.$nama);//unggah file ke folder images
             mysqli_query($connection,"insert into fotodestinasi values('$kodefoto','$namafoto','$kodedestinasi','$nama')");

             header("location:fotodestinasi.php");
            }

          

    }

      $datadestinasi = mysqli_query($connection, "select * from destinasi");
?>

 


<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Input Photo Destinasi Wisata</h1>
			</div>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<div class="form-group row">
			<label for="kodefoto" class="col-sm-2 col-form-label">Kode Photo: </label>
		    <div class="col-sm-10">
            <input type="text" class="form-control" id="kodefoto" name="inputkodefoto" placeholder="Kode foto" maxlength="5" required="">
            </div>
			</div>


			<div class="form-group row">
			<label for="fotonama" class="col-sm-2 col-form-label">Nama Photo: </label>
		    <div class="col-sm-10">
            <input type="text" class="form-control" id="namafoto" name="inputnamafoto" placeholder="nama foto" >
            </div>
			</div>



			<div class="form-group row">
			<label for="namadestinasi" class="col-sm-2 col-form-label">nama destinasi: </label>
		    <div class="col-sm-10">
		    <select class="form-control" id="kodedestinasi" name="kodedestinasi">
		    <?php while($row = mysqli_fetch_array($datadestinasi))
		    { ?>
		     <option value="<?php echo $row['destinasiID']?>">
		    
            <?php echo $row['destinasiID']; ?>
            <?php echo $row['destinasinama']; ?>
            </option>
            <?php } ?>

            ?>
		    </select>
            </div>
			</div>



			<div class="form-group row">
			<label for="customfile" class="col-sm-2 col-form-label">file Photo: </label>
		    <div class="col-sm-10">
            <input type="file" id="customfile" name="file" >
            <p class="help-block">Field ini digunakan untuk unggah file</p>
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
	<div class="col-sm-1"></div>
</div>

<div class="row">
<div class="col-sm-1"></div>
       <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h1 class="display-4">Daftar Destinasi Wisata</h1>
            <h2>Hasil Entri data pada Tabel foto Destinasi</h2>
            </div>
            </div> <!-- Penutup jumbotron -->	
       



        <table class="table table-hover table-danger">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode foto</th>
                    <th>Nama foto</th>
                    <th>kode destinasi</th>
                    <th>file foto</th>
                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
                $query = mysqli_query($connection,"select * 
                from fotodestinasi");
                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['fotoID'];?></td>
                        <td><?php echo $row['fotonama'];?></td>
                        <td><?php echo $row['destinasiID'];?></td>
                        <td><?php 
                        if(is_file("images/".$row['fotofile']))
                        { ?>
                           <img src="images/<?php echo $row['fotofile']  ?>" width="80">
                      <?php  }
                        else{
                            echo "<img src='images/noimage.png' width='80'>";
                        }
                        ?>
                       </td>
                        <td>
                            <a href="fotodestinasiedit.php?ubahfoto=<?php echo $row["fotoID"]; ?> "class="btn btn-success btn-sm"
                                TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>
                        </td>


                        <td>
                            <a href="fotodestinasihapus.php?hapusfoto=<?php echo $row["fotoID"];?>" class="btn btn-danger btn-sm"
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
