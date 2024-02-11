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
          <h3 class="box-title">  <i class="fa fa-money"></i> Data Denda Peminjaman</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->

          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Peminjam</th>
                    <th>Kode Aset</th>
                    <th>Tgl Pengambalian</th>
                    <th>Denda</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach($denda as $data){ ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <?= $data['kode_peminjam'] ?>
                      </td>
                      <td><?= $data['kode_aset'] ?></td>
                      <td><?= $data['tgl_pengembalian'] ?></td>
                      <td><?= $data['denda'] ?></td>
                      <td>


                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>



                    <!-- End Modal Edit -->

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Denda Aset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <h4>Apakah anda ingin menghapus data ini ? </h4>
                            <form method="post" action="<?= base_url('app/act_hapusdenda') ?>">
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