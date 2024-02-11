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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Lokasi Aset</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Lokasi Aset
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Lokasi Aset</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/act_addlokasi') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Kode Lokasi</label>
                    <input type="text" name="kode" class="form-control" required value="<?= $kode ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lokasi</label>
                    <input type="text" name="nama_lokasi" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ruangan</label>
                    <input type="text" name="ruangan" class="form-control" required>
                  </div>


                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>





        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Lokasi</th>
                  <th>Ruangan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach($lokasi as $data){ ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?= $data['kode'] ?>
                    </td>
                    <td><?= $data['nama_lokasi'] ?></td>
                    <td><?= $data['ruangan'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</button>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>


                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Lokasi Aset</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <form method="post" action="<?= base_url('app/act_editlokasi') ?>">

                          <input type="hidden" name="id" value="<?= $data['id']  ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Kode</label>
                            <input type="text" name="nama" readonly="" class="form-control" value="<?= $data['kode'] ?>" required>
                          </div>


                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" value="<?= $data['nama_lokasi'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Ruangan</label>
                            <input type="text" name="ruangan" value="<?= $data['ruangan'] ?>" class="form-control" required>
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
                        <form method="post" action="<?= base_url('app/act_hapuslokasi') ?>">
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
              <?php } ?>

            </tbody>
            <tfoot>
              <tr>
               <th>No</th>
               <th>Kode</th>
               <th>Nama Lokasi</th>
               <th>Ruangan</th>
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