<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pendaftaran
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=form_tambah_daftar" class="btn btn-primary">
					<i class="fas fa-plus-square"></i> Tambah Data</a>
				<!-- <a href="" class="btn btn-success">Import Data</a> -->
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="20%">Nama Pendaftar</th>
						<th width="10%">Jenis kelamin</th>
						<th width="10%">Tanggal Lahir</th>
						<th width="25%">Alamat</th>
						<th widht="30%">Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_temp");
					while ($data = $sql->fetch_assoc()) {
						if ($data['sex'] === 'L') {
							$jenkel = "Laki - Laki";
						} else {
							$jenkel = "Perempuan";
						}
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['name']; ?>
							</td>
							<td>
								<?php echo $jenkel; ?>
							</td>
							<td>
								<?php echo $data['tanggal']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<a href="?page=edit_daftar&kode=<?= $data['id']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"> Edit</i>
								</a>
								<a href="?page=delete_daftar&kode=<?= $data['id']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</a>
								<a href="?page=bayar&kode=<?= $data['id']; ?>" title="Ubah" class="btn btn-warning btn-sm">
									<i class="fas fa-money-bill-alt"> Bayar</i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->


	<?php

	if (isset($_GET['kode'])) {
		$sql_cek = "SELECT * FROM tb_siswa WHERE id_siswa =" . $_GET['kode'] . " ";
		$query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
	}
	?>

	<!-- <div class="modal fade" id="bayar-data<?= $data['id_siswa']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Pembayaran Uang Pendaftaran</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" value="" name="id">
                  <input type="hidden" value="" name="nama">
                  <input type="hidden" value="" name="harga">
                </div>
                 <p>Konfirmasi Pembayaran Uang pendaftaran Dengan Nama: <?= $data['nama']; ?> <strong></strong> senilai </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-money"></i> Bayar</button>
            </div>
        </div>
    </div>
</div> -->