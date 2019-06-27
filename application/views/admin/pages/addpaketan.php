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
			<h1 class="page-header">Add Paketan</h1>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>admin/PaketanController/addproses" method="post">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama Paketan</label>
									<input class="form-control" placeholder="Nama Paketan" name="nama_paketan">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Total Harga Paketan</label>
									<input class="form-control" placeholder="Total Harga Paketan" name="total_harga_paketan">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Tipe Potongan Promo</label>
									<select class="form-control" name="tipe_potongan_paketan">
										<option>Select</option>
										<option value="0">Rupiah</option>
										<option value="1">Persen</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Potongan Harga Paketan</label>
									<input class="form-control" placeholder="Potongan Harga Paketan" name="potongan_harga_paketan">
								</div>
							</div>
							
							<div class="col-md-12">
								<button type="submit" name="submit" class="btn btn-primary">Tambah</button>
							</div>
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