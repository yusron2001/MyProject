<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Form Pendaftaran</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama siswa" required>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tempat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama siswa" required>
                </div>
            </div> -->

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <select name="sex" id="sex" class="form-control">
                        <option>- Pilih -</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki-laki</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Lahir">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
            <a href="?page=data_daftar" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_temp (name, tempat, tanggal, alamat, sex, status, bayar) VALUES (
        '" . $_POST['nama'] . "',
        '" . $_POST['tempat'] . "',
        '" . $_POST['tanggal'] . "',
        '" . $_POST['alamat'] . "',
        '" . $_POST['sex'] . "',
        '" . '' . "',
        '" . '' . "')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_daftar';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_daftar';
          }
      })</script>";
    }
}
//selesai proses simpan data
?>