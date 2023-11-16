<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absensi extends CI_Controller {

	public function __construct()
	{
		error_reporting(0);
		parent::__construct();
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('M_Datatables');

		// if(empty($this->session->userdata['username'])){
			
		// }
	}

	public function index()
	{	
		// var_dump($this->session->userdata['username']);
		// if(!empty($this->session->userdata['username'])){
		// 	$this->dashboard();
		// }else{
			// $this->login();
			$this->load->view('onboard');
		// }
	}

	public function login(){
		if (isset($_POST['username'])) {
			try {
				$username = @$_POST['username'];
				$password = md5(@$_POST['password']);
				if(isset($username) && isset($password)) {
					$data = $this->db->get_where('tb_admin',array('username'=>$username, 'password'=>$password))->row_array();
					if(!empty($data['username'])){
						$this->session->set_userdata('username',$data); 
						redirect('./');
					}else{
						redirect('./login');
					}
				}
			} catch (Exception $e) {
				echo "Error ".$e;
			}
		}else{
			$this->load->view('login');
		}
	}
	public function dashboard()
	{
		$this->checkSession();
		$data['halaman'] = 'absensi/home';
		$this->load->view('modul',$data);
	}
	public function absensi_masuk()
	{
		// $this->checkSession();
		$data['halaman'] = 'absensi/absensi_masuk';
		$this->load->view('modul_absen',$data);
	}
	public function absensi_pulang()
	{
		// $this->checkSession();
		$data['halaman'] = 'absensi/absensi_pulang';
		$this->load->view('modul_absen',$data);
	}

	public function cron_send_wa_masuk(){
		$res_absensi = $this->db->get_where('tb_absen',array('send_wa_status'=>'queue'),1);
		$total_absensi = $res_absensi->num_rows();
		if($total_absensi>=1){
			$dAbsensi = $res_absensi->row_array();
			$siswa = $this->db->get_where('tb_siswa',array('id'=>$dAbsensi['id_siswa'], 'nisn'=>$dAbsensi['nis']))->row_array();
			$jam_masuk = $this->db->get_where('tb_kelas',array('nama'=>$siswa['kelas']))->row_array();
			// $menit = (substr($dAbsensi['jam_masuk'], 0,5)>$jam_masuk['jam_masuk']) ? (substr($dAbsensi['jam_masuk'], 0,2) - 7) * 60 + (substr($dAbsensi['jam_masuk'], 3,2) -0)." Menit" : '';
			$menit_set = (strtotime($dAbsensi['jam_masuk']) - strtotime($jam_masuk['jam_masuk'])) / 60;
			$menit = ($menit_set<0) ? '' : number_format($menit_set); 
			// echo substr($dAbsensi['jam_masuk'], 3,2);
			$keterangan = ($dAbsensi['jam_masuk']>$jam_masuk['jam_masuk']) ? 'Terlambat' : 'Hadir';
			// $text = "*NOTIFIKASI ABSEN MASUK MIN 1 JOMBANG* \n \n Siswa dengan NIS ".$dAbsensi['nis']." Atas nama *".$dAbsensi['nama']."* Sudah melakukan absensi pada tanggal *".farmat_tanggal($dAbsensi['tanggal'])."* jam *".$dAbsensi['jam_masuk']."* dengan status *".$keterangan."* ".$menit."";

			$text = "*NOTIFIKASI ABSEN MASUK MIN 1 JOMBANG* \n Absensi siswa *".farmat_tanggal($dAbsensi['tanggal'])."* \n \n Jam Masuk : *".$jam_masuk['jam_masuk']."* \n NIS : *".$siswa['nis']."* \n Nama : *".$siswa['nama']."* \n Kelas : *".$siswa['kelas']."* \n Jam Absen : *".$dAbsensi['jam_masuk']."* \n Keterangan : *".$keterangan."* ".$menit." Menit \n \n  *Note* :  _Jangan membalas pesan ini, ini adalah pesan otomatis yang dikirim dari sistem aplikasi absensi MIN 1 Jombang_";
			// echo $text;
			$hp =  str_replace('+', '', hp($siswa['telepon']));
			$data = array('send_wa_status'=>'done','date_send_wa'=>date('Y-m-d H:i:s'));
			$this->db->where('id',$dAbsensi['id']);
			$update = $this->db->update('tb_absen',$data);
			if($update){
				sendWa1($hp,$text);
			}
			// sendWa1($hp,$text);
		}else{
			echo json_encode(array('status'=>'data sudah dikirim semua'));
		}
		
		$this->cron_notifikasi_walikelas();
		$this->cron_send_wa_pulang();
	}

	public function cron_send_wa_pulang(){
		$res_absensi = $this->db->get_where('tb_absen',array('send_wa_status_pulang'=>'queue'),1);
		$total_absensi = $res_absensi->num_rows();
		if($total_absensi>=1){
			$dAbsensi = $res_absensi->row_array();
			$siswa = $this->db->get_where('tb_siswa',array('id'=>$dAbsensi['id_siswa'], 'nisn'=>$dAbsensi['nis']))->row_array();
			$jam_pulang = $this->db->get_where('tb_kelas',array('nama'=>$siswa['kelas']))->row_array();
			$menit_set = (strtotime($dAbsensi['jam_pulang']) - strtotime($jam_pulang['jam_pulang'])) / 60;
			$menit = ($menit_set<0) ? '' : number_format($menit_set); 
			// $menit = (substr($dAbsensi['jam_masuk'], 0,5)<$jam_pulang['jam_pulang']) ? (substr($dAbsensi['jam_masuk'], 0,2) - 7) * 60 + (substr($dAbsensi['jam_masuk'], 3,2) -0)." Menit" : '';
			$keterangan = ($dAbsensi['jam_pulang']>$jam_pulang['jam_pulang']) ? 'Pulang' : 'Pulang Cepat';

			// $text = "*NOTIFIKASI ABSEN PULANG MIN 1 JOMBANG* \n \n Siswa dengan NIS ".$dAbsensi['nis']." Atas nama *".$dAbsensi['nama']."* Sudah melakukan absensi pada tanggal *".farmat_tanggal($dAbsensi['tanggal'])."* jam *".$dAbsensi['jam_masuk']."* dengan status *".$keterangan."* ".$menit."";

			$text = "*NOTIFIKASI ABSEN PULANG MIN 1 JOMBANG* \n Absensi siswa *".farmat_tanggal($dAbsensi['tanggal'])."* \n \n Jam Pulang : *".$jam_pulang['jam_pulang']."* \n NIS : *".$siswa['nis']."* \n Nama : *".$siswa['nama']."* \n Kelas : *".$siswa['kelas']."* \n Jam Absen : *".$dAbsensi['jam_pulang']."* \n Keterangan : *".$keterangan." ".$menit." Menit* Yang lalu \n \n  *Note* :  _Jangan membalas pesan ini, ini adalah pesan otomatis yang dikirim dari sistem aplikasi absensi MIN 1 Jombang_";

			$hp =  str_replace('+', '', hp($siswa['telepon']));
			$data = array('send_wa_status_pulang'=>'done','date_send_wa_pulang'=>date('Y-m-d H:i:s'));
			$this->db->where('id',$dAbsensi['id']);
			$update = $this->db->update('tb_absen',$data);
			if($update){
				sendWa1($hp,$text);
			}
		}else{
			echo json_encode(array('status'=>'data sudah dikirim semua'));
		}

		$this->cron_notifikasi_walikelas();
	}

	public function cron_notifikasi_walikelas(){
		$tgl_hari_ini = date('Y-m-d');
		$res_kelas = $this->db->get_where('tb_kelas',array('send_wa_status_masuk'=>'queue','hp_walikelas !='=>''),1);
		$total_log_kelas = $res_kelas->num_rows();
		if($total_log_kelas>=1){
			$data_kelas = $res_kelas->row_array();
			$hp = $data_kelas['hp_walikelas'];

			$cek_siswa_tidak_hadir = $this->db->query(
			"SELECT * FROM tb_siswa 
			WHERE id NOT IN (SELECT id_siswa FROM tb_absen 
									WHERE kelas='".$data_kelas['nama']."' 
									AND tanggal='".$tgl_hari_ini."')
			AND kelas='".$data_kelas['nama']."'
			")->result_array();

			$list_siswa ="*NOTIFIKASI ABSEN MIN 1 JOMBANG * \n Berikut List nama siswa *Tidak/Belum* absen *".farmat_tanggal($tgl_hari_ini)."* kelas *".$data_kelas['nama']."* walikelas *".$data_kelas['nm_walikelas']."* \n \n";
			$no = 1;
			$arr_name = array();
			foreach ($cek_siswa_tidak_hadir as $key => $dsiswa) {
				$arr_name[] = [
					'nisn' => $dsiswa['nisn'],
					'nama' => $dsiswa['nama'],
					'kelas' => $dsiswa['kelas']
				];
				$list_siswa.=$no++." *".$dsiswa['nama']."* \n";
			}
			$text = $list_siswa." \n _Jangan membalas pesan ini, ini adalah pesan otomatis yang dikirim dari sistem aplikasi absensi MIN 1 Jombang_";
			$json_log = json_encode(array('log'=>date('Y-m-d H:i:s'),'log_wa'=>$text, 'detail'=>$arr_name));
			$dsavelog = array(
				'tgl_buat'=>date('Y-m-d H:i:s'),
				'tanggal'=>$tgl_hari_ini,
				'kelas'=>$data_kelas['nama'],
				'log_data'=>$json_log
			);
			// ngecek log
			$cek_log_notif = $this->db->get_where('tb_notifikasi_walikelas',array('tanggal'=>$tgl_hari_ini,'kelas'=>$data_kelas['nama']));
			$total_log = $cek_log_notif->num_rows();
			$dalog = $cek_log_notif->row_array();
			if ($total_log<=0) {
				$rest = $this->db->insert('tb_notifikasi_walikelas',$dsavelog);
			}else{
				$this->db->where(array('id'=>$dalog['id']));
				$rest = $this->db->update('tb_notifikasi_walikelas',$dsavelog);
			}

			if($rest){
				sendWa1($hp,$text);
				$this->db->where(array('id'=>$data_kelas['id']));
				$this->db->update('tb_kelas',array('send_wa_status_masuk'=>'done'));
			}
		}else{
			echo json_encode(array('status'=>'Data sudah dikirim semua'));
		}

	}
	public function update_queue_notifikasi_walikelas(){
		// $data = array('send_wa_status_masuk'=>'');
		$data = array('send_wa_status_masuk'=>'queue');
		$this->db->update('tb_kelas',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('./login');
	}

	public function checkSession()
	{
		if(empty($this->session->userdata['username'])){
			redirect('./');
		}
	}
}

?>