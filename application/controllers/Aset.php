<?php 

	/**
	 * 
	 */
	class Aset extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index($kode){

			$data['aset'] = $this->db->get_where('tbl_aset', ['kode' => $kode])->row_array();
			$this->load->view('app/aset', $data);
		}
	}
?>