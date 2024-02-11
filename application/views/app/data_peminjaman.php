<style>
  td {
    font-weight: normal;
  }
</style>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-users"></i> Data Peminjaman Aset</h3>
        </div>
        <div class="box-body">
          <button type="submit" class="btn btn-primary" id="cetakqr">Cetak QR Aset</button>
          <form method="post" action="<?= base_url('app/cetakqr') ?>" target="_blank">
            <button type="submit" class="btn btn-primary" id="actklik" style="display:none">Cetak QR</button>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Kode Aset</th>
                      <th>Nama Peminjam</th>
                      <th>Unit Peminjam</th>
                      <th>Jml Barang</th>
                      <th>Tgl Peminjaman</th>
                      <th>Tgl Pengembalian</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($pinjam as $data) { ?>
                      <tr>
                        <td>
                          <div class="form-check">
                            <input required class="form-check-input" name="kodeqr[]" type="checkbox" value="<?= $data['kode'] ?>" id="defaultCheck1">
                          </div>
                        </td>
                        <td><?= $no++ ?></td>
                        <td><?= $data['kode'] ?></td>
                        <td><?= $data['nama_peminjam'] ?></td>
                        <td><?= $data['unit_peminjam'] ?></td>
                        <td><?= $data['jml_barang'] ?></td>
                        <td><?= $data['tgl_peminjaman'] ?></td>
                        <td><?= $data['tgl_pengembalian'] ?></td>
                        <td>
                          <?php
                          if ($data['status'] == 0) {
                            echo "<p class='text-danger'>Belum dikembalikan</p>";
                          }
                          ?>
                        </td>
                        <td>
                          <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</a>
                          <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModaldetail<?= $data['id'] ?>"><i class="fa fa-pen"></i> Detail</a>
                          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>No</th>
                      <th>Kode</th>
                      <th>Kode Aset</th>
                      <th>Nama Peminjam</th>
                      <th>Unit Peminjam</th>
                      <th>Jml Barang</th>
                      <th>Tgl Peminjaman</th>
                      <th>Tgl Pengembalian</th>
                      <th>Status</th>
                      <th>Opsi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {
    $("#cetakqr").click(function () {
      $("#actklik").trigger('click');
    });
  });
</script>
