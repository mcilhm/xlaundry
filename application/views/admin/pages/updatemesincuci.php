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
			<h1 class="page-header">Update Bahan</h1>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>admin/MesincuciController/updateproses/<?php echo $idmesincuci; ?>" method="post">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Mesin Cuci</label>
									<input class="form-control" placeholder="Nama Mesin Cuci" name="namamesincuci" value="<?php echo $row->nama_mesin_cuci; ?>">
								</div>
								<div class="form-group">
									<label>Maksimal Berat</label>
									<input class="form-control" placeholder="Maksimal Berat" name="maksimalberat" value="<?php echo $row->maksimal_berat; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Status Mesin Cuci</label>
									<select class="form-control" name="status">
										<option>Select</option>
										<option value="0" <?php if($row->status_mesin_cuci == 0){ echo 'selected'; } ?>>Tersedia</option>
										<option value="1" <?php if($row->status_mesin_cuci == 1){ echo 'selected'; } ?>>Dipakai</option>
										<option value="2" <?php if($row->status_mesin_cuci == 2){ echo 'selected'; } ?>>Rusak</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
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