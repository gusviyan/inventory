
<!-- jQuery 3 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/alert.js"></script>


<?php echo "<script>".$this->session->flashdata('message')."</script>"?> 
<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>

<script>
	$("#kec").change(function(){
		var value = $("#kec").val();
		var url = "<?= base_url('app/get_kel?id=') ?>"+value;
		$("#kel").load(url);
	})
</script>

<script>
	$("#kec2").change(function(){
		var value2 = $("#kec2").val();
		// alert(value2)
		var url2 = "<?= base_url('app/get_kel2?id=') ?>"+value2;
		$("#kel2").load(url2);
	});

	$("#dapil").change(function(){
		var valdapil = $("#dapil").val();
		var urlgetkecdapil = "<?= base_url('app/get_kecdapil?id=') ?>"+valdapil;
		$("#kecdapil").load(urlgetkecdapil);
	});


	$("#kecdapil").change(() => {
		var idkec = $("#kecdapil").val();
		var urlkel = "<?= base_url('app/get_keldapil?id=') ?>"+idkec;
		$("#keldapil").load(urlkel);
	})
</script>
<script>
	$(document).ready(function(){
		$("#kab").change(function(){
			var kab = $(this).val();

			var url = "<?= base_url('app/getkec?id=') ?>"+kab;
			$("#kec").load(url);
		})
	});

	$("#kec_relawan").change(function(){
		var val = $(this).val();
		var url = "<?= base_url('app/getkel_relawan?id=') ?>"+val;
		$("#kel_relawan").load(url);
	});

	$("#kec_relawanedit").change(function(){
		var val = $(this).val();
		var url = "<?= base_url('app/getkel_relawan?id=') ?>"+val;
		$("#kel_relawanedit").load(url);
	});

	$("#kec_pemilih").change(function(){
		var val = $(this).val();
		var url = "<?= base_url('app/getkel_relawan?id=') ?>"+val;
		$("#kel_pemilih").load(url);
	});

	$("#kec_pemilihedit").change(function(){
		var val = $(this).val();
		var url = "<?= base_url('app/getkel_relawan?id=') ?>"+val;
		$("#kel_pemilihedit").load(url);
	});

	$(".kelts").change(function(){
		var val = $(this).val();
		var url = "<?= base_url('app/gettps?id=') ?>"+val;
		$("#gettps").load(url);
	});

	$("#dapileditts").change(function(){
		var valdapil = $("#dapileditts").val();
		var urlgetkecdapil = "<?= base_url('app/get_kecdapil?id=') ?>"+valdapil;
		$("#kecdapileditts").load(urlgetkecdapil);
	});

	$("#kecdapileditts").change(() => {
		var idkec = $("#kecdapileditts").val();
		var urlkel = "<?= base_url('app/get_keldapil?id=') ?>"+idkec;
		$("#keldapileditts").load(urlkel);
	})

	$(".keltseditts").change(function(){
		var val = $(this).val();
		var url = "<?= base_url('app/gettps?id=') ?>"+val;
		$("#gettpseditts").load(url);
	});


</script>


</body>
</html>
