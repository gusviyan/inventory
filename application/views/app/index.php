

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $lokasi ?></h3>

          <p>Data Lokasi</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="<?= base_url('app/data_lokasi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $aset ?></h3>

          <p>Data Aset</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="<?= base_url('app/data_aset') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $pinjam ?></h3>

          <p>Data Peminjam</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?= base_url('app/data_peminjaman') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
          <h3><?= $denda ?></h3>

          <p>Data Denda</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?= base_url('app/data_denda') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $admin ?></h3>

          <p>Data Admin</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="<?= base_url('app/data_admin') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $kembalian ?></h3>

          <p>Pengembalian hari ini</p>
        </div>
        <div class="icon">
          <i class="ion ion-persons"></i>
        </div>
        <a href="<?= base_url('app/det_pengembalian') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->

      <!-- /.nav-tabs-custom -->

      <!-- Chat box -->

      <!-- /.box (chat box) -->

      <!-- TO DO List -->

      <!-- /.box -->

      <!-- quick email widget -->





      <!-- Calendar -->
      <div class="box box-solid bg-green-gradient">
        <div class="box-header">
          <i class="fa fa-calendar"></i>

          <h3 class="box-title">Calendar</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <!-- <div class="btn-group">
              <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div> -->
              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->

        </div>
        <!-- /.box -->

        

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper --