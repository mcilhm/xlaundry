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
			<h1 class="page-header">Mesin Cuci</h1>
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="notifikasi" style="padding: 10px 15px;"><?php echo $this->session->flashdata('notifikasi'); ?></div>
					<div class="panel-heading">
						Data Table 
						<a href="<?php echo base_url(); ?>admin/mesincuci/add"><button type="button" class="btn btn-primary pull-right">Tambah Baru</button></a>
					</div>
					<div class="panel-body">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
					        <thead>
					            <tr>
					                <th>No</th>
					                <th>Nama Mesin Cuci</th>
					                <th>Maksimal Berat</th>
					                <th>Status Mesin Cuci</th>
					                <th>Aksi</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php 
					        		$no = 0;
					        		foreach ($mesincuci->result() as $items) { 
					        		$no++;
					        	?>
						            <tr>
						                <td><?php echo $no; ?></td>
						                <td><?php echo $items->nama_mesin_cuci; ?></td>
						                <td><?php echo $items->maksimal_berat; ?></td>
						                <td>
						                	<?php 
						                		if($items->status_mesin_cuci == '0'){
						                			echo "<span class='label label-success'>Tersedia</span>";
						                		}
						                		elseif($items->status_mesin_cuci == '1'){
						                			echo "<span class='label label-warning'>Dipakai</span>";
						                		} 
						                		elseif ($items->status_mesin_cuci == '2') {
						                			echo "<span class='label label-danger'>Rusak</span>";
						                		}
						                	?>

						                </td>
						                <td>
						                	<a href="<?php echo base_url(); ?>admin/mesincuci/update/<?php echo $items->id_mesin_cuci; ?>"><button type="button" class="btn btn-warning btn-sm">Ubah</button></a>
						                	<a href="<?php echo base_url(); ?>admin/mesincuci/delete/<?php echo $items->id_mesin_cuci; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
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