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
				<h1 class="page-header">Pesanan</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="notifikasi" style="padding: 10px 15px;"><?php echo $this->session->flashdata('notifikasi'); ?></div>
						<div class="panel-heading">
							Data Table 
							<a href="<?php echo base_url(); ?>admin/pesanan/add"><button type="button" class="btn btn-primary pull-right">Tambah Baru</button></a>
						</div>
						<div class="panel-body">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Booking</th>
										<th>Nama Pemesan</th>
										<th>No Telp Pemesan</th>
										<th>Email Pemesan</th>
										<th>Pengiriman</th>
										<th>Tipe Pesanan</th>
										<th>Total Harga</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 0;
										foreach ($pesanan->result() as $items) { 
										$no++;
									?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $items->id_pesanan; ?></td>
											<td><?php echo $items->nama_pemesan; ?></td>
											<td><?php echo $items->telepon_pemesan; ?></td>
											<td><?php echo $items->email_pemesan; ?></td>
											<td><?php echo $items->nama_pengiriman; ?></td>
											<td><?php echo $items->tipe_pesanan == 0 ? 'Kiloan' : 'Satuan'; ?></td>
											<td><?php echo $items->total_harga; ?></td>
											<td>
												<a href="<?php echo base_url(); ?>admin/pesanan/detail/<?php echo $items->id_pesanan; ?>"><button type="button" class="btn btn-danger btn-sm">detail</button></a>
												<select class="form-control" <?php if($items->status_pesanan == 3){ echo 'disabled'; } ?> name="status" id="status-<?php echo $no;?>" onChange="updatestatus(this, '<?php echo $items->id_pesanan; ?>');">
													<option>Select</option>
													<option value="0" <?php if($items->status_pesanan == 0){ echo 'selected'; } ?>>Antrian</option>
													<option value="1" <?php if($items->status_pesanan == 1){ echo 'selected'; } ?>>Proses Cuci</option>
													<option value="2" <?php if($items->status_pesanan == 2){ echo 'selected'; } ?>>Proses Setrika</option>
													<option value="3" <?php if($items->status_pesanan == 3){ echo 'selected'; } ?>>Sudah Selesai</option>
												</select>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
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
		$(document).ready(function() {
			$('#example').DataTable();
		});
		
		function updatestatus(selected, id_pesanan)
		{
			var selectedStatus = $(selected).children("option:selected").val();
			
			$.ajax({ /* THEN THE AJAX CALL */
				type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
				url: "<?php echo base_url(); ?>admin/pesanan/updateproses/" + id_pesanan , /* PAGE WHERE WE WILL PASS THE DATA */
				data: "status_pesanan=" + selectedStatus, /* THE DATA WE WILL BE PASSING */
				success: function(result){ /* GET THE TO BE RETURNED DATA */
					document.location.reload(true);
				}
			});
		}
	</script>
</body>

</html>
