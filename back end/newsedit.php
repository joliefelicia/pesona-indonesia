<!DOCTYPE html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <title> NEWS FORM</title>
  </head>
<?php
ob_start();
session_start();
if(!isset($_SESSION['emailuser']))
    header("Location: login.php");

     include "header.php";?>
<div class="container-fluid">
<div class="card shadow mb-4">
<?php
include "includes/config.php";

if(isset($_POST['Batal']))
    {
        header("Location: news.php");
    }
if(isset($_POST['Ubah'])){

  $kodenews=$_GET['ubahnews'];
  $namanews=$_POST['inputjudulnews'];
  $deskripsinews=$_POST['inputdeskripsi'];
  $provinsiid=$_POST['inputprovinsiid'];
  $sumber=$_POST['inputsumber'];
  $link=$_POST['inputlinknews'];
  $nama=$_FILES['file']['name'];
  $file_tmp=$_FILES['file']['tmp_name'];

        if(empty($nama) && empty($deskripsinews)){
            mysqli_query($connection,"UPDATE news set judulnews='$namanews' , provinsiID='$provinsiid',  sumber='$sumber' where idnews='$kodenews'");
            header("location:news.php");
        }

        elseif(empty($deskripsinews)){
            $ekstensifile=pathinfo($nama,PATHINFO_EXTENSION);
            //PERIKSA EKSTENSI FILE HARUS JPG ATAU PNG
            if(($ekstensifile == "jpg") or($ekstensifile=="JPG")){
            move_uploaded_file($file_tmp, 'images/'.$nama);//unggah file ke folder images
            mysqli_query($connection,"UPDATE news set judulnews='$namanews', provinsiID='$provinsiid', foto='$nama',  sumber='$sumber' where idnews='$kodenews'");
            header("location:news.php");

        }
        else{
            mysqli_query($connection,"UPDATE news set judulnews='$namanews', deskripsiawal='$deskripsinews', provinsiID='$provinsiid', foto='$nama',  sumber='$sumber' where idnews='$kodenews'");
            header("location:news.php");

        }
    }


}

 $dataprovinsi = mysqli_query($connection,"select * from provinsi");
 $kodeberita = $_GET['ubahnews'];
 $editberita= mysqli_query($connection,"select * from news where idnews='$kodeberita'");
 $rowedit = mysqli_fetch_array($editberita);

 $editprovinsi = mysqli_query($connection,"select * from provinsi, news WHERE  idnews='$kodeberita' and provinsi.provinsiID=news.provinsiID");
 $rowedit2 = mysqli_fetch_array($editprovinsi);

?>

      <div class="row">
      <div class="col-sm-1" >
  </div>

  <div class="col-sm-10">

      <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Edit Berita</h1>
                </div>

            </div> <!-- Penutup jumbotron -->
    <form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="IDnews" class="col-sm-2 col-form-label">ID berita: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="IDnews" 
      name="inputidnews" placeholder="IDnews" maxlength="4" value="<?php echo $rowedit['idnews']; ?>" disabled>
    </div>
   </div>


   <div class="form-group row">
    <label for="judulnews" class="col-sm-2 col-form-label">Judul berita: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="judulnews" 
      name="inputjudulnews" placeholder="judul berita" value="<?php echo $rowedit['judulnews']; ?>">
    </div>
   </div>


   <div class="form-group row">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi: </label>
    <div class="col-sm-10">
      <textarea type="text" id="exampleFormControlTextarea1" class="form-control" id="deksripsi" 
      name="inputdeskripsi" placeholder="dekripsi" rows="4" cols="35" value="<?php echo $rowedit['deskripsiawal']; ?>"></textarea>
    </div>
   </div>

   <div class="form-group row">
    <label for="sumber" class="col-sm-2 col-form-label">Sumber: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  id="sumber" 
      name="inputsumber" placeholder="sumber berita" value="<?php echo $rowedit['sumber']; ?>">
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
	 <label for="customfile" class="col-sm-2 col-form-label">file Photo: </label>
		<div class="col-sm-10">
            <input type="file" id="file" name="file" >
            <img src="images/<?php echo $rowedit['foto'] ?>" style="width:200px;height: 100px;">
            <p class="help-block">Field ini digunakan untuk unggah file</p>
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

</div>

 <!-- memulai dengan menampilkan data -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Berita Wisata</h1>
                    <h2>Hasil Entri Data Pada Tabel Berita Wisata</h2>
                </div>

            </div> <!-- Penutup jumbotron -->

             <form method="POST">
            <div class="form-group row mb-2">
                <label for="search" class="col-sm-3">Nama Berita</label>
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" id="search" 
                    value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>"placeholder="Cari nama berita">
                </div>
                <input type="submit" name="Kirim" class="col-sm-1 btn btn-primary" value="Search">
            </div>
        
        </form>

         <table class="table table-hover table-danger table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Berita</th>
                    <th>Judul Berita</th>
                    <th>Deskripsi Awal</th>
                    <th>Provinsi</th>
                    <th>Sumber</th>
                    <th>Foto</th>
                    <th colspan="2" style="text-align:center">Action</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_POST["Kirim"]))
            {
                $search = $_POST['search'];
                $query =mysqli_query($connection, "select news.* from news,provinsi where judulnews
                  like '%".$search."%' and news.provinsiID=provinsi.provinsiID  ");

            }
            else
                {
             $query =mysqli_query($connection, "select news.* from news,provinsi where  news.provinsiID=provinsi.provinsiID ");
                }

                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $row['idnews'];?></td>
                        <td><?php echo $row['judulnews'];?></td>
                        <td><?php echo $row['deskripsiawal'];?></td>
                        <td><?php echo $row['provinsiID'];?></td>
                        <td><?php echo $row['sumber'];?></td>
                        <td><?php 
                        if(is_file("images/".$row['foto'])){ ?>
                           <img src="images/<?php echo $row['foto']; ?>" width="80">
                      <?php  }
                        else{
                            echo "<img src='images/noimage.png' width='80'>";
                        }
                        ?>
                        </td>
                        <td>                          
                            <a href="newsedit.php?ubahnews=<?php echo $row["idnews"];?>" class="btn btn-success btn-sm" TITLE="EDIT">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a> 
                        </td>
                        <td>
                            <a href="newshapus.php?hapusnews=<?php echo $row["idnews"];?>" class="btn btn-danger btn-sm" TITLE="HAPUS">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                           </svg>
                           </a>

                        </td>

                    </tr>


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