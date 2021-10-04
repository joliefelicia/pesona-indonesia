<!DOCTYPE html>
<?php 
include "includes/config.php";
$query=mysqli_query($connection,"select * from provinsi");


$destinasi=mysqli_query($connection,"select * from destinasi,kategori,fotodestinasi where kategori.kategoriID=destinasi.kategoriID and destinasi.destinasiID=fotodestinasi.destinasiID");


$foto=mysqli_query($connection,"select * from fotodestinasi");

$sqldestinasi= mysqli_query($connection,"select * from destinasi");
$jumlahdestinasi=mysqli_num_rows($sqldestinasi);

$sqlrestoran=mysqli_query($connection,"select * from restoran");
$jumlahrestoran=mysqli_num_rows($sqlrestoran);

$sqlhotel=mysqli_query($connection,"select * from hotel");
$jumlahhotel=mysqli_num_rows($sqlhotel);

$villa=mysqli_query($connection,"select * from villa");
$jumlahvilla=mysqli_num_rows($villa);

$guesthouse=mysqli_query($connection,"select * from guesthouse");
$jumlahguesthouse=mysqli_num_rows($guesthouse);

?>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />  
      <link href = "wisata.ico" rel="shortcut icon">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">


    <title>Wisata</title>
    <style>
      .jumbotron {
        padding-top: 20px;
        background:url(images/beach2.jpg);
        height: 500px;
        /* padding: atasbawah kirikanan*/
      }
    </style>

  
  </head>
  
  <body>
<div class="container-fluid">
<!-- awal menu -->
       <nav class="navbar sticky-top navbar-expand-lg navbar-light " style="background:url(images/beach.jpg);height:auto;">
      <!--bisa diganti dengan ketik style-->
      <!--untuk menggati tulisan bisa diganti navbar--light jadi navbar-dark-->
      <div class="container">
      <a class="navbar-brand" href="#">
      <img src="images/menu.jpg" style="width:50px;height:50px;clip-path:circle(50%)">
      Pesona Indonesia
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="iindex.php">Home</a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Provinsi
        </a> <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php if (mysqli_num_rows($query)>0){
          while ($row=mysqli_fetch_array($query))
          {
            if($row["provinsinama"]=='Kalimantan Barat'){?>
          
          <a class="dropdown-item" href="kalimantanbarat.php">
            <?php echo $row["provinsinama"]?></a> <?php } 

         ?>
         <?php if($row["provinsinama"]=='Jawa Tengah'){?>
          
          <a class="dropdown-item" href="jawatengah.php">
            <?php echo $row["provinsinama"]?></a> <?php }  ?>

           <?php if($row["provinsinama"]=='Jakarta'){?>
          
          <a class="dropdown-item" href="jakarta.php">
            <?php echo $row["provinsinama"]?></a> <?php }  ?>

           <?php if($row["provinsinama"]=='Sumatera Utara'){?>
          
          <a class="dropdown-item" href="sumaterautara.php">
            <?php echo $row["provinsinama"]?></a> <?php }  ?>  

        <?php } } ?>


        </div>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kategori</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!--akhir menu-->

<!-- jumbroton -->

<div class="jumbotron container-fluid text-center ">
      <h1 class="display-4" style="font-size:50px;">Hello Adventurer</h1>
           </br> </br>
      <p class="lead" style="font-size: 40px"></p>
    </div>
           

<!-- akhir jumbroton -->

  

<!--slider-->

<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/pantai.jpg" alt="First slide" style="width:600px;">

      <div class="carousel-caption d-none d-md-block">
        <h1>Pantai Pasir Panjang, singkawang</h1>
        <p>Sebuah Pantai yang paling banyak dikunjungin, paling bagus dikunjungin ketika sore hari.</p>
      </div>



    </div>

      <div class="carousel-item">
      <img class="d-block w-100" src="images/danau toba.jpg" alt="Second slide" style="width:600px;">
       <div class="carousel-caption d-none d-md-block">
       <h1>Danau Toba, Sumatera Utara</h1>
        <p>Danau Toba merupakan danau terluas di Indonesia. Danau ini juga menjadi salah satu objek wisata favorit masyarakat Indonesia.</p>
      </div>
    </div>


    <div class="carousel-item">
       <img class="d-block w-100" src="images/kapuas.jpg" alt="Third slide" style="width:600px;">
       <div class="carousel-caption d-none d-md-block">
       <h1>Sungai Kapuas, Pontianak</h1>
        <p>Sungai Kapuas merupakan sungai terpanjang di Indonesia.</p>
     </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

<!--akhir slider-->

<div class="container" style="padding-top:20px;">
  <div class="row justify-content-center">
  <h1 style="font-size: 30px;margin-left:30px;">News For You</h1>
  <div class="col-md-8" style="background-color:white;padding:20px;">
  <?php
    $batas=2;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    $berita=mysqli_query($connection,"select * from news limit $halaman_awal, $batas");
    $jumlahberita=mysqli_num_rows($berita);

    $previous = $halaman - 1;
    $next = $halaman + 1;
    
$query=mysqli_query($connection,"select * from news");
$jumlahrecord=mysqli_num_rows($query);
$jumlahpage=ceil($jumlahrecord/$batas);
  
    while($row=mysqli_fetch_array($berita)) {?>
  
  <div class="media">
   <div class="media-body">
    <h5><?php echo $row['judulnews'] ?></h5>
    <p><?php echo $row['deskripsiawal']?></p>
    <a href="<?php echo $row['link']?>" target="_blank">klik untuk ingin tahu</a>
  </div>
  <img src="images/<?php echo $row['foto'] ?>" style="height:100px;padding-top :20px;" class="gallery-img-news" alt="A generic square placeholder image with rounded corners in a figure.">
</div>
</br>
<?php } ?>


<nav aria-label="Page navigation Example">
  <ul class="pagination">
  <ul class="pagination">
  <li class="page-item">
      <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
    </li>
    <?php  for ($nohalaman=1;$nohalaman<=$jumlahpage;$nohalaman++)
    { ?> 
		<li class="page-item"><a class="page-link" href="?halaman=<?php echo $nohalaman ?>"><?php echo $nohalaman; ?></a></li>
     <?php } ?>
     <li class="page-item">
      <a  class="page-link" <?php if($halaman < $jumlahpage) { echo "href='?halaman=$next'"; } ?>>Next</a>
    </li>
  </ul>
</nav>
  </div>

  <div class="col-md-4">
  <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
   Jumlah restoran
    <span class="badge badge-primary badge-pill"><?php echo $jumlahrestoran ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
   Jumlah Hotel
    <span class="badge badge-primary badge-pill"><?php  echo $jumlahhotel ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Jumlah  Guest House
    <span class="badge badge-primary badge-pill"><?php echo $jumlahguesthouse ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Jumlah Villa
    <span class="badge badge-primary badge-pill"><?php echo $jumlahvilla ?></span>
  </li>
</ul>
  </div>
</div>
</div>


<!-- memuat tampilan objek wisata-->

<div class="container">
<div class="row text-center mb-4">
          <div class="col">
            <h3>Galeri</h3>
          </div>
        </div>
  <div class="row justify-content-center">
    <?php  
       $bataspage=6;
       $page = isset($_GET['page'])?(int)$_GET['page'] : 1;
       $halaman_awal = ($page>1) ? ($page * $bataspage) - $bataspage : 0;	
       $foto=mysqli_query($connection,"select * from fotodestinasi limit $halaman_awal, $bataspage");
       $jumlahfoto=mysqli_num_rows($foto);

   $query=mysqli_query($connection,"select * from fotodestinasi");
   $jumlahberita=mysqli_num_rows($query);
   $jumlahpage=ceil($jumlahberita/$bataspage);

    while($row=mysqli_fetch_array($foto)) {?>
    <div class="col-md-4 mb-4">
  <div class="card">
  <img src="images/<?php echo $row['fotofile'] ?>" style="height:200px;padding-top 20px;" class="gallery-img" alt="A generic square placeholder image with rounded corners in a figure.">
    <div class="card-body">
        <p class="card-text"><?php echo $row['fotonama'] ?></p>
    </div>
 </div>
    </div>
 <?php }?>

 <nav aria-label="Page navigation Example">
  <ul class="pagination">
  <ul class="pagination">
    <?php  for ($urutanhalaman=1;$urutanhalaman<=$jumlahpage;$urutanhalaman++)
    { ?> 
		<li class="page-item"><a class="page-link" href="?page=<?php echo $urutanhalaman ?>"><?php echo $urutanhalaman; ?></a></li>
     <?php } ?>
  </ul>
</nav>

</div>
</div>

<!--akhirtampilan--> 

<div class="container" >
 <h1 style="text-align: center;"> Restaurant</h1>
  
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

        <table class="table table-borderless  table-hover table-responsive-md">

           <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Restoran</th>
                    <th>Alamat Restoran</th>
                    <th>Nama Area</th>
                    <th>Jenis Makanan</th>
                    <th>Bintang</th>
                 
                </tr>
            </thead>
           

            <tbody>

            <?php

          
            $jumlahtampilan=3; 
            $halaman=(isset($_GET['page']))? $_GET['page'] : 1;
            $mulaitampilan=($halaman-1)*$jumlahtampilan;
             if(isset($_POST["Kirim"]))
            {
                $search = $_POST['search'];
                $query = mysqli_query($connection, "select restoran.*,area.areanama from restoran,area 
                where restorannama like '%".$search."%' and restoran.areaID=area.areaID order by restoranID  limit $mulaitampilan, $jumlahtampilan ");


            }else
                {
                $query = mysqli_query($connection,  " select restoran.*,area.areanama from restoran,area 
                where restoran.areaID=area.areaID order by restoranID  limit $mulaitampilan, $jumlahtampilan");

                }
           

          
           
                

                $nomor = 1;
                while ($row = mysqli_fetch_array($query))
                { ?>
                    <tr>
                        <td><?php echo $nomor+$mulaitampilan;?></td>
                        <td><?php echo $row['restorannama'];?></td>
                        <td><?php echo $row['restoranalamat'];?></td>
                        <td><?php echo $row['areanama'];?></td>
                        <td><?php echo $row['jenismakanan']?></td>
                        <td><?php echo $row['rating'];?></td>
                        

               

                    </tr>

            <?php $nomor = $nomor + 1; ?>
            <?php } ?>

            </tbody>


</table>

   

        <?php
$query=mysqli_query($connection,"select restoran.*,area.areaID,area.areanama from restoran,area 
                where restoran.areaID=area.areaID order by restoranID");
$jumlahrecord=mysqli_num_rows($query);
$jumlahpage=ceil($jumlahrecord/$jumlahtampilan);
?>
     <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="?page=<?php $nohalaman=1 ;echo $nohalaman ?>" >
        <span aria-hidden="true">pertama</span>
      </a>
    </li>

    <?php  for ($nohalaman=1;$nohalaman<=$jumlahpage;$nohalaman++)
    { ?> 
    <li class="page-item">
        <?php if($nohalaman!=$halaman)
        { ?>
        <a class="page-link" href="?page=<?php echo $nohalaman ?>"><?php echo $nohalaman ?></a>
<?php }
else { ?>
    <a class="page-link" href="?page=<?php echo $nohalaman ?>"><?php echo $nohalaman ?></a>
    <?php } ?>
    </li>
     <?php } ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $nohalaman-1 ?>" >
        <span aria-hidden="true">terakhir</span>
      </a>
    </li>
  </ul>
</nav>

  

</div>




</br></br>

<?php include "footer.html"; ?>

   


</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
    <script>
      gsap.registerPlugin(TextPlugin);
      gsap.to('.lead', {duration:2, delay:1.5, text:'Find Your Destination In Here'});
      gsap.from('.display-4',{duration:2 , x:-100 , opacity:0, delay:0.5, ease:'back'})

    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
          const galleryimg=document.querySelectorAll('.card');

      galleryimg.forEach(( img , i ) => {
        img.dataset.aos='fade-up';
        img.dataset.aosDelay= i * 100; //maksudnya setiap i / indeks delay 100 second
/* untuk javascript tidak boleh - diganti dengan huruf besar di huruf
pertama kata kedua / camel case*/
      });
    AOS.init({
      once:true
    });
  </script>
  </body>

</html>