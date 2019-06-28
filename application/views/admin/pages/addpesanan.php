<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>HOME</span>Laundry</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Home </a></li>
			<li><a href="<?php echo base_url(); ?>admin/bahan"><em class="fa fa-calendar">&nbsp;</em> Data Bahan </a></li>
			<li><a href="<?php echo base_url(); ?>admin/pengiriman"><em class="fa fa-calendar">&nbsp;</em> Data Pengiriman </a></li>
			<li><a href="<?php echo base_url(); ?>admin/mesincuci"><em class="fa fa-calendar">&nbsp;</em> Data Mesin Cuci </a></li>
			<li><a href="<?php echo base_url(); ?>admin/promo"><em class="fa fa-calendar">&nbsp;</em> Data Promo </a></li>
			<li><a href="<?php echo base_url(); ?>admin/paketan"><em class="fa fa-calendar">&nbsp;</em> Data Paketan </a></li>
			<li><a href="<?php echo base_url(); ?>admin/paketan_detail"><em class="fa fa-calendar">&nbsp;</em> Data Paketan Detail</a></li>
			<li><a href="<?php echo base_url(); ?>admin/pengguna"><em class="fa fa-calendar">&nbsp;</em> Data Pengguna </a></li>
			<li><a href="<?php echo base_url(); ?>admin/pesanan"><em class="fa fa-calendar">&nbsp;</em> Data Pesanan </a></li>			
			<li><a href="<?php echo base_url(); ?>admin/LoginController/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->

	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Menu</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Pesanan</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Forms</div>
						<div class="panel-body">
							<form action="<?php echo base_url(); ?>admin/PesananController/addproses" method="post">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Nama</label>
											<input class="form-control" placeholder="Nama Pemesan" name="nama_pemesan">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label>Pengguna</label>
											<select name="id_pengguna" class="form-control">
												<option selected="" value="">Open this select menu</option>
												<?php
												foreach ($pengguna->result() as $itemspengguna) {
													?>
													<option value="<?php echo $itemspengguna->id_pengguna; ?>"><?php echo $itemspengguna->id_pengguna; ?></option>
												<?php
											}
											?>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>No Telpon</label>
											<input class="form-control" placeholder="No Telp Pemesan" name="telepon_pemesan">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" placeholder="Email Pemesan" name="email_pemesan">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Alamat</label>
											<textarea class="form-control" name="alamat_pemesan"></textarea>
										</div>
									</div>

									
									<div class="col-md-4">
										<div class="form-group">
											<label>Pengiriman</label>
											<select name="id_pengiriman" class="form-control">
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
									<div class="col-md-4">
										<div class="form-group">
											<label>Paketan</label>
											<select name="id_paketan" class="form-control">
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
									<div class="col-md-4">
										<div class="form-group">
											<label>Promo</label>
											<select name="id_promo" class="form-control">
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
									<div class="col-md-4">
										<div class="form-group">
											<label>Tipe Pesanan</label>
											<select class="form-control" name="tipe_pesanan">
												<option selected="" value="">Open this select menu</option>
												<option value="0">Kiloan</option>
												<option value="1">Satuan</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<h2 style="margin-left:10px;">Pemesanan Detail</h1>
									<div class="detail" id="detail" >
										<div class="col-md-4">
											<div class="form-group">
												<label>Bahan</label>
												<select name="idbahan[]" class="form-control">
													<option selected="">Open this select menu</option>
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
										<div class="col-md-5">
											<div class="form-group">
												<label>Jumlah <small>*sesuai dengan tipe pesanannya</small></label>
												<input type="number" name="jumlah[]" min="0" class="form-control" id="inlineFormInput">
											</div>
										</div>
									</div>
								</div>
								
								<div class="row" style="margin-bottom:30px;">
									<div class="col-md-3">
										<a class="btn btn-info" class="form-control" onclick="add_detail()">Tambah</a>
									</div>
								</div>

								<!-- <div class="col-md-12"> -->
									<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
								<!-- </div> -->
							</form>
						</div>
					</div><!-- /.panel-->
				</div>
			</div><!--/.row-->
		</div>
		
		

		<div class="col-sm-12">
			<p class="back-link">Alamat : Perum BSI Cicadas Gunung Putri Bogor <a href="https://www.medialoot.com">085885896846</a></p>
		</div>
	</div>	<!--/.main-->

	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	<script>
	var counter_detail = 1;

	function add_detail() {
		$(".detail").append('<div id="delete_detail' + counter_detail + '">' +
			
			'<div class="col-md-4">'+
				'<div class="form-group">'+
					'<label>Bahan</label>'+
					'<select name="idbahan[]" class="form-control">'+
						'<option selected="">Open this select menu</option>'+
						'<?php foreach ($bahan->result() as $itemsbahan) { ?>'+
							'<option value="<?php echo $itemsbahan->id_bahan; ?>"><?php echo $itemsbahan->nama_bahan; ?></option>'+
						'<?php } ?>'+
					'</select>'+
				'</div>'+
			'</div>'+
			'<div class="col-md-5">'+
				'<div class="form-group">'+
					'<label>Jumlah <small>*sesuai dengan tipe pesanannya</small></label>'+
					'<input type="number" min="0" name="jumlah[]" class="form-control" id="inlineFormInput">'+
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

