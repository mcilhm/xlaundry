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


<!-- <body style="background-image: url(https://pingendo.com/site-assets/cover.jpg);	background-position: top left;	background-size: 100%;	background-repeat: repeat;"> -->
<body class="">
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
                                    <h1 class="display-4">Form Pemesanan</h1>
                                    <br>
                                    <form id="c_form-h" class="" action="<?php echo base_url();?>pesanan/preview" method="post">
                                        <div class="form-group row">
                                            <div class="col-10 col-md-12">
                                                <div class="form-group row"><label class="col-2">Nama</label>
                                                    <div class="col-10"><input type="text" name="namapemesan" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $this->session->logged_in_user ? empty($pemesan) ? null : $pemesan->nama_pemesan : null ?>"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10 col-md-12">
                                                        <div class="form-group row"><label class="col-2">No Telpon</label>
                                                            <div class="col-10"><input type="text" name="teleponpemesan" class="form-control" id="inlineFormInput" placeholder="Jane Doe" value="<?php echo $this->session->logged_in_user ? empty($pemesan) ? null : $pemesan->telepon_pemesan : null ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Email</label>
                                            <div class="col-10"><input type="email" name="emailpemesan" class="form-control" id="inlineFormInput" placeholder="Email" value="<?php echo $this->session->logged_in_user ? empty($pemesan) ? null : $pemesan->email_pemesan : null ?>"></div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Alamat</label>
                                            <div class="col-10"><textarea name="alamatpemesan" class="form-control" id="exampleTextarea" rows="3"><?php echo $this->session->logged_in_user ? empty($pemesan) ? null : $pemesan->alamat_pemesan : null ?></textarea></div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Jenis Pengiriman</label>
                                            <div class="col-10">
                                                <select name="idpengiriman" class="custom-select">
                                                    <option selected="" value="">Open this select menu</option>
                                                    <?php
                                                    foreach ($pengiriman->result() as $itemspengiriman) {
                                                        ?>
                                                        <option value="<?php echo $itemspengiriman->id_pengiriman; ?>">
                                                            <?php echo $itemspengiriman->nama_pengiriman; ?> (Durasi <?php echo $itemspengiriman->lama_pengiriman; ?> jam)
                                                        </option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Jenis Paketan</label>
                                            <div class="col-10">
                                                <select name="idpaketan" class="custom-select">
                                                    <option selected="" value="">Open this select menu</option>
                                                    <?php
                                                    foreach ($paketan->result() as $itemspaketan) {
                                                        ?>
                                                        <option value="<?php echo $itemspaketan->id_paketan; ?>"><?php echo $itemspaketan->nama_paketan; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Jenis Promo</label>
                                            <div class="col-10">
                                                <select name="idpromo" class="custom-select">
                                                    <option selected="" value="">Open this select menu</option>
                                                    <?php
                                                    foreach ($promo->result() as $itemspromo) {
                                                        ?>
                                                        <option value="<?php echo $itemspromo->id_promo; ?>"><?php echo $itemspromo->nama_promo; ?></option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-2">Tipe Pesanan</label>
                                            <div class="col-10"><select name="tipepesanan" class="custom-select">
                                                    <option value="0">Kiloan</option>
                                                    <option value="1">Satuan</option>
                                                </select></div>
                                        </div>
                                        <br>
                                        <h1 class="">Pemesanan Detail</h1>
                                        <br>
                                        <div class="detail" id="detail">
                                            <div class="form-group row"><label class="col-2">Bahan</label>
                                                <div class="col-10">
                                                    <select name="idbahan[]" class="custom-select">
                                                        <?php
                                                        foreach ($bahan->result() as $itemsbahan) {
                                                            ?>
                                                            <option value="<?php echo $itemsbahan->id_bahan; ?>|<?php echo $itemsbahan->nama_bahan; ?>"><?php echo $itemsbahan->nama_bahan; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-2">Jumlah <br><small>*sesuai dengan tipe pesanannya</small></label>
                                                <div class="col-10"><input type="number" name="jumlah[]" class="form-control" id="inlineFormInput"></div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-2"></label>
                                            <div class="col-10">
                                                <a class="btn btn-info" onclick="add_detail()">Tambah</a>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </form>
                                </div>
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
        
        <script type="text/javascript">
        var counter_detail = 1;

            function add_detail() {
                $(".detail").append('<div id="delete_detail' + counter_detail + '">' +
                    '<div class="form-group row">'+
                        '<label class="col-2">Bahan</label>'+
                        '<div class="col-10">'+
                            '<select name="idbahan[]" class="custom-select">'+
                                '<?php foreach ($bahan->result() as $itemsbahan) { ?>'+
                                    '<option value="<?php echo $itemsbahan->id_bahan; ?>|<?php echo $itemsbahan->nama_bahan; ?>"><?php echo $itemsbahan->nama_bahan; ?></option>'+
                                '<?php } ?>'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                    '<div class="form-group row"><label class="col-2">Jumlah <br><small>*sesuai dengan tipe pesanannya</small></label>'+
                        '<div class="col-10"><input type="number" name="jumlah[]" class="form-control" id="inlineFormInput"></div>'+
                    '</div>'+
                    '<div class="form-group row">'+
                        '<label class="col-1"></label>'+
                        '<div class="col-md-5">'+
                            '<a class="btn btn-danger" onclick="delete_detail('+counter_detail+')"><i class="ti-close"></i> Delete</a>'+
                        '</div>'+
                    '</div>'+
                '</div>');
                counter_detail++;
            }
            function delete_detail(no) {
                $('#delete_detail' + no).remove();
            }
        </script>
</body>

</html>