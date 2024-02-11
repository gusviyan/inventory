<style>
  td{
    font-weight: normal;
  }
</style>
<!-- Main content -->
<section class="content">


  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Peminjaman Aset</h3>

        </div>
        <div class="box-body">
          <hr>

          <form method="post" action="<?= base_url('app/cetak_peminjaman') ?>" target="_blank">
            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Surat Peminjaman</button>

            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <th>#</th>
                    <th>No</th>
                      <th>Kode</th>
                      <th>Nama Barang</th>
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
                  <?php foreach($pinjam as $data){ ?>
                    <tr>
                      <td>
                       <div class="form-check">
                        <input class="form-check-input" name="kode" type="checkbox" value="<?= $data['kode'] ?>" id="defaultCheck1">
                      </form>
                    </td>
                    <td><?= $no++ ?></td>
                    <td>
                      <?= $data['kode'] ?>
                    </td>
                    <td>
                      <?= $data['kode_aset'] ?>
                    </td>
                    <td><?= $data['nama_peminjam'] ?></td>
                    <td><?= $data['unit_peminjam'] ?></td>
                    <td><?= $data['jml_barang'] ?></td>
                    <td><?= $data['tgl_peminjaman'] ?></td>
                    <td><?= $data['tgl_pengembalian'] ?></td>
                    <td>
                      <?php 
                      if ($data['status'] == 0) {
                        echo "<p class='text-danger'>Belum dikembalikan</p>";
                      }else{
                        echo "<p class='text-success'>Sudah dikembalikan</p>";
                      }
                      ?>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</button>

                      <a href="#" class="btn btn-primary btn-sm my-3" data-toggle="modal" data-target="#exampleModaldetail<?= $data['id'] ?>"><i class="fa fa-eye"></i> Detail</a>

                      <a href="#" class="btn btn-info btn-sm mt-1" data-toggle="modal" data-target="#exampleModalstatus<?= $data['id'] ?>"><i class="fa fa-book"></i> Update Status</a>


                      <a href="#" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></a>


                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Peminjaman</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <form method="post" action="<?= base_url('app/act_editpinjam') ?>">

                          <input type="hidden" name="id" value="<?= $data['id']  ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" class="form-control" required="" value="<?= $data['nama_peminjam'] ?>">
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Unit Peminjam</label>
                            <textarea class="form-control" name="unit_peminjam" required> <?= $data['unit_peminjam'] ?></textarea>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Barang</label>
                            <input type="number" name="jml_barang" class="form-control" required="" value="<?= $data['jml_barang'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Tgl Peminjaman</label>
                            <input type="date" name="tgl_peminjaman" class="form-control" required="" value="<?= $data['tgl_peminjaman'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Tgl Pengembalian</label>
                            <input type="date" name="tgl_pengembalian" class="form-control" required="" value="<?= $data['tgl_pengembalian'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea class="form-control" name="keterangan"><?= $data['keterangan'] ?></textarea>
                          </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- End Modal Edit -->

                <!-- Modal Hapus -->
                <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Lokasi Aset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <h4>Apakah anda ingin menghapus data ini ? </h4>
                        <form method="post" action="<?= base_url('app/act_hapuspeminjam') ?>">
                          <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- End Modal Edit -->



                <!-- Modal Detail -->
                <div class="modal fade" id="exampleModaldetail<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <form method="post" action="<?= base_url('app/act_editpinjam') ?>">

                        <input type="hidden" name="id" value="<?= $data['id']  ?>">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Peminjam</label>
                          <p><?= $data['nama_peminjam'] ?></p>
                        </div>
                        <hr>


                        <div class="form-group">
                          <label for="exampleInputEmail1">Unit Peminjam</label>
                          <p><?= $data['unit_peminjam'] ?></p>
                        </div>
                        <hr>



                        <?php 

                        $aset = $this->db->get_where('tbl_aset', ['kode' =>$data['kode_aset']])->row_array();
                        ?>


                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Aset</label>
                          <p><?= $aset['nama_aset'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">lantai</label>
                          <p><?= $aset['lantai'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Jumlah Barang</label>
                          <p><?= $data['jml_barang'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Tgl Peminjaman</label>
                          <p> <?= $data['tgl_peminjaman'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Tgl Pengembalian</label>
                          <p><?= $data['tgl_pengembalian'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Keterangan</label>
                          <p><?= $data['keterangan'] ?></p>
                        </div>
                        <hr>


                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- End Modal Edit -->

              <!-- Modal Hapus -->
              <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Hapus Data Lokasi Aset</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <h4>Apakah anda ingin menghapus data ini ? </h4>
                      <form method="post" action="<?= base_url('app/act_hapuslantai') ?>">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>



              <!-- Modal status -->
              <div class="modal fade" id="exampleModalstatus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Status Peminjaman Aset</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <h4>Apakah anda ingin mengubah status data ini ? </h4>
                      <form method="post" action="<?= base_url('app/act_status') ?>">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <input type="hidden" name="status" value="<?= $data['status'] ?>">

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah Status</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- End Modal Edit -->
            <?php } ?>

          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>No</th>
                      <th>Kode</th>
                      <th>Nama Barang</th>
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
  </tbody>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->



</div>
</div>


</section>
<!-- /.content -->
</div>