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
			<h1 class="page-header">Add Paketan Detail</h1>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<form action="<?php echo base_url(); ?>admin/PaketanDetailController/addproses" method="post">
							<div class="col-md-6">
								<div class="form-group">
									<label>Paketan</label>
									<select class="form-control" name="id_paketan">
										<option>Select</option>
										<?php foreach ($paketan->result() as $items) { ?>
											<option value="<?php echo $items->id_paketan; ?>"><?php echo $items->nama_paketan; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Minimal Berat</label>
									<input class="form-control" placeholder="Minimal Berat" name="minimal_berat">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Bahan</label>
									<select class="form-control" name="id_bahan">
										<option>Select</option>
										<?php foreach ($bahan->result() as $items) { ?>
											<option value="<?php echo $items->id_bahan; ?>"><?php echo $items->nama_bahan; ?></option>
										<?php } ?>
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