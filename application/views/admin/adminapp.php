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

	<?php $this->load->view('admin/pages/' . $content); ?>

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
					
				}
			});
		}
	</script>

	
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