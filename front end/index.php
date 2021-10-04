<!DOCTYPE html>
<?php 
include "includes/config.php";
$query=mysqli_query($connection,"select * from provinsi");

$area=mysqli_query($connection,"select * from area where provinsiID='04'");


$alam=mysqli_query($connection,"select * from kategori where kategorinama='Alam'");
$buatan=mysqli_query($connection,"select * from kategori where kategorinama='Buatan'");
$budaya=mysqli_query($connection,"select * from kategori where kategorinama='Budaya'");


$destinasi=mysqli_query($connection,"select * from destinasi,kategori,fotodestinasi where kategori.kategoriID=destinasi.kategoriID and destinasi.destinasiID=fotodestinasi.destinasiID");

$foto=mysqli_query($connection,"select * from fotodestinasi");

$sqldestinasi= mysqli_query($connection,"select * from destinasi");
$jumlahdestinasi=mysqli_num_rows($sqldestinasi);
?>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no , maximum-scale=1, user-scalable=no">
    <meta name="description" content="Bootstrap 5 navbar multilevel treeview examples for any type of project, Bootstrap 5">
    <meta name="keywords" content="htmlcss bootstrap, multi level menu, submenu, treeview nav menu examples">

    <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />  
      <link href = "wisata.ico" rel="shortcut icon">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    


    <title>Wisata</title>
    <style type="text/css">
      
      .jumbotron {
        background:url(images/gunungbromo3.jpg);
        width:100%;
        height: 500px;
      
        /* padding: atasbawah kirikanan*/
      }

      .jumbotron h1{
        font-size:50px;
        text-align:center;
        margin-bottom:10px;
      }

      .jumbotron p{
        font-size:30px;
        text-align:center;
        margin-bottom:20px;

      }

        @media screen and (max-width:400px) {
        .jumbotron h1{
          font-size: 40px;
          padding-left: 10px;
          padding-right:10px;
        }

        .jumbotron p{
          font-size: 25px;
        }
      }  

      .flex{
        display:flex;
        flex-direction: row;
        height: max-content;
        padding: 40px;
        justify-content: center;
        
      }

      @media (max-width: 700px) {
      .flex {
       flex-direction: column;
      }
    }

     .judulkategori h3{
       text-align: center; 
       padding-top:20px;
      }

    .flex .kategori{
      background-color:  #7cc9f3;
      padding: 30px;
      border-radius: 10px;
      margin: 10px;


    }


    .flex .kategori .judul{
      text-align: center;
      padding-bottom: 20px;
    }
    
    .flex img{
      width: 100px; 
      margin-left: auto; 
      margin-right: auto; 
      display: block;
      margin-bottom: 20px;
    }
    
    .galeri img{
      height:200px;
    }
    
    .galeri p{
      font-size: 20px;
      text-align:center;
      margin-left: 10px;
    }

    .navbar ul li{
      text-decoration: none;
    }

    
    .nav-link{
        margin-right: 30px;
      }

    
    .navbar .menu img{
      width:50px;
      height:50px;
      clip-path:circle(50%);
    }

    @media all and (min-width: 1025px) {
	.dropdown-menu li{ position: relative; 	}
	.nav-item .submenu{ 
		display: none;
		position: absolute;
		left:70%; top:30px;
	}
	.nav-item .submenu-left{ 
		right:100%; left:auto;
	}
	.dropdown-menu > li:hover{ background-color: #f1f1f1 }
	.dropdown-menu li:hover > .submenu{ display: block; }
}	
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width:1024px) {
  .dropdown-menu .dropdown-menu{
    position: static!important;
    margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
  }

  .dropdown-menu li:hover > .submenu{
    display: block;
  }

}

/* ============ small devices .end// ============ */

 

    .restoran {
      margin-bottom: 50px;
    }

    .restoran h1{
      text-align: center;
    }

    </style>
  </head>
  
<body>

<!-- awal menu -->

<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background:url(images/gunungbromo2.jpg);">
      <!--bisa diganti dengan ketik style-->
      <!--untuk menggati tulisan bisa diganti navbar--light jadi navbar-dark-->
      <div class="menu container">
<a class="navbar-brand display-3" href="#">
      <img src="images/menu.jpg">
     Pesona Indonesia
    </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="main_nav">
  <ul class="navbar-nav ms-auto">
    <li class="nav-item active"> <a class="nav-link" href="index.php">Home </a> </li>
    <li class="nav-item dropdown" id="myDropdown">
      <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Provinsi </a>
      <ul class="dropdown-menu">
           <?php if (mysqli_num_rows($query)>0){
          while ($row=mysqli_fetch_array($query))
          {
            if($row["provinsinama"]=='Kalimantan Barat'){?>
          
          <li><a class="dropdown-item">
            <?php echo $row["provinsinama"]?> &raquo;</a>
            <ul class="submenu dropdown-menu">
              <?php if (mysqli_num_rows($area)>0){
               while ($row1=mysqli_fetch_array($area))
              {
              if($row1['areanama']=='Singkawang') { ?>
             <li><a class="dropdown-item" href="areasingkawang.php">
                <?php echo $row1['areanama']?>
              </a>
             </li> 
             <?php } if($row1['areanama']=='Pontianak') { ?>
              <li><a class="dropdown-item" href="Kalimantanbarat.php">
                <?php echo $row1['areanama']?>
              </a>
            </li> <?php } } } ?>
            </ul>
          </li> <?php  } ?>
          
         <?php if($row["provinsinama"]=='Jawa Tengah'){?>
          
          <li><a class="dropdown-item" href="jawatengah.php">
            <?php echo $row["provinsinama"]?></a></li> <?php }  ?>

           <?php if($row["provinsinama"]=='Jakarta'){?>
          
          <li><a class="dropdown-item" href="jakarta.php">
            <?php echo $row["provinsinama"]?></a></li> <?php }  ?>

           <?php if($row["provinsinama"]=='Sumatera Utara'){?>
          
         <li><a class="dropdown-item" href="sumaterautara.php">
            <?php echo $row["provinsinama"]?></a></li> <?php }  ?>  

        <?php } } ?>
      </ul>
    </li>
    <li class="nav-item active"><a class="nav-link" href="news.php"> Berita</a></li>
  </ul>
</div>
<!-- navbar-collapse.// -->
</div>
<!-- container-// -->
    </nav>


<!--akhir menu-->

<!-- jumbroton -->

<div class="jumbotron">
      <h1 class="display-4">Hello Adventurer</h1>
           
      <p class="lead"></p>
</div>
           

<!-- akhir jumbroton -->
<div class="judulkategori container">
  <div class="row">
    <h3>Kategori</h3>
  </div>
</div>

<div class="flex container">
  <div class="kategori col-md-4" data-aos="fade-left">
  <img src="images/alam.png" >
    <h3 class="judul">Alam</h3> 
  <?php while($row=mysqli_fetch_array($alam)) {echo $row['kategoriketerangan']; } ?>
</div>

  <div class="kategori col-md-4"  data-aos="fade-up" data-aos-delay="1000">
  <img src="images/buatan.png" >
    <h3 class="judul">Buatan</h3> 
    <?php while($row=mysqli_fetch_array($buatan)) {echo $row['kategoriketerangan']; } ?>
  </div>

  <div class="kategori col-md-4" data-aos="fade-right" data-aos-delay="1500">
  <img src="images/budaya.png">
    <h3 class="judul">Budaya</h3> 
    <?php while($row=mysqli_fetch_array($budaya)) {echo $row['kategoriketerangan']; } ?>
  </div>

</div>

<!-- memuat tampilan objek wisata-->
<div class="galeri container">
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
  <img src="images/<?php echo $row['fotofile'] ?>" class="gallery-img" alt="A generic square placeholder image with rounded corners in a figure.">
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

<div class="restoran container" >
 <h1> Restaurant</h1>
  
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

        <div class="table-responsive">
        <table class="table table-borderless table-hover">

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
            $hal=isset($_GET['hal'])?(int)$_GET['hal'] : 1;
            $mulaitampilan=($hal>1) ? ($hal * $jumlahtampilan) - $jumlahtampilan : 0;
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
                        <td><?php for($i=0;$i<$row['rating'];$i++){?><img src="images/star.png" width="20px" height="20px"><?php } ?></td>
                        

               

                    </tr>

            <?php $nomor = $nomor + 1; ?>
            <?php } ?>

            </tbody>


        </table>
        </div>

   

        <?php
$query=mysqli_query($connection,"select restoran.*,area.areaID,area.areanama from restoran,area 
                where restoran.areaID=area.areaID order by restoranID");
$jumlahrecord=mysqli_num_rows($query);
$jumlahpage=ceil($jumlahrecord/$jumlahtampilan);
?>
 <nav aria-label="Page navigation Example">
  <ul class="pagination">
  <ul class="pagination">
    <?php  for ($uruthalaman=1;$uruthalaman<=$jumlahpage;$uruthalaman++)
    { ?> 
		<li class="page-item"><a class="page-link" href="?hal=<?php echo $uruthalaman ?>"><?php echo $uruthalaman; ?></a></li>
     <?php } ?>
  </ul>
</nav>

  

</div>



<?php include "footer.html"; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
    <script type="text/javascript">
      gsap.registerPlugin(TextPlugin);
      gsap.to('.lead', {duration:2, delay:1.5, text:'Find Your Destination In Here'});
      gsap.from('.display-4',{duration:2 , x:-100 , opacity:0, delay:0.5, ease:'back'})

    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script type="text/javascript">
          const galleryimg=document.querySelectorAll('.card');

      galleryimg.forEach(( img , i ) => {
        img.dataset.aos='fade-up';
        img.dataset.aosDelay= i * 100; //maksudnya setiap i / indeks delay 100 second
/* untuk javascript tidak boleh - diganti dengan huruf besar di huruf
pertama kata kedua / camel case*/
      });

      const news = document.querySelectorAll('.news');

      news.forEach((media,i)=>{
        media.dataset.aos='fade-right';
        media.dataset.aosDelay=i*100;
      });
    AOS.init({
      once:true
    });


  </script>

<script type="text/javascript">
  document.querySelectorAll('.dropdown-menu').forEach(function(element){
    element.addEventListener('click', function (e) {
      e.stopPropagation();
    });
  });

    window.addEventListener("resize", function(){
      "use strict"; window.location.reload();
    })
    
    document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {
    
      document.querySelectorAll('.navbar .dropdown-menu a').forEach(function(element){
        element.addEventListener('click', function (e) {
            let nextEl = this.nextElementSibling;
            let parentEl  = element.parentElement;
			let allSubmenus_array =	parentEl.querySelectorAll('.submenu');

            if(nextEl && nextEl.classList.contains('submenu')) {	
              // prevent opening link if link needs to open dropdown
              e.preventDefault();
              if(nextEl.style.display == 'block'){
                nextEl.style.display = 'none';
              } else {
                nextEl.style.display = 'block';
              }
    
            }
        });
      })
    }
    // end if innerWidth
    }); 
      </script>
  </body>

</html>