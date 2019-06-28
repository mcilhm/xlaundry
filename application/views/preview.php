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


<body style="background-image: url(https://pingendo.com/site-assets/cover.jpg);	background-position: top left;	background-size: 100%;	background-repeat: repeat;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-info" style="">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Home Laundry</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="<?php echo base_url(); ?>#beranda">Beranda</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="<?php echo base_url(); ?>#pesan">Pesan</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="<?php echo base_url(); ?>#cekstatus">Cek Status Pesanan</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="<?php echo base_url(); ?>#kontak">Kontak</a>
                    </li>
                    <?php
                    if (!$this->session->logged_in_user) {
                        ?>
                    </ul>
                    <a class="btn navbar-btn mx-2 btn-primary shadowed" href="<?php echo base_url(); ?>login/">Masuk</a>
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
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="notifikasi"><?php echo $this->session->flashdata('notifikasi'); ?></div>
                                <div class="col-md-12">
                                    <h1 class="display-4">Konfirmasi Pemesanan</h1>
                                    <br>
                                    <form id="c_form-h" class="" action="<?php echo base_url();?>pesanan/add" method="post">
                                        <div class="form-group row"><label class="col-2">Nama</label>
                                            <div class="col-10"><input type="text" name="namapemesan" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $nama_pemesan; ?>" readonly></div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">No Telpon</label>
                                            <div class="col-10"><input type="text" name="teleponpemesan" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $telepon_pemesan; ?>" readonly></div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Email</label>
                                            <div class="col-10"><input type="email" value="<?php echo $email_pemesan; ?>" readonly name="emailpemesan" class="form-control" id="inlineFormInput" placeholder="Email"></div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Alamat</label>
                                            <div class="col-10"><textarea name="alamatpemesan" class="form-control" id="exampleTextarea" rows="3" readonly><?php echo $alamat_pemesan; ?></textarea></div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Ongkir</label>
                                            <div class="col-10"><input type="text" name="hargapengiriman" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $harga_pengiriman; ?>" readonly></div>
                                        </div>
                                        <input type="hidden" name="idpaketan" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $id_paketan; ?>" readonly>
                                        <input type="hidden" name="idpromo" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $id_promo; ?>" readonly>
                                        <input type="hidden" name="idpengiriman" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $id_pengiriman; ?>" readonly>
                                        <input type="hidden" name="tipepesanan" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $tipe_pesanan; ?>" readonly>

                                        
                                        <h3 class="display-8">Pesanan Detail</h3>
                                        <?php
                                        $i = 0;
                                        for ($i=0; $i < count($id_bahan); $i++) {
                                        ?> 
                                        
                                        <div class="form-group row"><label class="col-2">Bahan <?php echo ($i + 1);?> </label>
                                            <input type="hidden" name="idbahan[]" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $id_bahan[$i]; ?>" readonly>
                                            <div class="col-4"><input type="text" name="namabahan[]" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $nama_bahan[$i]; ?>" readonly></div>
                                            <label class="col-2">Jumlah</label>
                                            <div class="col-2"><input type="text" name="jumlah[]" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $jumlah_bahan[$i]; ?>" readonly></div>
                                        </div>

                                        <?php    # code...
                                        }
                                        ?>
                                        <br><br>
                                        <h3 class="display-7" style="font-weight:800;" >Total Harga: <?php echo $data_total_harga; ?></h3>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Script: Smooth scrolling between anchors in the same page -->
        <script src="<?php echo base_url(); ?>assets/js/smooth-scroll.js" style=""></script>
</body>

</html>