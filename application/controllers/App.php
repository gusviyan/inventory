<?php 

	/**
	 * 
	 */
	class App extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			
			if ($this->session->username == null) {
				redirect('login/');
			}
		}

		function index(){

			$tgl = date('Y-m-d'); 

			$denda = $this->db->get_where('tbl_peminjaman', ['tgl_pengembalian' => $tgl])->row_array();
			if ($denda == true) {
				
				$data = [
					'status_denda' => 1,
				];

				$this->db->where('tgl_pengembalian', $tgl);
				$this->db->update('tbl_peminjaman', $data);
			}


			$denda2 = $this->db->get_where('tbl_peminjaman', ['status_denda' => 1])->result_array();

			if ($denda2 == true) {
				
				foreach ($denda2 as $key) {
					$tgl1 = new DateTime($key['tgl_pengembalian']);
					$tgl2 = new DateTime($tgl);
					$d = $tgl2->diff($tgl1)->days + 1;
					$hari = $d - 1;
					$kalDenda = $hari * 10000;


					$cekDenda = $this->db->get_where('tbl_denda', ['kode_peminjam' => $key['kode']])->row_array();
					if ($cekDenda == true) {
						
						$dataDenda = [
							'denda' => $kalDenda,
						];

						$this->db->where('kode_peminjam', $key['kode']);
						$this->db->update('tbl_denda', $dataDenda);

					}else{

						$dataDenda = [
							'kode_peminjam' => $key['kode'],
							'kode_aset' => $key['kode_aset'],
							'tgl_pengembalian' => $key['tgl_pengembalian'],
							'denda' => $kalDenda,
						];


						$this->db->insert('tbl_denda', $dataDenda);

					}




				}

			}

			
			$data['aset'] = $this->db->get('tbl_aset')->num_rows();
			$data['lokasi'] = $this->db->get('tbl_lokasi')->num_rows();
			$data['admin'] = $this->db->get('tbl_admin')->num_rows();
			$data['pinjam'] = $this->db->get('tbl_peminjaman')->num_rows();

			$this->db->where_not_in('denda', 0);
			$data['denda'] = $this->db->get('tbl_denda')->num_rows();

			$this->db->where_not_in('tgl_pengembalian', $tgl);
			$data['kembalian'] = $this->db->get('tbl_peminjaman')->num_rows();
			$this->load->view('template/header');
			$this->load->view('app/index', $data);
			$this->load->view('template/footer');
		}

		
		function data_lokasi(){
			$data['lokasi'] = $this->db->get('tbl_lokasi')->result_array();
			$data['kode'] = "LK-".rand(0,1000);
			$this->load->view('template/header');
			$this->load->view('app/data_lokasi', $data);
			$this->load->view('template/footer');
		}

		function act_addlokasi(){

			$data = [
				'kode' => $this->input->post('kode'),
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'ruangan' => $this->input->post('ruangan')
			];

			$this->db->insert('tbl_lokasi', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
			redirect('app/data_lokasi');	
		}

		function act_editlokasi(){

			$id = $this->input->post('id');
			$data = [
				'kode' => $this->input->post('kode'),
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'ruangan' => $this->input->post('ruangan')
			];

			$this->db->where('id', $id);
			$this->db->update('tbl_lokasi', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
			redirect('app/data_lokasi');	
		}

		function act_hapuslokasi(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_lokasi');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
			redirect('app/data_lokasi');
		}

		function data_admin(){

			$data['admin'] = $this->db->get('tbl_admin')->result_array();
			$data['kode'] = "AD-".rand(0,1000);
			$this->load->view('template/header');
			$this->load->view('app/data_admin', $data);
			$this->load->view('template/footer');


		}

		function act_addAdmin(){

			$data = [
				'kode' => $this->input->post('kode'),
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username'),
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT)
			];

			$this->db->insert('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
			redirect('app/data_admin');	
		}

		function act_editAdmin(){


			$data = [
				'kode' => $this->input->post('kode'),
				'jabatan' => $this->input->post('jabatan'),
				'username' => $this->input->post('username'),
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT)
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
			redirect('app/data_admin');	
		}

		function act_hapusAdmin(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_admin');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
			redirect('app/data_admin');
		}


		function data_kategori(){

			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();
			$data['kode'] = 'KT-'.rand(0, 1000);

			$this->load->view('template/header');
			$this->load->view('app/data_kategori', $data);
			$this->load->view('template/footer');
		}

		function act_addkategori(){

			$data = [
				'kode' => $this->input->post('kode'),
				'nama_kategori' => $this->input->post('nama_kategori'),
			];

			$this->db->insert('tbl_kategori', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
			redirect('app/data_kategori');
		}

		function act_editkategori(){

			$data = [
				'nama_kategori' => $this->input->post('nama_kategori'),
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('tbl_kategori', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
			redirect('app/data_kategori');

		}

		function act_hapuskategori(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_kategori');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
			redirect('app/data_kategori');

		}


		function data_lantai(){

			$data['lantai'] = $this->db->get('tbl_lantai')->result_array();
			$data['kode'] = 'KL-'.rand(0, 1000);

			$this->load->view('template/header');
			$this->load->view('app/data_lantai', $data);
			$this->load->view('template/footer');
		}

		function act_addlantai(){

			$data = [

				'kode' => $this->input->post('kode'),
				'lantai' => $this->input->post('lantai')
			];

			$this->db->insert('tbl_lantai', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
			redirect('app/data_lantai');
		}

		function act_editlantai(){

			$data = [
				'lantai' => $this->input->post('lantai'),
			];

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_lantai', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
			redirect('app/data_lantai');
		}

		function act_hapuslantai(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_lantai');

			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
			redirect('app/data_lantai');

		}

		function data_aset(){

			$data['aset'] = $this->db->get('tbl_aset')->result_array();
			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();
			$data['lantai'] = $this->db->get('tbl_lantai')->result_array();
			$data['lokasi'] = $this->db->get('tbl_lokasi')->result_array();
			$data['kode'] = 'KA-'.rand(0,1000);
			$this->load->view('template/header');
			$this->load->view('app/data_aset', $data);
			$this->load->view('template/footer');
		}

		function generateQr($data){


			$this->load->library('ciqrcode');

			/* Data */
			$hex_data   = bin2hex($data);
			$save_name  = $hex_data.'.png';

			/* QR Code File Directory Initialize */
			$dir = 'assets/qr/';
			if (!file_exists($dir)) {
				mkdir($dir, 0775, true);
			}

			/* QR Configuration  */
			$config['cacheable']    = true;
			$config['imagedir']     = $dir;
			$config['quality']      = true;
			$config['size']         = '1024';
			$config['black']        = array(255,255,255);
			$config['white']        = array(255,255,255);
			$this->ciqrcode->initialize($config);

			/* QR Data  */
			$params['data']     = $data;
			$params['level']    = 'L';
			$params['size']     = 10;
			$params['savename'] = FCPATH.$config['imagedir']. $save_name;

			$this->ciqrcode->generate($params);

			/* Return Data */
			$return = array(
				'content' => $data,
				'file'    => $dir. $save_name
			);
			return $return;
		}


		function act_addAset(){

			$config['upload_path']          = './assets/berkas';
			$config['allowed_types']        = 'jpg|png|jpeg';
			$config['min_size']             = 9000000;
			$config['remove_spaces']        = false;
			$config['encrypt_name'] 		= true;


			$this->load->library('upload', $config);
			if (!$this->upload->do_upload("foto")){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', 'swal("Oops", "Ada kesalahan dalam upload gambar", "warning" );');
				redirect('app/data_aset');

			}else{
				$img = array('upload_data' => $this->upload->data());
				$new_name = $img['upload_data']['file_name'];

				$kode = base_url('aset/index/').$this->input->post('kode');

				$this->generateQr($kode);
				$qr = bin2hex($kode);

				$data = [
					'kode' => $this->input->post('kode'),
					'nama_aset' => $this->input->post('nama_aset'),
					'kategori' => $this->input->post('kategori'),
					'model' => $this->input->post('model'),
					'sn'  => $this->input->post('serial_number'),
					'tgl_beli' => $this->input->post('tgl_beli'),
					'masa_garansi' => $this->input->post('masa_garansi'),
					'lantai' => $this->input->post('lantai'),
					'lokasi_aset' => $this->input->post('lokasi_aset'),
					'ip' => $this->input->post('ip'),
					'ram' => $this->input->post('ram'),
					'processor' => $this->input->post('processor'),
					'storage' => $this->input->post('storage'),
					'os' => $this->input->post('os'),
					'monitor' => $this->input->post('monitor'),
					'user' => $this->input->post('user'),
					'foto' => $new_name,
					'qr' => $qr

				];




				$this->db->insert('tbl_aset', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
				redirect('app/data_aset');

			}

		}


		function act_hapusaset(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_aset');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
			redirect('app/data_aset');

		}

		function act_editaset(){

			$id = $this->input->post('id');
			$foto = $_FILES['foto']['name'];

			if ($foto !== '') {


				$config['upload_path']          = './assets/berkas';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['min_size']             = 9000000;
				$config['remove_spaces']        = false;
				$config['encrypt_name'] 		= true;


				$this->load->library('upload', $config);
				if (!$this->upload->do_upload("foto")){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Oops", "Ada kesalahan dalam upload gambar", "warning" );');
					redirect('app/data_aset');

				}else{
					$img = array('upload_data' => $this->upload->data());
					$new_name = $img['upload_data']['file_name'];


					$data = [
						'kode' => $this->input->post('kode'),
						'nama_aset' => $this->input->post('nama_aset'),
						'kategori' => $this->input->post('kategori'),
						'model' => $this->input->post('model'),
						'lantai' => $this->input->post('lantai'),
						'lokasi_aset' => $this->input->post('lokasi_aset'),
						'ip' => $this->input->post('ip'),
						'ram' => $this->input->post('ram'),
						'processor' => $this->input->post('processor'),
						'storage' => $this->input->post('storage'),
						'os' => $this->input->post('os'),
						'monitor' => $this->input->post('monitor'),
						'user' => $this->input->post('user'),
						'foto' => $new_name,

					];

					$this->db->where('id', $id);
					$this->db->update('tbl_aset', $data);
					$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
					redirect('app/data_aset');
				}

			}else{


				$data = [
					'kode' => $this->input->post('kode'),
					'nama_aset' => $this->input->post('nama_aset'),
					'kategori' => $this->input->post('kategori'),
					'model' => $this->input->post('model'),
					'lantai' => $this->input->post('lantai'),
					'lokasi_aset' => $this->input->post('lokasi_aset'),
					'ip' => $this->input->post('ip'),
					'ram' => $this->input->post('ram'),
					'processor' => $this->input->post('processor'),
					'storage' => $this->input->post('storage'),
					'os' => $this->input->post('os'),
					'monitor' => $this->input->post('monitor'),
					'user' => $this->input->post('user'),
					'foto' => $new_name,


				];

				$this->db->where('id', $id);
				$this->db->update('tbl_aset', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
				redirect('app/data_aset');

			}


		}


		function cetakqr(){

			$data['kode'] = $this->input->post('kodeqr');
			$this->load->view('app/cetak_qr', $data);

		}


		function cetak(){
			$this->load->library('Dompdf_gen');

			$this->load->view('app/cetak');

			$paper_size = "A4";
			$orientatation = "Portrait";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("qrcodeaset.pdf", array('Attachment' => 0));

		}

		function data_peminjaman(){
			$data['pinjam'] = $this->db->get('tbl_peminjaman')->result_array();
			$this->load->view('template/header');
			$this->load->view('app/data_peminjaman2', $data);
			$this->load->view('template/footer');
		}

		function act_addpinjam(){

			$data = [
				'kode' => 'PJM-'.rand(0, 10000),
				'kode_aset' => $this->input->post('kode_aset'),
				'nama_peminjam' => $this->input->post('nama_peminjam'),
				'unit_peminjam' => $this->input->post('unit_peminjam'),
				'jml_barang' => $this->input->post('jml_barang'),
				'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
				'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
				'keterangan' => $this->input->post('keterangan'),
			];

			$this->db->insert('tbl_peminjaman', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
			redirect('app/data_peminjaman');
		}

		function act_editpinjam(){
			$id = $this->input->post('id');
			$data = [
				'nama_peminjam' => $this->input->post('nama_peminjam'),
				'unit_peminjam' => $this->input->post('unit_peminjam'),
				'jml_barang' => $this->input->post('jml_barang'),
				'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
				'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
				'keterangan' => $this->input->post('keterangan'),
			];

			$this->db->where('id', $id);
			$this->db->update('tbl_peminjaman', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
			redirect('app/data_peminjaman');

		}

		function act_hapuspeminjam(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_peminjaman');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
			redirect('app/data_peminjaman');

		}

		function act_status(){

			$id = $this->input->post('id');
			$status = $this->input->post('status');

			if ($status == 0) {
				$data = [
					'status' => 1,
					'status_denda' => 0, 
				];
			}else{
				$data = [
					'status' => 0
				];

			}

			$this->db->where('id', $id);
			$this->db->update('tbl_peminjaman', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Status berhasil diubah", "success");');
			redirect('app/data_peminjaman');

		}


		function cetak_peminjaman(){

			$kode = $this->input->post('kode');
			$data['pinjam'] = $this->db->get_where('tbl_peminjaman', ['kode' => $kode])->row_array();

			$this->load->library('Dompdf_gen');
			$this->load->view('app/cetak_peminjaman', $data);

			$paper_size = "A4";
			$orientatation = "Portrait";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("surat_pemijaman_aset.pdf", array('Attachment' => 0));

		}


		function data_denda(){
			$this->db->where_not_in('denda', 0);
			$data['denda'] = $this->db->get('tbl_denda')->result_array();

			$this->load->view('template/header');
			$this->load->view('app/data_denda', $data);
			$this->load->view('template/footer');
		}

		function act_hapusdenda(){


			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_denda');
			$this->session->set_flashdata('message', 'swal("Yess", "Denda berhasil di hapus", "success");');
			redirect('app/data_denda');
		}

		function det_pengembalian(){

			$this->db->where('tgl_pengembalian', date('Y-m-d'));
			$data['pinjam'] = $this->db->get('tbl_peminjaman')->result_array();

			$this->load->view('template/header');
			$this->load->view('app/det_pengembalian', $data);
			$this->load->view('template/footer');
		}

	}

?>