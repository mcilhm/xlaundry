<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>Home Laundry</title>
  <meta name="description" content="Free Bootstrap 4 Pingendo Neon template made for app and softwares.">
  <meta name="keywords" content="Pingendo app neon free template bootstrap 4">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/neon.css">
  <!-- Script: Make my navbar transparent when the document is scrolled to top -->
  <script src="<?php echo base_url(); ?>assets/js/navbar-ontop.js"></script>
  <!-- Script: Animated entrance -->
  <script src="<?php echo base_url(); ?>assets/js/animate-in.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-info" style="">
    <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Home Laundry</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item mx-2">
            <a class="nav-link" href="#beranda">Beranda</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#pesan">Pesan</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#cekstatus">Cek Status Pesanan</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="#kontak">Kontak</a>
          </li>
          <?php
          if (!$this->session->logged_in_user) {
            ?>
          </ul>
          <a class="btn navbar-btn mx-2 btn-primary shadowed" href="<?php echo base_url(); ?>login/">Masuk</a>
          <a class="btn navbar-btn mx-2 btn-info shadowed" href="<?php echo base_url(); ?>register/">Daftar</a>
        <?php  } else {
        ?>

          <li class="nav-item mx-2">
            <a class="nav-link" href="<?php echo base_url(); ?>histori/">Histori Pesanan</a>
          </li>
          </ul>
          <a class="btn navbar-btn mx-2 btn-primary shadowed" href="<?php echo base_url(); ?>profil/"><?php echo $this->session->username_user; ?></a>
          <a class="btn navbar-btn mx-2 btn-danger shadowed" href="<?php echo base_url(); ?>login/logout">Keluar</a>
        <?php  } ?>
      </div>
    </div>
  </nav>
  <!-- Cover -->
  <div class="section-fade-out pt-5" style="	background-image: url(<?php echo base_url(); ?>assets/img/laundry1.jpg);	background-position: bottom;	background-size: 100%;	background-repeat: repeat;" id="beranda">
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-md-12 my-5 text-lg-left text-center align-self-center">
        
          <div class="notifikasi"><?php echo $this->session->flashdata('notifikasi'); ?></div>
          <h1 class="display-2">HOME LAUNDRY</h1>
          <p class="lead">Home Laundry adalah jasa laundry baju kiloan online yang terdekat di Jakarta Timur. Kami menyediakan layanan laundry profesional dan terjangkau untuk klien di wilayah jakarta. kami merupakan jasa laundry profesional kiloan dan satuan yang dapat di order melalui website. Layanan Laundry online kami meliputi jasa antar dan pengambilan. Percayakanlah pada kami, biarkan para ahli menanganinya dengan baik.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Article style section -->
  <div class="py-5 bg-light" style="">
    <div class="container">
      <div class="row py-5">
        <div class="col-md-5 order-2 order-md-1 animate-in-left">
          <img class="img-fluid d-block my-3 mx-auto" src="<?php echo base_url(); ?>assets/img/machinewash1_1.jpg" width="800"> </div>
        <div class="col-md-7 align-self-center order-1 order-md-2 my-3 text-md-left text-center">
          <h1>Mudah &amp; Cepat</h1>
          <p>Home Laundry melayani pesanan dengan sangat mudah dan cepat, karena telah ditenagai oleh pekerja profesional dan juga dengan mesin-mesin yang sangat canggih. Sehingga semua pesanan dapat dilakukan dengan sangat mudah dan cepat.</p>
        </div>
      </div>
      <div class="row pt-5">
        <div class="align-self-center col-lg-7 text-md-left text-center">
          <h2>Terjamin &amp; Berkualitas</h2>
          <p class="my-4 text-dark">Home Laundry menjamin semua pesanan yang akan selesai dengan hasil yang sangat berkualitas. membuat bahan yang di laundry menjadi lebih berkualitas dan juga terjamin tidak akan ada bahan yang berkurang kualitasnya.</p>
        </div>
        <div class="align-self-center mt-5 col-lg-5 animate-in-right">
          <img class="img-fluid d-block" src="<?php echo base_url(); ?>assets/img/machinewash1.jpg"> </div>
      </div>
    </div>
  </div>
  <div class="py-5" id="pesan">
    <div class="container">
      <div class="row">
        <div class="text-center col-md-12">
          <h1>Pesan</h1>
          <p class="">Jangan sampai lupa untuk melaundry pakaian atau bahan-bahan anda. segera lakukan pesanan di sistem Home Laundry</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 p-3">
          <div class="card bg-light">
            <div class="card-body p-6 bg-dark">
              <div class="row">
                <div class="col-8">
                  <h1 class="mb-0">Kiloan/Satuan</h1>
                </div>
                <div class="col-4 text-right">
                  <h5 class="mb-0"> <b>Mulai dari Rp. 10.000/Kg</b></h5>
                </div>
              </div>
              <p class="my-3">Bahan anda banyak yang ingin di Laundry? beratnya bisa sampai berkilo-kilo? tenang kami menyediakan paketan Laundry Kiloan. Kami juga menerima Laundry dengan jumlah satuan atau /pcs.</p>
              <a class="btn btn-block btn-primary mt-3" href="<?php echo base_url(); ?>pesanan/pesan">Pesan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center bg-warning" id="cekstatus">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-lg-6">
          <h1> Cek Status Pesanan</h1>
          <p class="mb-7">coba cek status pesanan anda segera, agar anda tidak terlewatkan info tentang status pesanan anda sudah sampai tahap dimana. dan jangan sampai lupa juga mengambil pesanan anda</p>
          <form class="form-inline d-flex justify-content-center" method="post" action="<?php echo base_url(); ?>pesanan/">
            <div class="input-group"> <input type="text" name="id_pesanan" class="form-control form-control-lg bg-light" placeholder="Masukan Kode Pesanan" id="form3">
              <div class="input-group-append"> <button class="btn btn-dark" type="submit">Cari</button> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3 bg-dark" id="kontak">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-6 p-3">
          <h5> <b>Main</b> </h5>
          <ul class="list-unstyled">
            <li> <a href="#">Beranda</a> </li>
            <li> <a href="#">Cek Status Pesanan</a> </li>
            <li> <a href="#">Pesan</a> </li>
            <li> <a href="#">Kontak</a> </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 p-3">
          <h5> <b>About</b> </h5>
          <p class="mb-0"> Home Laundry adalah jasa laundry baju kiloan online yang terdekat di Jakarta Timur.&nbsp;</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0 mt-2">© 2019 Home Laundry. All rights reserved</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Features -->
  <!-- Features -->
  <!-- Carousel reviews -->
  <!-- Call to action -->
  <!-- Footer -->
  <!-- JavaScript dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="<?php echo base_url(); ?>assets/js/smooth-scroll.js" style=""></script>
</body>

</html>