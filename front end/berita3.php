<!DOCTYPE html>
<?php 
include "includes/config.php";
$query=mysqli_query($connection,"select * from provinsi");

$kategori=mysqli_query($connection,"select * from kategori");

$area=mysqli_query($connection,"select * from area where provinsiID='04'");

$berita=mysqli_query($connection,"select * from news");

?>
<html lang="en">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />  
    <link href = "wisata.ico" rel="shortcut icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <title>Berita</title>
    <style type="text/css">
      .nav-link{
        margin-right: 30px;
      }

      .navbar .menu img{
        width:50px;
        height:50px;
        clip-path:circle(50%);
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
}

    .berita{
        padding:40px;
    }

    .berita h1{
        font-size: 40px;
        padding-bottom: 10px;
    }

    .berita .bagikan{
        font-size: 30px;
    }

    .berita .media-body p{
        font-size: 20px;
    }

    .berita .utama{
        width:800px;
    }
    

    @media (min-width:700px ){
        .berita .utama{
           width: 650px;
        }

        .berita .galeri{
          width:500px;
      } 

    }

    @media (max-width:550px) {
        .berita .utama{
            width:480px;
        }

        .berita .galeri{
          width:460px;
      } 

        
    }

      @media (max-width:430px ){
        .berita .utama{
            width: 340px;
        }

        .berita .galeri{
            width:310px;
        }
    }

   

    @media (max-width:360px ){
        .berita .utama{
            width: 300px;
        }

        .berita .galeri{
            width:270px;
        }
    }

    @media (max-width:300px ){
        .berita .utama{
            width: 250px;
        }

        .berita .galeri{
            width:200px
        }

    }

      .beritalain{
        padding-top:20px;
        margin-bottom:50px;
        padding-bottom: 20px;
      }

      .beritalain h1{
        font-size: 30px;
        margin-left:30px; 
        margin-bottom:20px;
      }

      .beritalain img{
        width:250px;
        padding-top :20px;
        display: inline-block;
      }

      .fa {
        padding: 10px;
        font-size: 25px;
        width: 50px; 
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
      }
      
      .fa:hover {
        background-color: white;
      }
      
      .fa-facebook {
        background: #3B5998;
        color: white;
      }
      
      .fa-twitter {
        background: #55ACEE;
        color: white;
      }
      
      .fa-instagram {
        background: #125688;
        color: white;
      }


   

 </style>
  </head>
  <body>
    <!--menu-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#7cc9f3">
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
            <?php echo $row["provinsinama"]?> &raquo; </a>
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



           
<div class="berita container">

  <div class="row justify-content-center">
    <div class="media">
    <?php while($row=mysqli_fetch_array($berita)){
        if($row["idnews"]=='id03'){ ?>
    <h1><?php echo $row['judulnews'] ?></h1>    
    <p style="font-size: 20px;"><?php echo $row['sumber']?></p>
    <p class="bagikan"> Bagikan : 
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-instagram"></a>
</p>
    <img src="images/<?php echo $row['foto'] ?>" class="align-self-start mr-3 utama" alt="A generic square placeholder image with rounded corners in a figure.">
      <?php    }
      }  ?>
    <div class="media-body">
  <p>Singkawang terkenal dengan julukan Kota Seribu Klenteng. Kota yang juga ikonik dan ramai dikunjungi wisatawan di setiap acara Cap Go Meh ini punya banyak tempat menarik. Yuk simak tempat menarik di Singkawang</p>
  <h2>1. Kelenteng Tri Darma Bumi Raya</h2> 
  <img src="images/klenteng.png" class="galeri">
  <p>Menurut sejarahnya kelenteng ini dibangun pada tahun 1878. Kelenteng ini juga diyakini sebagai tempat peribadatan tertua umat Tri Darma di Singkawang.</p>
  <p>Biasanya, pada saat perayaan Cap Go Meh dan Imlek orang akan beramai-ramai datang ke vihara untuk sembahyang. Tak hanya warga Tri Darma saja yang meramaikan vihara, namun wisatawan yang antusias dengan perayaan Cap Go Meh pasti singgah di vihara ini.</p>
  <p>Di sini traveler bisa melihat salah satu cagar budaya Singkawang berdiri megah. Di bagian belakang vihara, kamu bisa melihat taman kecil dengan lukisan dinding. Lukisan ini menggambarkan para dewa yang diyakini oleh Tri Darma. Di samping bangunan vihara juga ada kolam kecil yang mempercantik keberadaan bangunan cagar budaya ini.</p>
    </br></br>
  <h2>2. Kedai kopi Tiam Risam</h2>
  <img src="images/kedaikopi.jpg" class="galeri">
  <p>Kedai kopi ini persis berada di samping Kelenteng Tri Darma Bumi Raya. Kedai kopi Tiam Rusen spesial karena merupakan kedai kopi tertua di Singkawang. Kedai kopi itu didirikan tahun 1955, yang artinya usianya telah mencapai 65 tahun.</p>
  <p>Beragam menu minuman yang disajikan di sini. Mulai dari olahan kopi Singkawang hingga minuman manis lainnya baik dalam bentuk panas atau dingin.</p>
  <p>Di sini juga menyajikan beragam cemilan untuk menemani kopi. Harga minuman di sini tak mahal, kok mulai dari Rp 8.000 saja.</p>
    </br></br>
  <h2>3. Panorama di Tanjung Bajau</h2>
  <img src="images/tanjungbajau.jpg" class="galeri">
  <p>Tempat ini berada di Jalan Raya Pasir Panjang, Kelurahan Sedau, Kecamatan Singkawang Selatan. Kira-kira hanya 30 menitan dari pusat kota Singkawang.</p>
  <p>Tanjung Bajau adalah destinasi wisata yang menghadirkan laut, pegunungan dengan konsep edukasi dan rekreasi. Di kawasan ini kamu tak hanya menikmati pantainya saja, namun juga ada panorama, aquarium dan taman bermain. Di kawasan ini juga banyak patung-patung hewan.</p>
  <p>Tiket masuk untuk masuk ke kawasan Tanjung Bajau itu Rp 30.000 per orangnya. Traveler bisa membawa kendaraan baik mobil atau motor untuk mengeksplorasi wahana-wahana di Tanjung Bajau.</p>
 
  </div>
    </div>
</div>
</div>

<div class="beritalain container">
  <div class="row justify-content-center">
  <h1>Other News</h1>
  <?php
    $query=mysqli_query($connection,"select * from news where idnews!='id03' ");
    while($row=mysqli_fetch_array($query)) {?>
    <div class="col-md-4">
    <div class="media news">
    <img  class="mr-3" src="images/<?php echo $row['foto'] ?>" alt="A generic square placeholder image with rounded corners in a figure.">
   <div class="media-body">
    <h5><?php echo $row['judulnews'] ?></h5>
    <p><?php echo $row['sumber']?></p>
    <p><?php echo $row['deskripsiawal']?></p>
    <?php if($row['idnews']=='id01'){ ?>
    <a href="berita1.php">klik untuk ingin tahu</a>
  <?php  } ?>
  <?php if($row['idnews']=='id02'){ ?>
    <a href="berita2.php">klik untuk ingin tahu</a>
  <?php  } ?>
  <?php if($row['idnews']=='id04'){ ?>
    <a href="berita4.php">klik untuk ingin tahu</a>
  <?php  } ?>
  </div>
</div>
    </div>
<?php } ?>
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