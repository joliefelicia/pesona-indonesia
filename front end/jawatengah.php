<!DOCTYPE html>
<?php 
include "includes/config.php";
$query=mysqli_query($connection,"select * from provinsi");

$kategori=mysqli_query($connection,"select * from kategori");

$area=mysqli_query($connection,"select * from area where provinsiID='04'");

$destinasi=mysqli_query($connection,"select * from destinasi,area,provinsi,kategori,fotodestinasi where kategori.kategoriID=destinasi.kategoriID and destinasi.areaID=area.areaID and destinasi.destinasiID=fotodestinasi.destinasiID
and  area.provinsiID=provinsi.provinsiID and provinsi.provinsiID='03'");

$hotel=mysqli_query($connection,"select * from hotel where  areaID='id03' ");

$villa=mysqli_query($connection,"select * from villa where  areaID='id03' ");

$guesthouse=mysqli_query($connection,"select * from guesthouse where  areaID='id03' ");




?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <meta name="description" content="Bootstrap 5 navbar multilevel treeview examples for any type of project, Bootstrap 5">
    <meta name="keywords" content="htmlcss bootstrap, multi level menu, submenu, treeview nav menu examples">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />  
    <link href = "wisata.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">



    <title>Wisata Jawa Tengah</title>
    <style type="text/css">
      .jumbotron{
        padding-top: 20px;
        background:url(images/pantaingrumput2.jpg); 
        height: 500px;
      }

      .jumbotron h1{
        text-align: center;
        color:black;
      }

      .media{
        background-color: white;
        padding: 20px;
      }

      .navbar .menu img{
        width:50px;
        height:50px;
        clip-path:circle(50%);
      }

      .nav-link{
        margin-right: 30px;
      }

      @media all and (min-width: 992px) {
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
	.dropdown-menu > li:hover > .submenu{ display: block; }
}	
/* ============ desktop view .end// ============ */

/* ============ small devices ============ */
@media (max-width: 991px) {
  .dropdown-menu .dropdown-menu{
      margin-left:0.7rem; margin-right:0.7rem; margin-bottom: .5rem;
  }
  .dropdown-menu > li:hover > .submenu{ display: block; }

}

      .galeri{
        margin-top: 20px;
      }

      .galeri img{
        height:200px;
      }
      

      .galeri p{
        font-size: 20px;
      }

      .judulpenginapan{
        margin-bottom: 50px;
      }

      .judulpenginapan h1{
        text-align: center;
      }



</style>
  </head>
  <body>
    <!--menu-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background:url(images/pantaingrumput.jpg);">
      <!--bisa diganti dengan ketik style-->
      <!--untuk menggati tulisan bisa diganti navbar--light jadi navbar-dark-->
      <div class="menu container">
<a class="navbar-brand display-3" href="#">
      <img src="images/kalimantanbarat.jpg">
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
<div class="jumbotron">
<h1 class="display-4">Jawa Tengah</h1>
</div>
<!-- memuat tampilan objek wisata-->

<div class="galeri container">
<div class="row text-center mb-4"  >
          <div class="col">
            <h3>Galeri</h3>
          </div>
        </div>
  <div class="row justify-content-center">
    <?php  
    while($row=mysqli_fetch_array($destinasi)) {?>
    <div class="col-md-4 mb-4">
  <div class="card">
  <img src="images/<?php echo $row['fotofile'] ?>" class="gallery-img" alt="A generic square placeholder image with rounded corners in a figure.">
    <div class="card-body">
    <h3 class="card-title"><?php echo $row["destinasinama"]?></h3>
        <p class="card-text">Alamat: <?php echo $row["destinasialamat"]?></p>
 <p class="card-text">Area: <?php echo $row["areanama"]?></p>
    </div>
 </div>
    </div>
 <?php }?>
</div>
</div>
<!--akhirtampilan--> 


<div class="judulpenginapan container" >
  <h1 style="text-align:center">Tempat Penginapan di Jawa Tengah</h1>
  
  <div class="row justify-content-center">
  <div class="col-md">
    <h1>Hotel</h1>
   
  <?php if (mysqli_num_rows($hotel)>0){
while($row4=mysqli_fetch_array($hotel))
  {?>
   


<div class="media">
  <div class="media-body">
    <h4><?php echo $row4["namahotel"]?></h4>
    <p>Alamat Hotel: <?php echo $row4["alamathotel"]?></p>
    <p>Bintang: <?php for($i=0; $i<$row4["bintang"]; $i++) {?> <img src="images/star.png" width="20px" height="20px"> <?php } ?></p>
  </div>
 
</div>
<?php } } ?>

  </div>
  <div class="col-md-5">     <h1>Villa</h1>
   
  <?php if (mysqli_num_rows($villa)>0){
while($row3=mysqli_fetch_array($villa))
  {?>
   


<div class="media">
  
  <div class="media-body">
    <h4><?php echo $row3["namavilla"]?></h4>
    <p>Alamat Villa: <?php echo $row3["alamatvilla"]?></p>
    <p>Bintang: <?php for($i=0; $i<$row3["rating"]; $i++) {?> <img src="images/star.png" width="20px" height="20px"> <?php } ?></p>
  </div>
 
</div>
<?php } } ?></div>

<div class="col-md">    
   <h1>Guest House</h1>
   
  <?php if (mysqli_num_rows($guesthouse)>0){
while($row4=mysqli_fetch_array($guesthouse))
  {?>
   


<div class="media">
  
  <div class="media-body" >
    <h4> <?php echo $row4["namaguesthouse"]?></h4>
    <p>Alamat  Guest House : <?php echo $row4["alamatguesthouse"]?></p>
    <p>Bintang: <?php for($i=0; $i<$row4["rating"]; $i++) {?> <img src="images/star.png" width="20px" height="20px"> <?php } ?></p>
  </div>
 
</div>
<?php } } ?></div>


</div>
</div>

<?php include "footer.html"; ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/TextPlugin.min.js"></script>
    <script>
      gsap.registerPlugin(TextPlugin);
      gsap.from('.display-4',{duration:2 , x:-100 , opacity:0, delay:0.5, ease:'back'})

    </script>
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