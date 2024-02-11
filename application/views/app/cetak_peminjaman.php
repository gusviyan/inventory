 <!DOCTYPE html>
 <html><head>
 	<title>SURAT PEMINJAMAN</title>

  

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
   table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  },

  td{
   /* text-align: center;*/
 }
</style>
</head><body>

  <?php 
  $kode_aset = $pinjam['kode_aset'];
  $aset = $this->db->get_where('tbl_aset', ['kode' => $kode_aset])->row_array();
  ?>

  <h4 style="font-weight:bold; margin-bottom: 10px; text-align: center;">SURAT PEMINJAMAN ASET<br>
  UNIVERSITAS HARAPAN MEDAN</h4>
  <p style="font-style: italic; text-align: center;">Jl.Imam Bonjol No.10 Kecamatan Medan, Kota Medan, Sumut</p>
  <hr>

  <p>Pada tanggal ini <?= date('H-M-Y') ?> saya yang bertanda tangan di bawah ini : </p>
  <table border="0">
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><?= $pinjam['nama_peminjam'] ?></td>
    </tr>
    <tr>
      <td>Unit Peminjam</td>
      <td>:</td>
      <td><?= $pinjam['unit_peminjam'] ?></td>
    </tr>
    <tr>
      <td>Tanggal Peminjaman</td>
      <td>:</td>
      <td><?= $pinjam['tgl_peminjaman'] ?></td>
    </tr>
    <tr>
      <td>Tanggal Pengembalian</td>
      <td>:</td>
      <td><?= $pinjam['tgl_pengembalian'] ?></td>
    </tr>
    <tr>
      <td>Nama Aset Yang Dipinjam</td>
      <td>:</td>
      <td><?= $aset['nama_aset'] ?></td>
    </tr>
    <tr>
      <td>Jumlah Barang</td>
      <td>:</td>
      <td><?= $pinjam['jml_barang'] ?> Unit</td>
    </tr>
  </table>
  <br>
  <br>
  <p>Dengan ini saya berhak dan memelihara barang ini dengan sebaik - baiknya, apabila ada kerusakan barang yang saya pinjam tersebut, saya berhak mengganti rugi atas perbaikan barang yang saya pinjam, dan apabila dalam pengembalian tidak sesuai tanggal yang telah di tentukan atau lewat dari tanggal pengembalian tersebut maka saya bersedia dikenakan denda Rp 10.0000 per hari.</p>
  <br>
  <br>
  <p>Demikian Surat Peminjaman ini yang telah dibuat, semoga ketentuan yang di telah dibuat dapat di pertanggung jawabkan dengan sebaik -baiknya.</p>
  <br>
  <br>
  <p style="text-align: center; font-weight: bold;">Kami yang bertanda tangan dibawah ini</p>
  <br>
  <br>
  <br>
  <br>
  <table border="0">
    <tr>
      <td width="">Peminjam</td>
      <td width="370">.</td>
      <td width="">Pemilik Barang</td>
    </tr>
  </table>
  <br>
  <br>
  <br>
  <br>

  <table border="0">
    <tr>
      <td width="">(..............)</td>
      <td width="370">.</td>
      <td width="">(.....................)</td>
    </tr>
  </table>
  <div style="position: absolute;top: 95%">
   <hr >
   <p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
   </p>
 </div>
</p>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body></html>