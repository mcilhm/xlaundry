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
						<form action="<?php echo base_url(); ?>admin/BahanController/updateproses/<?php echo $idbahan; ?>" method="post">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Bahan</label>
									<input class="form-control" placeholder="Nama Bahan" name="namabahan" value="<?php echo $rowbahan->nama_bahan; ?>">
								</div>
								<div class="form-group">
									<label>Harga Kiloan</label>
									<input class="form-control" placeholder="Harga Kiloan" name="hargakiloan" value="<?php echo $rowbahan->harga_kiloan; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Harga Satuan</label>
									<input class="form-control" placeholder="Harga Satuan" name="hargasatuan" value="<?php echo $rowbahan->harga_satuan; ?>">
								</div>
								<div class="form-group">
									<label>Status Bahan</label>
									<select class="form-control" name="status">
										<option>Select</option>
										<option value="0" <?php if($rowbahan->status_bahan == 0){ echo 'selected'; } ?>>Tidak Aktif</option>
										<option value="1" <?php if($rowbahan->status_bahan == 1){ echo 'selected'; } ?>>Aktif</option>
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