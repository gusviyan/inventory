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

<!doctype html>
  <html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Aset</title>
  </head>
  <body>

   <div class="container">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Aset <?= $aset['nama_aset'] ?></h1>
        <p class="lead">Data aset IT RS Permata Pamulang</p>
        <hr>
        <div class="card">
          <div class="card-body">
           

            <div class="row">

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Nama Aset</h7>
                    <p><?= $aset['nama_aset'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Kategori</h7>
                    <p><?= $aset['kategori'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Model</h7>
                    <p><?= $aset['model'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Serial Number</h7>
                    <p><?= $aset['sn'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Tanggal Pembelian</h7>
                    <p><?= $aset['tgl_beli'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Masa Garansi</h7>
                    <p><?= $aset['masa_garansi'] ." Bulan" ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Status Garansi</h7>
                    <p>  <?php
                        // Periksa sisa hari garansi
                        $sisaHari = sisaHariGaransi($aset['tgl_beli'], $aset['masa_garansi']);

                        // Jika sisa hari garansi kurang dari 0, maka status garansi kadaluarsa
                        if ($sisaHari < 0) {
                          echo "Kadaluarsa";
                        } else {
                          // Jika sisa hari garansi lebih dari atau sama dengan 0, maka status garansi aktif
                          echo "Aktif (" . $sisaHari . " hari sisa)";
                        }
                        ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">lantai</h7>
                    <p><?= $aset['lantai'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Lokasi</h7>
                    <p><?= $aset['lokasi_aset'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">IP Adress</h7>
                    <p style="font-size: 13px;"><?= $aset['ip'] ?></p>
                  </div>
                </div>
              </div>


              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Processor</h7>
                    <p><?= $aset['processor'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">RAM</h7>
                    <p><?= $aset['ram'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Storage</h7>
                    <p><?= $aset['storage'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">OS</h7>
                    <p><?= $aset['os'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Monitor</h7>
                    <p><?= $aset['monitor'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">User</h7>
                    <p><?= $aset['user'] ?></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-4 col-6 mt-2">
                <div class="card shadow">
                  <div class="card-body">
                    <h7 class="card-title" style="font-weight: bold;">Foto</h7>
                    <img src="<?= base_url('assets/berkas/') ?><?= $aset['foto'] ?>" class="img-fluid" alt="Responsive image">
                  </div>
                </div>
              </div>


            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>