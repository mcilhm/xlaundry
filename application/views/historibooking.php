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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- Script: Make my navbar transparent when the document is scrolled to top -->
    <script src="<?php echo base_url(); ?>assets/js/navbar-ontop.js"></script>
    <!-- Script: Animated entrance -->
    <script src="<?php echo base_url(); ?>assets/js/animate-in.js"></script>
</head>


<body class="bg-info">
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

                                <?php
                                if ($histori->num_rows() == 0) echo "Tidak ada data";
                                else {
                                    ?>
                                    <table id="example" class="table table-stripe d table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pesanan</th>
                                                <th>Nama Pemesan</th>
                                                <th>Estimasi Pesanan</th>
                                                <th>Status Pesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            foreach ($histori->result() as $items) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $items->id_pesanan; ?></td>
                                                    <td><?php echo $items->nama_pemesan; ?></td>
                                                    <td><?php echo $items->estimasi_pesanan; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($items->status_pesanan == '0') {
                                                            echo "<span class='label label-info'>Antrian</span>";
                                                        } elseif ($items->status_pesanan == '1') {
                                                            echo "<span class='label label-primary'>Proses Cuci</span>";
                                                        } elseif ($items->status_pesanan == '2') {
                                                            echo "<span class='label label-success'>Proses Setrika</span>";
                                                        } elseif ($items->status_pesanan == '3') {
                                                            echo "<span class='label label-success'>Sudah Siap</span>";
                                                        }
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        window.onload = function() {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>
</body>

</html>