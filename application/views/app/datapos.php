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
          <h3 class="box-title">  <i class="fa fa-home"></i> Data Pos</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah data pos
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Pos</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/act_addpos') ?>">


                    <div class="form-group">
                      <label for="exampleInputEmail1">Wilayah</label>
                      <select class="form-control" name="kec" id="kec">
                        <option>-- Pilih Wilayah --</option>
                        <?php 
                        foreach ($wilayah as $dat) {
                          $wly = $this->db->get_where('tbl_kecamatan', ['id' => $dat['wilayah']])->result_array();
                          foreach ($wly as $va) { ?>
                            <option value="<?= $va['id'] ?>"><?= $va['name'] ?></option>
                          <?php } ?>

                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kel/Desa</label>
                      <select class="form-control" name="kel" id="kel">
                        <option>-- Pilih Kel/Desa --</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Ketua Pos</label>
                      <select class="form-control" name="ketua" id="kel">
                        <option>-- Pilih Ketua Pos --</option>
                        <?php foreach($relawan as $data){ ?>
                          <option><?= $data['nama'] ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Data</button>
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
                    <th>Kecamatan</th>
                    <th>Kel/Desa</th>
                    <th>Ketua</th>
                    <th>Date</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($pos as $datapos) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <?php 
                        $kec = $this->db->get_where('tbl_kecamatan', ['id' => $datapos['kec']])->row_array();
                        echo $kec['name']
                        ?>
                      </td>
                      <td><?= $datapos['kel'] ?></td>
                      <td><?= $datapos['ketua'] ?></td>
                      <td><?= $datapos['date'] ?></td>
                      <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button> 
                      </td>

                      <!-- Modal Edit -->
                      <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Data Pos</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             <form method="post" action="<?= base_url('app/act_editpos') ?>">

                              <input type="hidden" name="id" value="<?= $datapos['id'] ?>">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Wilayah</label>
                                <select class="form-control" name="kec" id="kec2">
                                  <?php 
                                  $kec = $this->db->get_where('tbl_kecamatan', ['id' => $datapos['kec']])->row_array();
                                  ?>
                                  <option value="<?= $kec['id'] ?>"><?= $kec['name'] ?></option>
                                  <option>-- Pilih Wilayah --</option>
                                  <?php 
                                  foreach ($wilayah as $dat) {
                                    $wly = $this->db->get_where('tbl_kecamatan', ['id' => $dat['wilayah']])->result_array();
                                    foreach ($wly as $va) { ?>
                                      <option value="<?= $va['id'] ?>"><?= $va['name'] ?></option>
                                    <?php } ?>

                                  <?php } ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Kel/Desa</label>
                                <select class="form-control" name="kel" id="kel2">
                                  <option><?= $datapos['kel'] ?></option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Ketua Pos</label>
                                <select class="form-control" name="ketua" id="kel">
                                  <option><?= $datapos['ketua'] ?></option>
                                  <option>-- Pilih Ketua Pos --</option>
                                  <?php foreach($relawan as $data){ ?>
                                    <option><?= $data['nama'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>



                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save Edit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- End Modal Edit -->


                  <!-- Modal Hapus -->
                  <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus Pos</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <h4>Apakah anda ingin menghapus data ini ? </h4>
                          <form method="post" action="<?= base_url('app/act_hapuspos') ?>">
                            <input type="hidden" name="id" value="<?= $datapos['id'] ?>">


                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- End Modal Hapus -->

                </tr>

              <?php } ?>



              <!-- End Modal Edit -->


            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Kecamatan</th>
                <th>Kel/Desa</th>
                <th>Ketua</th>
                <th>Date</th>
                <th>Opsi</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->



</div>
</div>


</section>
<!-- /.content -->
</div>