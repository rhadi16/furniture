<?php 
  $pelanggan = $_SESSION['user'];
  $qry = "SELECT
            *
          FROM pelanggan WHERE id_pelanggan = '$pelanggan'";
?>

<div class="head-dt pb-2 mt-4">
  <h5>Detail Profile</h5>
</div>

<div class="datatable">
  <table id="example" class="table table-striped align-middle text-center" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Email</th>
        <th>Nama</th>
        <th>Nomor HP/WA</th>
        <th>Alamat</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        $query = mysqli_query($mysqli, $qry);
        while ($data = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['nama_pelanggan'] ?></td>
            <td><?php echo $data['no_hp'] ?></td>
            <td><?php echo $data['asal_kota'].', '.$data['alamat'] ?></td>
            <td>
              <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit-profile<?php echo $data['id_pelanggan']; ?>">Edit</button>
            </td>
          </tr>

          <!-- Modal Edit Profile -->
          <div class="modal fade" id="edit-profile<?php echo $data['id_pelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                </div>
                <form action="func/profile_func.php?action=update" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan'] ?>">
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" required placeholder="Email" value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="hidden" name="password_lama" value="<?php echo $data['password'] ?>">
                      <input type="password" class="form-control" name="password" placeholder="Password Baru">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="nama_pelanggan" required placeholder="Nama" value="<?php echo $data['nama_pelanggan'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="no_hp" required placeholder="Nomor HP/WA" value="<?php echo $data['no_hp'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="asal_kota" required placeholder="Asal Kota" value="<?php echo $data['asal_kota'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="alamat" required placeholder="Alamat" value="<?php echo $data['alamat'] ?>">
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
        <th>Email</th>
        <th>Nama</th>
        <th>Nomor HP/WA</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>