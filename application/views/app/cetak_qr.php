 <!DOCTYPE html>
 <html><head>
 	<title>QRCODE</title>
 <!-- 	<link rel="preconnect" href="https://fonts.googleapis.com">
 	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
       table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    },

    td{
        text-align: center;
    }
</style>
</head><body>
  <h4 style="font-weight:bold; margin-bottom: 10px;">Data QRCODE</h4>
  <br>
  <br>

  <center>
      <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">KODE QR</th>
          </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($kode as $data) { ?>

            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td>
                    <?php 
                    $qr = $this->db->get_where('tbl_aset', ['kode' => $data])->row_array();

                    ?>
                    <center>
                        <img src="<?= base_url('assets/qr/') ?><?= $qr['qr'] ?>.png" class="" style="height: 200px; width: 200px;">
                        <h3><?= $qr['kode'] ?></h3>
                    </center>
                </td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>
</center>

<div style="position: absolute;top: 95%">
 <hr >
 <p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
 </p>
</div>
</p>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    print();
</script>




</body>
</html>