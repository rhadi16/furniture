<?php 
  $user = $_SESSION['user'];
  $qry3 = "SELECT
            *
          FROM check_out
          WHERE id_pelanggan = $user AND status_pesanan != 'Sampai'";
?>

<div class="head-dt pb-2 mt-4">
  <h5>Daftar Barang Belanja Anda</h5>
</div>

<div class="datatable">
  <table id="example3" class="table table-striped align-middle text-center" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>No Check Out</th>
        <th>Barang</th>
        <th>Ongkir</th>
        <th>Total Harga</th>
        <th>Tanggal Pesan</th>
        <th>Status Pesanan</th>
        <th>Action</th>
      </tr>
    <tbody>
      <?php
        $no = 1;
        $query3 = mysqli_query($mysqli, $qry3);
        while ($data3 = mysqli_fetch_array($query3)) {
      ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data3['id_checkout'] ?></td>
            <td>
            <?php 
              $id_barang = explode("||", $data3['id_barang']);

              for ($i=0; $i < count($id_barang)-1; $i++) { 
                $brg[$i] = mysqli_query($mysqli, "SELECT * FROM tb_barang WHERE id_barang = '$id_barang[$i]'");
                $dt_brg[$i] = mysqli_fetch_array($brg[$i]);
                echo $dt_brg[$i]['nama_barang'].'<br>';
              }
            ?>
            </td>
            <td>Rp. <?php echo number_format($data3['ongkir'],0,",",".") ?></td>
            <td>Rp. <?php echo number_format($data3['total_harga'],0,",",".") ?></td>
            <td><?php echo datetimeFormat::TanggalIndo($data3['tgl_pesan']); ?></td>
            <td><?php echo $data3['status_pesanan'] ?></td>
            <td>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-tf<?php echo $data3['id_checkout']; ?>">Edit</button>
            </td>
          </tr>

          <!-- Edit foto tf -->
          <div class="modal fade" id="edit-tf<?php echo $data3['id_checkout']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Bukti Transfer</h5>
                </div>
                <form action="func/checkout_func.php?action=update" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <input type="hidden" readonly class="form-control" name="id_checkout" value="<?php echo $data3['id_checkout'] ?>">
                    <div class="mb-3 text-center">
                      <img src="bukti_tf/<?php echo $data3['foto_bukti_tf'] ?>" class="img-thumbnail img-fluid" alt="<?php echo $data3['foto_bukti_tf'] ?>">
                    </div>
                    <div>
                      <label class="form-label">Bukti Transfer</label>
                      <input class="form-control" type="file" id="formFile" name="file_name" id="foto" required>
                      <input type="hidden" name="file_name_sebelum" value="<?php echo $data3['foto_bukti_tf']; ?>">
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
        <th>No Check Out</th>
        <th>Barang</th>
        <th>Ongkir</th>
        <th>Total Harga</th>
        <th>Tanggal Pesan</th>
        <th>Status Pesanan</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>