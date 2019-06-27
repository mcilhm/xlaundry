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
			<h1 class="page-header">Add Promo</h1>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>admin/PromoController/addproses" method="post">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nama Promo</label>
									<input class="form-control" placeholder="Nama Promo" name="nama_promo">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Potongan Harga Promo</label>
									<input class="form-control" placeholder="Potongan Harga Promo" name="potongan_harga_promo">
								</div>
								<div class="form-group">
									<label>Tipe Potongan Promo</label>
									<select class="form-control" name="tipe_potongan_promo">
										<option>Select</option>
										<option value="0">Rupiah</option>
										<option value="1">Persen</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tipe Promo</label>
									<select class="form-control" name="tipe_promo">
										<option>Select</option>
										<option value="0">Semua</option>
										<option value="1">Pelanggan</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Waktu Mulai Promo</label>
									<input type="datetime-local" class="form-control" placeholder="Waktu Mulai Promo" name="waktu_mulai_promo">
								</div>
								<div class="form-group">
									<label>Waktu Akhir Promo</label>
									<input type="datetime-local" class="form-control" placeholder="Waktu Akhir Promo" name="waktu_akhir_promo">
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