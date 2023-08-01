<?php
$id = $_GET['kode'];

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_temp WHERE id =" . $_GET['kode'] . " ";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

if ($data_cek['sex'] === 'L') {
    $harga = 3650000;
} else {
    $harga = 3700000;
}

// $id = $_GET['kode'];

// if (isset($_GET['submit'])) {
//     $query = "DELETE FROM tb_siswa WHERE `tb_siswa`.`id_siswa` = $id";
// }

?>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">Pembayaran</h5>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <h6 class="card-title">Nominal: <?php echo rupiah($harga) ?> </h6>
                        <p class="card-text">Konfirmasi pembayaran uang pendaftaran dengan nama: <?= $data_cek['name'] ?></p>
                        <button type="submit" name="submit" class="btn btn-success">Bayar</button>
                        <a href="?page=data_daftar" title="Kembali" class="btn btn-secondary">Batal</a>
                        <!-- <a href="?page=data_anak" class="btn btn-success"></a> -->
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    //mulai proses simpan data
    // $sql_simpan = "INSERT INTO tb_siswa (id_guru, periode, jam, nominal) VALUES (
    //     '" . $_POST['nama'] . "',
    //     '" . $_POST['bulan'] . "',
    //     '" . $_POST['jam_mengajar'] . "',
    //     '" . $_POST['gaji'] . "')";
    // $query_simpan = mysqli_query($koneksi, $sql_simpan);

    $sql_simpan = "INSERT INTO `tb_siswa` (`id_siswa`, `nama_lengkap`, `jenis_klm`, `tempat_lahir`, `tgl_lhr`, `alamat`, `status`, `tpa`, `status_tpa`) VALUES (
        NULL, 
        '" . $data_cek['name'] . "', 
        '" . $data_cek['sex'] . "', 
        '" . $data_cek['tempat'] . "', 
        '" . $data_cek['tanggal'] . "', 
        '" . $data_cek['alamat'] . "', 
        '" . 'aktif' . "', 
        '" . $data_cek['id'] . "', 
        '" . $data_cek['bayar'] . "')";

    $sql_delete = "DELETE FROM tb_temp WHERE `tb_temp`.`id` = $id";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    $query_delete = mysqli_query($koneksi, $sql_delete);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Pembayaran Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_daftar';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Pembayaran Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_daftar';
          }
      })</script>";
    }
}

?>