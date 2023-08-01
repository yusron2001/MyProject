<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_temp WHERE id ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-edit"></i> Ubah Pendaftaran</h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

         <input type='hidden' class="form-control" name="id" value="<?php echo $data_cek['id']; ?>" readonly/>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama siswa" required value="<?= $data_cek['name']; ?>">
                </div>
            </div>

            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tempat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama siswa" required value="<?= $data_cek['tempat']; ?>">
                </div>
            </div> -->

        <div class="form-group row">
             <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                 <select name="sex" id="sex" class="form-control" >
                  <option>- Pilih -</option>
                    <?php $option = $data_cek['sex'];?>
              <option <?php if ($option == 'P') {echo 'selected';} ?> value ="P">Perempuan</option>
              <option <?php if ($option == 'L') {echo 'selected';} ?> value="L">Laki-laki</option>
                </select>
                </div>
      </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir" value="<?= $data_cek['tempat']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Lahir" value="<?= $data_cek['tanggal']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $data_cek['alamat']; ?>">
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

 if (isset ($_POST['Simpan'])){
    $sql_ubah = "UPDATE tb_temp SET
        name='".$_POST['nama']."',
        tempat='".$_POST['tempat']."',
        tanggal='".$_POST['tanggal']."',
        alamat='".$_POST['alamat']."',
        sex='".$_POST['sex']."',
        status='aktif',
        bayar='0'
        WHERE id='".$_POST['id']."'";
        
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);


    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Update Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_daftar';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Update Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_daftar';
          }
      })</script>";
    }
}
//selesai proses simpan data
?>