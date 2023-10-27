<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perpustakaan extends CI_Controller {

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

	public function laporan_kunjungan()
	{
		$this->checkSession();
		$data['halaman'] = 'perpustakaan/laporan_kunjungan';
		$this->load->view('modul',$data);
	}

	public function kunjungan()
	{
		$this->checkSession();
		$data['halaman'] = 'perpustakaan/kunjungan';
		$this->load->view('modul_perpustakaan',$data);
	}

	public function buku()
	{
		$this->checkSession();
		$data['halaman'] = 'perpustakaan/buku';
		$this->load->view('modul',$data);
	}

	public function act_buku()
	{
		$this->checkSession();
		$data['halaman'] = 'perpustakaan/act_buku';
		$this->load->view('modul',$data);
	}

	public function pinjam()
	{
		$this->checkSession();
		$data['halaman'] = 'perpustakaan/pinjam';
		$this->load->view('modul_perpustakaan',$data);
	}

	public function act_pinjam()
	{
		$this->checkSession();
		$data['cart_items'] = $this->cart->contents();
		$data['halaman'] = 'perpustakaan/act_pinjam';
		$this->load->view('modul_perpustakaan',$data);
	}

	public function show_etalase()
	{
		$this->checkSession();
		$data['cart_items'] = $this->cart->contents();
		$this->load->view('perpustakaan/show_etalase',$data);
	}

	public function etalase()
	{
		$this->checkSession();
		$data = array();
		foreach ($_POST['id'] as $key => $id_buku) {
			$datane = $this->db->query("SELECT * FROM tb_buku WHERE id_buku = '".$id_buku."'")->row_array();
			$data[] = array(
				'id' => $id_buku,
				'id_buku' => $datane['id_buku'],
				'name' => $datane['judul_buku'],
				'qty' => 1,
				'price' => 0,
				'kode_buku' => $datane['kode_buku'],
				'thn_terbit' => $datane['thn_terbit'],
				'penerbit' => $datane['penerbit']
			);
		}
		$this->cart->insert($data);
		echo "berhasil";

	}

	public function update_etalase()
	{
		$this->checkSession();
		$cart_data = array(
			'rowid' => $this->input->post('rowid'),
			'qty' => $this->input->post('qty')
		);	
		$this->cart->update($cart_data);
		echo "berhasil";
	}

	public function hapus_etalase()
	{
		$this->checkSession();
		$rowid = $_REQUEST['rowid'];
		$this->cart->remove($rowid);
		redirect('act_pinjam');
	}

	public function get_siswa()
	{
		$this->checkSession();
		$kode = $_POST['kode'];
		$data = $this->db->where("(rfid='".$kode."' OR nis = '".$kode."')")
		->get('tb_siswa')->row_array();

		echo json_encode($data);

	}

	public function save_peminjaman()
	{	
		$this->checkSession();
		$kode = $_POST['kode'];
		$tgl_kembali = $_POST['tgl_kembali'];
		$durasi = $_POST['durasi'];
		$denda = 0;
		$dt = $this->db->where("(rfid='".$kode."' OR nis = '".$kode."')")
		->get('tb_siswa')->row_array();
		$jml_buku = count($this->cart->contents());
		$id_siswa = $dt['id'];
		$data = array(
			'kode_transaksi' =>$_POST['kode_transaksi'],
			'id_siswa' => $dt['id'],
			'nis' => $dt['nis'],
			'nama' => $dt['nama'],
			'kelas' => $dt['kelas'],
			'tgl_pinjam' => date('Y-m-d'),
			'tgl_kembali' => $tgl_kembali,
			'durasi' => $durasi,
			'denda' => $denda,
			'jml_buku' => $jml_buku,
			'status' => 'proses_pinjam'
		);
		try {
			if (!$this->cart->contents()) {
				$this->output->set_status_header('406');
				echo "Anda belum memasukan buku yang akan dipinjam";
			}else{
				if (!isset($kode)) {
					$this->output->set_status_header('406');
					echo "Error : Periksa kembali link anda";
				}else{
					$result = $this->db->insert('tb_peminjaman_buku',$data);
					if ($result) {
						$detail = array();
						foreach ($this->cart->contents() as $key => $etalase) {
							$detail[] = array(
								'kode_transaksi' => $_POST['kode_transaksi'],
								'id_buku' => $etalase['id_buku'],
								'id_siswa' => $id_siswa,
								'qty' => $etalase['qty'],
								'status' => 'Proses'
							);

							$this->update_stock($etalase['id_buku'], $etalase['qty']);
						}
						$this->db->insert_batch('tb_detail_peminjaman',$detail);
						$this->cart->destroy();
						echo "Data berhasil disimpan";
					}else{
						echo "Cek kembali isian anda";
					}
				}
			}
		} catch (\Exception $th) {
			echo "error : Silahkan cek kembali data isian anda";
		}
	}


	public function update_stock($book_id, $quantity)
	{
		$book = $this->db->get_where('tb_buku', array('id_buku' => $book_id))->row();
		if ($book) {
			$new_stock = $book->jumlah_buku - $quantity;
			if ($new_stock >= 0) {
				$this->db->update('tb_buku', array('jumlah_buku' => $new_stock), array('id_buku' => $book_id));
				// echo "Stok buku berhasil diperbarui.";
			} else {
				// echo "Stok buku tidak mencukupi.";
			}
		} else {
			echo "Buku tidak ditemukan.";
		}
	}


	public function show_buku()
	{
		$this->checkSession();
		$tables = "tb_buku";
		$search = array('lokasi','kode_buku','judul_buku','pengarang','penerbit','jumlah_buku','lokasi','id_buku');
        // jika memakai IS NULL pada where sql
		$isWhere = NULL;
        // $isWhere = 'artikel.deleted_at IS NULL';
		header('Content-Type: application/json');
		echo $this->M_Datatables->get_tables($tables,$search,$isWhere);
	}


	public function show_peminjaman()
	{
		$query  = "
		SELECT      peminjaman.id,
				    peminjaman.kode_transaksi,
				    peminjaman.id_siswa,
				    peminjaman.nis,
				    peminjaman.nama,
				    peminjaman.kelas,
				    peminjaman.jml_buku,
				    peminjaman.durasi,
				    peminjaman.tgl_pinjam,
				    peminjaman.tgl_kembali,
				    CASE
				        WHEN  CURRENT_DATE() > peminjaman.tgl_kembali THEN 'Perlu Dikembalikan'
				        ELSE 'Proses Dipinjam'
				    END AS status,
				    CASE
				        WHEN CURRENT_DATE() > peminjaman.tgl_kembali THEN (DATEDIFF(CURRENT_DATE(), peminjaman.tgl_kembali) * 500)
				        ELSE 0
				    END AS denda
				FROM tb_peminjaman_buku as peminjaman";
		$search = array('kode_transaksi','nis','nama');
		$where  = null; 
            // $where  = array('nama_kategori' => 'Tutorial');

            // jika memakai IS NULL pada where sql
		$isWhere = null;
            // $isWhere = 'artikel.deleted_at IS NULL';
		header('Content-Type: application/json');
		echo $this->M_Datatables->get_tables_query($query,$search,$where,$isWhere);
	}

	public function denda(){
		$this->checkSession();
		$data['halaman'] = 'perpustakaan/denda';
		$this->load->view('modul',$data);
	}

}
?>