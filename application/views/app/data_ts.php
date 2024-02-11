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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Tim Sukses</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Tim Sukses
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Tim Sukses</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/act_addts') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Nama TS</label>
                    <input type="text" name="nama" class="form-control" required>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Ts</label>
                    <textarea class="form-control" name="alamat_ts" required="Masukan alamat lengkap tim sukses anda"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor HP</label>
                    <input type="number" name="nohp" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nik</label>
                    <input type="number" name="nik" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto</label>
                    <input type="foto" name="file" class="form-control" required>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Dapil</label>
                    <select class="form-control" name="dapil" id="dapil">
                      <option> -- Pilih Dapil --</option>
                      <?php foreach ($dapil as $data) { ?>
                        <option value="<?= $data['Kode'] ?>"><?= $data['dapil'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kec</label>
                    <select class="form-control" name="kec" id="kecdapil">
                      <option>-- Pilih Kecamatan --</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Kel / Desa</label>
                    <select class="form-control kelts" name="kel" id="keldapil">
                      <option>-- Pilih Kelurahan --</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">TPS</label>
                    <select class="form-control" name="tps" id="gettps">
                      <option>-- Pilih TPS --</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Username TS</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password TS</label>
                    <input type="password" name="pass" class="form-control" required>
                  </div>

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
                <th>Nama</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>TPS</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
              <?php foreach($ts as $data){ ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    <?= $data['nama'] ?>
                  </td>
                  <td><?= $data['nohp'] ?></td>
                  <td><?= $data['alamat_ts'] ?></td>
                  <td><?= $data['tps'] ?></td>
                  <td>


                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModaldetail<?= $data['id'] ?>"><i class="fa fa-eye"></i> Detail</button>

                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</button>

                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>

                <!-- Modal Detail -->
                <div class="modal fade" id="exampleModaldetail<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Tim Sukses</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <!--   <form method="post" action="<?= base_url('app/act_editdapil') ?>"> -->

                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama :</label>
                          <p><?= $data['nama'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Alamat :</label>
                          <p><?= $data['alamat_ts'] ?></p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <label for="exampleInputEmail1">No Hp :</label>
                          <p><?= $data['nohp'] ?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                          <label for="exampleInputEmail1">NIK :</label>
                          <p><?= $data['nik'] ?></p>
                        </div>

                        <hr>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Dapil :</label>
                          <p><?= $data['dapil'] ?></p>
                        </div>

                        <hr>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kec :</label>
                          <?php 
                          $kec = $this->db->get_where('tbl_kecamatan', ['id' => $data['kec']])->row_array();
                          ?>
                          <p><?= $kec['name'] ?></p>
                        </div>



                        <hr>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kel / Desa :</label>
                          <?php 
                          $kel = $this->db->get_where('tbl_kelurahan', ['id' => $data['kel']])->row_array();
                          ?>
                          <p><?= $kel['name'] ?></p>
                        </div>

                        <hr>
                        <div class="form-group">
                          <label for="exampleInputEmail1">TPS :</label>

                          <p><?= $data['tps'] ?></p>
                        </div>


                        <hr>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Date :</label>
                          
                          <p><?= $data['date'] ?></p>
                        </div>



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!--  <button type="submit" class="btn btn-primary">Save Edit</button> -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- End Modal Detail -->

              <!-- Modal Edit -->
              <div class="modal fade" id="exampleModaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Data Tim Sukses</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <form method="post" action="<?= base_url('app/act_editts') ?>">

                      <input type="hidden" name="id" value="<?= $data['id']  ?>">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama TS</label>
                        <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Ts</label>
                        <textarea class="form-control" name="alamat_ts" required="Masukan alamat lengkap tim sukses anda"><?= $data['alamat_ts'] ?></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Nomor HP</label>
                        <input type="number" name="nohp" value="<?= $data['nohp'] ?>" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Nik</label>
                        <input type="number" value="<?= $data['nik'] ?>" name="nik" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="foto" name="file" class="form-control" required>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Dapil</label>
                        <select class="form-control" name="dapil" id="dapileditts">

                          <option value="<?= $data['dapil'] ?>">
                            <?php 
                            if ($data['dapil'] == 'DP-01') {
                              echo "dapil 1";
                            }elseif($data['dapil'] == 'DP-02'){
                              echo "dapil 2";
                            }elseif($data['dapil'] == 'DP-03'){
                              echo "dapil 3";
                            }elseif($data['dapil'] == 'DP-04'){
                              echo "dapil 4";
                            }elseif($data['dapil'] == 'DP-05'){
                              echo "dapil 5";
                            }else{
                              echo "dapil 6";
                            }
                            ?>
                          </option>
                          <option> -- Pilih Dapil --</option>
                          <?php foreach ($dapil as $data2) { ?>
                            <option value="<?= $data2['Kode'] ?>"><?= $data2['dapil'] ?></option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Kec</label>
                        <select class="form-control" name="kec" id="kecdapileditts">
                          <?php 
                          $kec = $this->db->get_where('tbl_kecamatan', ['id' => $data['kec']])->row_array();
                          ?>
                          <option value="<?= $kec['id'] ?>"><?= $kec['name'] ?></option>
                          <option>-- Pilih Kecamatan --</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Kel / Desa</label>
                        <select class="form-control keltseditts" name="kel" id="keldapileditts">
                         <?php 
                         $kel = $this->db->get_where('tbl_kelurahan', ['id' => $data['kel']])->row_array();
                         ?>
                         <option value="<?= $kel['id'] ?>"><?= $kel['name'] ?></option>
                         <option>-- Pilih Kelurahan --</option>
                       </select>
                     </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">TPS</label>
                      <select class="form-control" name="tps" id="gettpseditts">
                        <option><?= $data['tps'] ?></option>
                        <option>-- Pilih TPS --</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Username TS</label>
                      <input type="text" name="username"  value="<?= $data['username'] ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Password Baru</label>
                      <input type="password" name="pass" class="form-control" required>
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

          <!-- End Modal Edit -->

          <!-- Modal Hapus -->
          <div class="modal fade" id="exampleModalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Tim Sukses</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                  <h4>Apakah anda ingin menghapus data ini ? </h4>
                  <form method="post" action="<?= base_url('app/act_hapusts') ?>">
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
          <th>Nama</th>
          <th>No Hp</th>
          <th>Alamat</th>
          <th>TPS</th>
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