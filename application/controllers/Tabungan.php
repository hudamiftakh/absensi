<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tabungan extends CI_Controller {

	public function __construct()
	{
		error_reporting(0);
		parent::__construct();
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('M_Datatables');
		$this->load->library('cart');

		if(empty($this->session->userdata['username'])){
			$this->load->view('login');
		}
	}

	public function checkSession()
	{
		if(empty($this->session->userdata['username'])){
			redirect('./');
		}
	}

	public function tabungan_transaksi()
	{
		$this->checkSession();
		$data['halaman'] = 'tabungan/tabungan_transaksi';
		$this->load->view('modul_tabungan',$data);
	}

	public function get_siswa()
	{
		$this->checkSession();
		$kode = $_POST['kode'];
		$siswa = $this->db->where("(rfid='".$kode."' OR nis = '".$kode."')")
		->get('tb_siswa')->row_array();

		$sumangka = $this->db->query("SELECT v.debit-v.kredit as total 
									 FROM ( 
									 	  SELECT SUM(debit) as debit, SUM(kredit) as kredit FROM `tb_tabungan` 
									 	  WHERE id_siswa='".$siswa['id']."'
									 ) as v")->row_array();

		$data = array(
			'detail' => $siswa,
			'total_saldo' => $sumangka['total']
		);

		echo json_encode($data);

	}

	public function show_tabungan()
	{
		$this->checkSession();
		$tables = "tb_tabungan";
		$search = array('kode_transaksi','nis','nama','kelas','debit','kredit','saldo_terakhir','id');
        // jika memakai IS NULL pada where sql
		$isWhere = NULL;
        // $isWhere = 'artikel.deleted_at IS NULL';
		header('Content-Type: application/json');
		echo $this->M_Datatables->get_tables($tables,$search,$isWhere);	
	}



}
?>