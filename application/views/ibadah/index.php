<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-12 text-center">
					<h2 class="font-weight-bold">DATA IBADAH</h2>
					<a href="<?= base_url() ?>Dashboard"><i class="fas fa-long-arrow-alt-left"></i> KEMBALI</a>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-7 mx-auto">
					<div class="table-responsive">
                        <a href="<?= base_url('Ibadah/form')?>" class="btn btn-primary mb-1">Tambah Ibadah <i class="fas fa-plus"></i></a>
						<table id="<?= $idtable ?>" class="table table-sm table-bordered bg-white">
						<thead class="bg-info">
							<tr>
								<th class="text-center align-middle">NO</th>
								<th class="text-center align-middle">Judul</th>
								<th class="text-center align-middle">File</th>
								<th class="text-center align-middle">Tanggal</th>
								<th class="text-center align-middle">AKSI</th>
							</tr>
						</thead>
                        <?php $i = 1; ?>
						<?php foreach ($table as $row):?>
							<tbody>
								<tr >
									<td><?=$i++;?></td>
                                    <td><?=$row['liturgijudul']?></td>
									<td><?=$row['liturgifile'];?></td>
                                    <td><?=$row['liturgitgl']?></td>
									<td>
									
										<a href="<?= base_url('ibadah/hapus/' . $row['liturgiid']) ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')"><i class="fas fa-trash"></i></a>
									</td>
								</tr>
							</tbody>
						<?php endforeach;?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
