<?php
// Fungsi untuk menentukan sisa hari garansi
function sisaHariGaransi($tanggalPembelian, $masaGaransi)
{
    // Konversi tanggal pembelian ke format timestamp
    $tanggalPembelianTimestamp = strtotime($tanggalPembelian);

    // Hitung tanggal kadaluarsa garansi
    $tanggalKadaluarsa = strtotime("+" . $masaGaransi . " months", $tanggalPembelianTimestamp);

    // Hitung sisa hari garansi
    $sisaHariGaransi = floor(($tanggalKadaluarsa - time()) / (60 * 60 * 24));

    return $sisaHariGaransi;
}
?>

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
          <h3 class="box-title">  <i class="fa fa-users"></i> Data Aset</h3>

        </div>
        <div class="box-body">
          <hr>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Aset
          </button>



          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-plus"></i> Form Tambah Data Aset</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" enctype="multipart/form-data" action="<?= base_url('app/act_addAset') ?>">

                   <div class="form-group">
                    <label for="exampleInputEmail1">Kode Aset</label>
                    <input type="text" name="kode" class="form-control" required value="<?= $kode ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Aset</label>
                    <input type="text" name="nama_aset" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select class="form-control" name="kategori">
                      <option>-- Pilih Kategori --</option>
                      <?php 
                      foreach ($kategori as $kate) {
                        ?>
                        <option><?= $kate['nama_kategori'] ?></option>

                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Model</label>
                    <input type="text" name="model" class="form-control" required="">
                  </div>    

                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial Number</label>
                    <input type="text" name="serial_number" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Pembelian</label>
                    <input type="date" name="tgl_beli" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Masa Garansi (bulan)</label>
                    <input type="number" name="masa_garansi" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Lantai</label>
                    <select class="form-control" name="lantai">
                      <option>-- Pilih lantai --</option>
                      <?php 
                      foreach ($lantai as $lt) {
                        ?>
                        <option><?= $lt['lantai'] ?></option>

                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi Aset</label>
                    <select class="form-control" name="lokasi_aset">
                      <option>-- Pilih Lokasi Aset --</option>
                      <?php 
                      foreach ($lokasi as $lk) {
                        ?>
                        <option><?= $lk['nama_lokasi'] ?></option>

                      <?php } ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">IP Address</label>
                    <input type="text" name="ip" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Processor</label>
                    <input type="text" name="processor" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">RAM</label>
                    <input type="text" name="ram" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Storage</label>
                    <input type="text" name="storage" class="form-control" required="">
                  </div>
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">OS</label>
                    <input type="text" name="os" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Monitor</label>
                    <input type="text" name="monitor" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">User</label>
                    <input type="text" name="user" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto Barang</label>
                    <input type="file" name="foto" class="form-control">
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

        <!-- <button type="submit" class="btn btn-primary" id="cetakqr" >Cetak QR Aset</button>
        <form method="post" action="<?= base_url('app/cetakqr') ?>" target="_blank"> -->

          <button type="submit" class="btn btn-primary" id="actklik" style="display:none">Cetak QR</button>

          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>No</th>
                  <!-- <th>Kode</th> -->
                  <th>Nama Aset</th>
                  <th>Kategori</th>
                  <th>Model</th>
                  <th>Serial Number</th>
                  <th>Tgl. Pembelian</th>
                  <th>Masa Garansi</th>
                  <th>Status Garansi</th>
                  <th>Lantai</th>
                  <th>Lokasi Aset</th>
                  <th>IP Adress</th>
                  <th>Processor</th>
                  <th>RAM</th>
                  <th>Storage</th>
                  <th>OS</th>
                  <th>Monitor</th>
                  <th>User</th>
                  <!-- <th>Foto</th>
                  <th>QR</th> -->
                  <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1 ?>
                  <?php foreach($aset as $data){ ?>
                    <tr>
                      <td>
                       <div class="form-check">
                        <input required class="form-check-input" name="kodeqr[]" type="checkbox" value="<?= $data['kode'] ?>" id="defaultCheck1">
                      </form>
                    </div>
                  </td>
                  <td><?= $no++ ?></td>    
                  <!-- <td>
                    <?= $data['kode'] ?>
                  </td> -->
                    <td><?= $data['nama_aset'] ?></td>
                    <td><?= $data['kategori'] ?></td>
                    <td><?= $data['model'] ?></td>
                    <td><?= $data['sn'] ?></td>
                    <td><?= $data['tgl_beli'] ?></td>
                    <td><?= $data['masa_garansi']." Bulan" ?></td>
                    <td>
                        <?php
                        // Periksa sisa hari garansi
                        $sisaHari = sisaHariGaransi($data['tgl_beli'], $data['masa_garansi']);

                        // Jika sisa hari garansi kurang dari 0, maka status garansi kadaluarsa
                        if ($sisaHari < 0) {
                          echo "Kadaluarsa";
                        } else {
                          // Jika sisa hari garansi lebih dari atau sama dengan 0, maka status garansi aktif
                          echo "Aktif (" . $sisaHari . " hari sisa)";
                        }
                        ?>
                    <td><?= $data['lantai'] ?></td>
                    <td><?= $data['lokasi_aset'] ?></td>
                    <td><?= $data['ip'] ?></td>
                    <td><?= $data['processor'] ?></td>
                    <td><?= $data['ram'] ?></td>
                    <td><?= $data['storage'] ?></td>
                    <td><?= $data['os'] ?></td>
                    <td><?= $data['monitor'] ?></td>
                    <td><?= $data['user'] ?></td>

                  <!-- <td>
                    <a href="<?= base_url('assets/berkas/') ?><?= $data['foto'] ?>" target="_blank"><img src="<?= base_url('assets/berkas/') ?><?= $data['foto'] ?>" style="height: 50px;"></a>
                  </td>
                  <td>
                    <img src="<?= base_url('assets/qr/') ?><?= $data['qr'] ?>.png" style="height: 50px;" onclick="window.location.href='<?= base_url('aset/index/') ?><?= $data['kode'] ?>'">
                  </td> -->
                  <td>
                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModaledit<?= $data['id'] ?>"><i class="fa fa-pen"></i> Edit</a>

                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalhapus<?= $data['id'] ?>"><i class="fa fa-trash"></i></a>

                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalpinjam<?= $data['id'] ?>">Pinjam</a>


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
                      <div class="modal-body">0

                        <form method="post" enctype="multipart/form-data" action="<?= base_url('app/act_editaset') ?>">

                          <input type="hidden" name="id" value="<?= $data['id']  ?>">

                          <div class="form-group">
                            <label for="exampleInputEmail1">Kode Aset</label>
                            <input type="text" name="kode" class="form-control" readonly required value="<?= $data['kode'] ?>">
                          </div>


                          <div class="form-group">
                    <label for="exampleInputEmail1">Nama Aset</label>
                    <input type="text" name="nama_aset" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select class="form-control" name="kategori">
                      <option>-- Pilih Kategori --</option>
                      <?php 
                      foreach ($kategori as $kate) {
                        ?>
                        <option><?= $kate['nama_kategori'] ?></option>

                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Model</label>
                    <input type="text" name="model" class="form-control" required="">
                  </div>    

                  <div class="form-group">
                    <label for="exampleInputEmail1">Serial Number</label>
                    <input type="text" name="serial_number" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tgl Pembelian</label>
                    <input type="date" name="tgl_beli" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Masa Garansi</label>
                    <input type="text" name="masa_garansi" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Lantai</label>
                    <select class="form-control" name="lantai">
                      <option>-- Pilih lantai --</option>
                      <?php 
                      foreach ($lantai as $lt) {
                        ?>
                        <option><?= $lt['lantai'] ?></option>

                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Lokasi Aset</label>
                    <select class="form-control" name="lokasi_aset">
                      <option>-- Pilih Lokasi Aset --</option>
                      <?php 
                      foreach ($lokasi as $lk) {
                        ?>
                        <option><?= $lk['nama_lokasi'] ?></option>

                      <?php } ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">IP Address</label>
                    <input type="text" name="ip" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Processor</label>
                    <input type="text" name="processor" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">RAM</label>
                    <input type="text" name="ram" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Storage</label>
                    <input type="text" name="storage" class="form-control" required="">
                  </div>
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">OS</label>
                    <input type="text" name="os" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Monitor</label>
                    <input type="text" name="monitor" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">User</label>
                    <input type="text" name="user" class="form-control" required="">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto Barang</label>
                    <input type="file" name="foto" class="form-control">
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Aset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <h4>Apakah anda ingin menghapus data ini ? </h4>
                    <form method="post" action="<?= base_url('app/act_hapusaset') ?>">
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


            <!-- Modal pinjam -->
            <div class="modal fade" id="exampleModalpinjam<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Peminjaman Data Aset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">


                    <form method="post" action="<?= base_url('app/act_addpinjam') ?>">
                      <input type="hidden" name="id" value="<?= $data['id'] ?>">

                      <input type="hidden" name="kode_aset" value="<?= $data['kode'] ?>">



                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" class="form-control" required="">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Unit Peminjam</label>
                        <textarea class="form-control" name="unit_peminjam" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Barang</label>
                        <input type="number" name="jml_barang" class="form-control" required="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tgl Peminjaman</label>
                        <input type="date" name="tgl_peminjaman" class="form-control" required="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tgl Pengembalian</label>
                        <input type="date" name="tgl_pengembalian" class="form-control" required="">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                      </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          <?php } ?>

        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>No</th>
            <!-- <th>Kode</th> -->
            <th>Nama Aset</th>
                  <th>Kategori</th>
                  <th>Model</th>
                  <th>Serial Number</th>
                  <th>Tgl. Pembelian</th>
                  <th>Masa Garansi</th>
                  <th>Status Garansi</th>
                  <th>Lantai</th>
                  <th>Lokasi Aset</th>
                  <th>IP Adress</th>
                  <th>Processor</th>
                  <th>RAM</th>
                  <th>Storage</th>
                  <th>OS</th>
                  <th>Monitor</th>
                  <th>User</th>
                  <!-- <th>Foto</th>
                  <th>QR</th> -->
                  <th>Opsi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</tbody>


</section>
<!-- /.content -->
</div>


<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){

    $("#cetakqr").click(function(){

      $("#actklik").trigger('click'); 

    })

  })
</script>