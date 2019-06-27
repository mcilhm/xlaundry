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
			<h1 class="page-header">Add Bahan</h1>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>admin/BahanController/addproses" method="post">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Bahan</label>
									<input class="form-control" placeholder="Nama Bahan" name="namabahan">
								</div>
								<div class="form-group">
									<label>Harga Kiloan</label>
									<input class="form-control" placeholder="Harga Kiloan" name="hargakiloan">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Harga Satuan</label>
									<input class="form-control" placeholder="Harga Satuan" name="hargasatuan">
								</div>
								<div class="form-group">
									<label>Status Bahan</label>
									<select class="form-control" name="status">
										<option>Select</option>
										<option value="0">Tidak Aktif</option>
										<option value="1">Aktif</option>
									</select>
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