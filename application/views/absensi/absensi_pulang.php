
<?php
date_default_timezone_set('Asia/Jakarta');
if (isset ($_REQUEST['rfid'])) {
  $rfid = $_REQUEST['rfid'];
  $cek_rfid = $this->db->get_where('tb_siswa', array('rfid' => $rfid));
  $tot_siswa = $cek_rfid->num_rows();
  $data_siswa = $cek_rfid->row_array();

  if ($tot_siswa >= 1) {
    $tgl_hari_ini = date('Y-m-d');
    $jam = date('H:i:s');
    $jam_pulang = $this->db->get_where('tb_kelas', array('nama' => $data_siswa['kelas']))->row_array();
    $keterangan = (date('H:i') > $jam_pulang['jam_pulang']) ? 'Terlambat' : 'Hadir';
    $keterangan_pulang = (date('H:i') > $jam_pulang['jam_pulang']) ? 'Pulang' : 'Pulang Cepat';
    $cek_apakah_sudah_absen = $this->db->get_where('tb_absen', array('tanggal' => $tgl_hari_ini, 'id_siswa' => $data_siswa['id'], 'nis' => $data_siswa['nis']))->num_rows();
    if ($cek_apakah_sudah_absen <= 0) {
      $data = array(
        'id_siswa' => $data_siswa['id'],
        'nis' => $data_siswa['nis'],
        'nama' => $data_siswa['nama'],
        'role_jam_pulang' => $jam_pulang['jam_pulang'],
        'tanggal' => $tgl_hari_ini,
        'jam_pulang' => $jam,
        'kelas' => $data_siswa['kelas'],
        'keterangan_pulang' => $keterangan_pulang,
        'send_wa_status_pulang' => 'queue'
      );
      $this->db->set($data);
      $save_absen = $this->db->insert('tb_absen', $data);
      if ($save_absen) {
        $sudah_Terimakasih = base_url() . 'assets/rekaman/Terimakasih.m4a';
        $fileSize_sudah_Terimakasih = filesize($sudah_Terimakasih);
        // include 'whatsapp_pulan.php';
        echo '<audio src="' . $sudah_Terimakasih . '" autoplay></audio>';
        echo "<script>behasil_absen()</script>";
        echo '<meta http-equiv="refresh" content="1.5">';
      } else {
        echo "GAGAL";
      }
    } else {
      $cek_apakah_sudah_absen_pulang = $this->db->get_where('tb_absen', array('tanggal' => $tgl_hari_ini, 'id_siswa' => $data_siswa['id'], 'nis' => $data_siswa['nis'], "send_wa_status_pulang"=>'done'))->num_rows();
      if ($cek_apakah_sudah_absen_pulang >= 1) {
        $this->db->query("UPDATE tb_absen 
        SET
         jam_pulang ='".date('H:i:s')."',
         keterangan_pulang='".$keterangan_pulang."',
         role_jam_pulang='" . $jam_pulang['jam_pulang'] . "'
        WHERE tanggal='" . $tgl_hari_ini . "' 
        AND id_siswa='" . $data_siswa['id'] . "' 
        AND nis='" . $data_siswa['nis'] . "'
        ");
        $sudah_Terimakasih = base_url() . 'assets/rekaman/Terimakasih.m4a';
        $fileSize_sudah_Terimakasih = filesize($sudah_Terimakasih);
        echo '<audio src="' . $sudah_Terimakasih . '" autoplay></audio>';
        echo "<script>behasil_absen()</script>";
        echo '<meta http-equiv="refresh" content="1.5">';
      } else {
        $update_absen_pulang = $this->db->query("UPDATE tb_absen 
        SET jam_pulang='" . date('H:i:s') . "',
        keterangan_pulang='" . $keterangan_pulang . "',
        role_jam_pulang='" . $jam_pulang['jam_pulang'] . "',
        send_wa_status_pulang='queue'
        WHERE tanggal='" . $tgl_hari_ini . "' 
        AND id_siswa='" . $data_siswa['id'] . "' 
        AND nis='" . $data_siswa['nis'] . "'
        ");
        if ($update_absen_pulang) {
          $sudah_Terimakasih = base_url() . 'assets/rekaman/Terimakasih.m4a';
          $fileSize_sudah_Terimakasih = filesize($sudah_Terimakasih);
          echo '<audio src="' . $sudah_Terimakasih . '" autoplay></audio>';
          echo "<script>behasil_absen()</script>";
          echo '<meta http-equiv="refresh" content="1.5">';
        } else {
          echo "GAGAL";
        }
      }
    }
  } else {
    $tidak_ditemukan = base_url() . 'assets/rekaman/data_tidak_ditemukan.m4a';
    $fileSize = filesize($tidak_ditemukan);
    echo '<audio src="' . $tidak_ditemukan . '" autoplay></audio>';
    echo "<script>data_kosong()</script>";
    echo '<meta http-equiv="refresh" content="1.5">';
  }
}

$absensi_terakhir = $this->db->query("
  SELECT * FROM tb_absen as a 
  LEFT JOIN tb_siswa as b ON a.id_siswa = b.id
  WHERE jam_pulang<>''
  ORDER BY tanggal DESC, jam_masuk DESC 
  LIMIT 1
  ")->row_array();
?>
<style>
  #successAnimation {
    display: none;
    position: fixed;
    top: 50%;
    left: 60%;
    transform: translate(-50%, -50%);
  }
</style>
<center>

</center>
<div id="successAnimation">
  <img src="<?php echo base_url(); ?>assets/berhasil.png" style="width:200px; height: 200px">
</div>
<div class="row">
  <div class="col-lg-3">
    <div class="card2">
      <div class="card-body2">
        <center>
          <?php if (empty ($absensi_terakhir)): ?>
            <img src="<?php echo base_url(); ?>assets/siswa/blank.jpg"
              class="rounded-circle  border border-danger border-5" style="width: 80%; height: 80%">
          <?php else: ?>
            <img
              src="<?php echo base_url(); ?>assets/siswa/<?php echo ($absensi_terakhir['jk'] == 'L') ? 'cowok.jpg' : 'cewek.jpg'; ?>"
              style="width: 200px; height: 200px" class="rounded-circle border border-danger border-5">
          <?php endif; ?>
          <br>
          <br>
          <h5 class="card-title">
            <?php echo (empty ($absensi_terakhir)) ? "TAP ID CARD ANDA" : strtoupper($absensi_terakhir['nama']); ?>
          </h5>
          <br>
          <form id="myForm" action="" method="POST">
            <input type="number" name="rfid" autofocus="" id="autofocus"
              class="form-control border border-2 border-success" placeholder="Masukan ID anda"
              oninput="handleRFIDScan(event)">
          </form>
          <!--  <br>
            <i class="ti ti-calendar"></i> <label id="hari"></label>, <label id="tanggal"></label> <br>
            <i class="ti ti-clock"></i> <label style="font-weight: bold;" id="waktu"></label> -->
          <br>
          <i class="ti ti-calendar"></i>
          <?php echo farmat_tanggal(date('Y-m-d')); ?> <label id="hari" style="display: none;"></label> <label
            style="display: none;" id="tanggal"></label> <br>
          <i class="ti ti-clock"></i> <label style="font-weight: bold;" id="waktu"></label>
        </center>
        <br>
        <center><label style="font-weight: bold; color: #16a085">
            #ABSENSI</label><label style="color: #d35400; font-weight: bold;">Digital</label><br>
          <label style="font-weight: bold;">MIN 1 JOMBANG<br>
        </center>
        <center style="font-weight: bold; padding-top: 9%; color: orange;"><label
            style="background-color: black; padding: 8px;border-radius: 10px">#MIN 1 JOMBANG <label
              style="color: green">GODIGITAL</label></label></center>
      </div>
    </div>
  </div>
  <style type="text/css">
    table thead tr th {
      font-size: 15px;
    }

    table tbody tr td {
      font-size: 15px;
    }
  </style>
  <div class="col-lg-9">

    <div class="row" style="padding-top: 17px">
      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100 bg-light-danger overflow-hidden shadow-none">
          <div class="card-body position-relative">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex align-items-center mb-7">
                  <h5 class="fw-semibold mb-0 fs-5">Absen Pulang
                    <?php echo farmat_tanggal(date('Y-m-d')); ?>
                  </h5>
                </div>
                <div class="d-flex align-items-center">
                  <div class="border-end pe-4 border-muted border-opacity-10">
                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                      <?php
                      $total_siswa = $this->db->get('tb_siswa')->num_rows();
                      echo $total_siswa;
                      ?>
                    </h3>
                    <p class="mb-0 text-dark">Total Siswa</p>
                  </div>
                  <!--  <div class="ps-4">
                    <h3 class="mb-1 fw-semibold fs-8 d-flex  align-content-center">
                      <?php
                      $total_laki = $this->db->query(
                        "
                        SELECT * FROM tb_absen as a  
                        INNER JOIN tb_siswa as b ON a.id_siswa = b.id AND a.nis=b.nis  
                        WHERE b.jk='L' AND a.tanggal='" . date('Y-m-d') . "' AND a.keterangan_pulang<>''
                        "
                      )->num_rows();
                      echo $total_laki;
                      ?>
                    </h3>
                    <p class="mb-0 text-dark">Laki-Laki</p>
                  </div> -->
                  <!--   <div class="ps-4">
                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                     <?php
                     $total_perempuan = $this->db->query(
                       "
                      SELECT * FROM tb_absen as a  
                      INNER JOIN tb_siswa as b ON a.id_siswa = b.id AND a.nis=b.nis  
                      WHERE b.jk='P' AND a.tanggal='" . date('Y-m-d') . "' AND a.keterangan_pulang<>''
                      "
                     )->num_rows();
                     echo $total_perempuan;
                     ?>
                   </h3>
                   <p class="mb-0 text-dark">Perempuan</p>
                 </div> -->
                  <div class="ps-4">
                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                      <?php
                      $tepat_waktu = $this->db->query(
                        "
                    SELECT * FROM tb_absen as a  
                    INNER JOIN tb_siswa as b ON a.id_siswa = b.id AND a.nis=b.nis  
                    WHERE a.keterangan_pulang='Pulang' AND a.tanggal='" . date('Y-m-d') . "'
                    "
                      )->num_rows();
                      echo $tepat_waktu;
                      ?>
                    </h3>
                    <p class="mb-0 text-dark">Tepat Waktu</p>
                  </div>
                  <div class="ps-4">
                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                      <?php
                      $tepat_waktu = $this->db->query(
                        "
                  SELECT * FROM tb_absen as a  
                  INNER JOIN tb_siswa as b ON a.id_siswa = b.id AND a.nis=b.nis  
                  WHERE a.keterangan_pulang='Pulang Cepat' AND a.tanggal='" . date('Y-m-d') . "'
                  "
                      )->num_rows();
                      echo $tepat_waktu;
                      ?>
                    </h3>
                    <p class="mb-0 text-dark">Pulang Cepat</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="welcome-bg-img mb-n7 text-end">
                  <img src="<?php echo base_url(); ?>dist/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card2">
        <div class="table-responsive" style="padding-top: 20px">
          <table class="table table-border table-stripped">
            <thead style="background-color: #008d4c !important; color: white">
              <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Kelas</th>
                <th>Masuk</th>
                <th>Pulang</th>
                <th>Keterangan</th>
              </tr>
              <!-- end row -->
            </thead>
            <tbody>
              <!-- start row -->
              <?php
              $absen = $this->db->query("SELECT * FROM tb_absen as a
               LEFT JOIN tb_siswa as b ON a.id_siswa = b.id
               WHERE a.tanggal ='" . date('Y-m-d') . "' AND a.jam_pulang<>'' ORDER BY a.jam_pulang DESC LIMIT 20")->result_array();
              ?>
              <?php if (empty ($absen)): ?>
                <tr>
                  <th colspan="6">
                    <center>No data available in table</center>
                  </th>
                </tr>
              <?php endif; ?>

              <?php foreach ($absen as $key => $data): ?>

                <tr>
                  <td style="font-weight: bold;">#
                    <?php echo $data['nisn']; ?>
                  </td>
                  <td style="font-weight: bold;">
                    <?php echo $data['nama']; ?>
                  </td>
                  <td style="font-weight: bold;">
                    <?php echo $data['jk']; ?>
                  </td>
                  <td style="font-weight: bold;">
                    <?php echo $data['kelas']; ?>
                  </td>
                  <td style="font-weight: bold;">
                    <?php echo $data['jam_masuk']; ?>
                  </td>
                  <td style="font-weight: bold;">
                    <?php echo $data['jam_pulang']; ?>
                  </td>
                  <td
                    style="background-color: <?php echo ($data['keterangan_pulang'] == 'Pulang Cepat') ? '#ff7675' : '#1dd1a1'; ?>; color: white;">
                    <?php echo $data['keterangan_pulang']; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <i style="font-weight: bold;">Catatan : hanya tampil 20 data terakhir</i>
                </td>
              </tr>
            </tfoot>
          </table>
          <!-- </div> --><!-- 
          <center style="font-weight: bold; padding-top: 30%; color: orange;"><label style="background-color: black; padding: 8px;border-radius: 10px">#MIN 1 JOMBANG <label style="color: green">GODIGITAL</label></label></center> -->
        </div>
      </div>
    </div>


    <script type="text/javascript">
      function updateDateTime() {
        var now = new Date();
        var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"][now.getDay()];
        var tanggal = ("0" + now.getDate()).slice(-2);
        var bulan = ("0" + (now.getMonth() + 1)).slice(-2);
        var tahun = now.getFullYear();
        var tanggalFormat = tanggal + "-" + bulan + "-" + tahun;
        var jam = ("0" + now.getHours()).slice(-2);
        var menit = ("0" + now.getMinutes()).slice(-2);
        var detik = ("0" + now.getSeconds()).slice(-2);
        var waktuFormat = jam + ":" + menit + ":" + detik;
        document.getElementById("hari").textContent = hari;
        document.getElementById("tanggal").textContent = tanggalFormat;
        document.getElementById("waktu").textContent = waktuFormat;
        setTimeout(updateDateTime, 1000);
      }
      updateDateTime();


      function handleRFIDScan(event) {
        event.preventDefault();
        var rfidValue = event.target.value;
        document.getElementById("myForm").submit();
      }

      function handleRFIDScan(event) {
        var rfidInput = event.target.value;

        if (rfidInput.length >= 10) {
          document.getElementById("myForm").submit();
        }
      }
    </script>