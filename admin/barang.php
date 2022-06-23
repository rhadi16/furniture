<?php 
  $qry2 = "SELECT
            *
          FROM tb_barang";
?>

<div class="head-dt pb-2 mt-4">
  <h5>Daftar Barang</h5>
  <button type="button" class="btn btn-success df" data-bs-toggle="modal" data-bs-target="#tambah-barang">Tambah Barang</button>
</div>

<!-- Modal Tambah Anggota -->
<div class="modal fade" id="tambah-barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Barang Baru</h5>
      </div>
      <form action="func/barang_func.php?action=insert" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Nama Barang">
          </div>
          <div class="mb-3">
            <input type="number" class="form-control" id="harga_barang" name="harga_barang" required placeholder="Harga Barang">
          </div>
          <div class="mb-3">
            <input type="number" class="form-control" id="berat" name="berat" required placeholder="Bobot Barang">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="desk_barang" name="desk_barang" required placeholder="Deskripsi Barang">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="stok" name="stok" required placeholder="Stok Barang">
          </div>
          <div>
            <input class="form-control" type="file" id="formFile" name="file_name" id="foto">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="datatable">
  <table id="example2" class="table table-striped align-middle text-center" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Bobot</th>
        <th>Deskripsi</th>
        <th>Stok</th>
        <th>Gambar</th>
        <th>Action</th>
      </tr>
    <tbody>
      <?php
        $no = 1;
        $query2 = mysqli_query($mysqli, $qry2);
        while ($data2 = mysqli_fetch_array($query2)) {
      ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data2['nama_barang'] ?></td>
            <td>Rp. <?php echo number_format($data2['harga_barang'],0,",",".") ?></td>
            <td><?php echo $data2['berat'] ?> Kg</td>
            <td><?php echo $data2['desk_barang'] ?></td>
            <td><?php echo $data2['stok'] ?></td>
            <td><img src="foto_brg/<?php echo $data2['foto'] ?>" class="img-thumbnail" alt="<?php echo $data2['foto'] ?>"></td>
            <td>
              <button type="button" class="btn btn-danger mb-1 conf-del<?php echo $data2['id_barang']; ?>">Hapus</button>
              <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit-barang<?php echo $data2['id_barang']; ?>">Edit</button>
            </td>
          </tr>

          <script type="text/javascript">
            $('.conf-del<?php echo $data2['id_barang']; ?>').on('click', function(e) {
              Swal.fire({
                title: 'Anda Yakin?',
                text: "Ingin Menghapus Barang <?php echo $data2['nama_barang']; ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "<?php echo 'func/barang_func.php?action=delete&id_barang='.$data2['id_barang'].'&foto='.$data2['foto'] ?>";
                }
              })
            });
          </script>

          <!-- Modal Edit Anggota -->
          <div class="modal fade" id="edit-barang<?php echo $data2['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                </div>
                <form action="func/barang_func.php?action=update" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <input type="hidden" id="id_barang" name="id_barang" value="<?php echo $data2['id_barang'] ?>">
                    <div class="mb-3">
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Nama Barang" value="<?php echo $data2['nama_barang'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="harga_barang" name="harga_barang" required placeholder="Harga Barang" value="<?php echo $data2['harga_barang'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="berat" name="berat" required placeholder="Bobot Barang" value="<?php echo $data2['berat'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="desk_barang" name="desk_barang" required placeholder="Deskripsi Barang" value="<?php echo $data2['desk_barang'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="stok" name="stok" required placeholder="Stok Barang" value="<?php echo $data2['stok'] ?>">
                    </div>
                    <div>
                      <input class="form-control" type="file" id="formFile" name="file_name" id="foto">
                      <input type="hidden" name="file_name_sebelum" value="<?php echo $data2['foto']; ?>">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      <?php } ?>
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Bobot</th>
        <th>Deskripsi</th>
        <th>Stok</th>
        <th>Gambar</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>