<?php 
  $qry = "SELECT
            *
          FROM admin WHERE id_admin != 1";
?>

<div class="head-dt pb-2 mt-4">
  <h5>Daftar Admin</h5>
  <?php 
    if ($_SESSION['user'] == 1) {
  ?>
      <button type="button" class="btn btn-success df" data-bs-toggle="modal" data-bs-target="#tambah-admin">Tambah Data Admin</button>
<?php } ?>
</div>

<!-- Modal Tambah admin -->
<div class="modal fade" id="tambah-admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Admin Baru</h5>
      </div>
      <form action="func/admin_func.php?action=insert" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" required placeholder="Email Admin">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
          </div>
          <div>
            <input type="text" class="form-control" id="nama_admin" name="nama_admin" required placeholder="Nama Admin">
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
  <table id="example" class="table table-striped align-middle text-center" style="width:100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Email Admin</th>
        <th>Nama Admin</th>
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
            <td><?php echo $data['nama_admin'] ?></td>
            <td>
              <?php 
                if ($_SESSION['user'] == 1) {
              ?>
                <button type="button" class="btn btn-danger mb-1 conf-del<?php echo $data['id_admin']; ?>">Hapus</button>
                <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit-admin<?php echo $data['id_admin']; ?>">Edit</button>
            <?php } ?>
            </td>
          </tr>

          <script type="text/javascript">
            $('.conf-del<?php echo $data['id_admin']; ?>').on('click', function(e) {
              Swal.fire({
                title: 'Anda Yakin?',
                text: "Ingin Menghapus Data <?php echo $data['nama_admin']; ?>!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Yakin!'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "<?php echo 'func/admin_func.php?action=delete&id_admin='.$data['id_admin'] ?>";
                }
              })
            });
          </script>

          <!-- Modal Edit Anggota -->
          <div class="modal fade" id="edit-admin<?php echo $data['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                </div>
                <form action="func/admin_func.php?action=update" enctype="multipart/form-data" method="post">
                  <div class="modal-body">
                    <input type="hidden" value="<?php echo $data['id_admin'] ?>">
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" required placeholder="Email Admin" value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="mb-3">
                      <input type="hidden" name="password_lama" value="<?php echo $data['password'] ?>">
                      <input type="password" class="form-control" name="password" placeholder="Password Baru">
                    </div>
                    <div>
                      <input type="text" class="form-control" name="nama_admin" required placeholder="Nama Admin" value="<?php echo $data['nama_admin'] ?>">
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
        <th>Email Admin</th>
        <th>Nama Admin</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</div>