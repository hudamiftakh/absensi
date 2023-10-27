<h5 class="card-title fw-semibold">Super <label style="font-weight: bold; color: #f39c12">#Apps</label> MIN 1 Jombang</h5>
<br>
<style type="text/css">
  .zoom-image {
    transition: transform 0.3s;
  }

  .zoom-image:hover {
    transform: scale(1.4);
  }
  a {
    color: black;
  }
</style>
<div class="row">
  <div class="col-lg-2 text-center">
    <a href="#">
      <img src="<?php echo $base_url; ?>dist/images/menu/absensi.png" class="zoom-image"><br>
      <label style="font-weight: bold;">Absensi</label>
    </a>
  </div>
  <div class="col-lg-2 text-center">
    <a href="#">
     <img src="<?php echo $base_url; ?>dist/images/menu/esaku.png" class="zoom-image">
     <label style="font-weight: bold;">Saku Digital</label>
   </a>
 </div>
 <div class="col-lg-2 text-center">
  <a href="#">
    <img src="<?php echo $base_url; ?>dist/images/menu/tabungan.png" class="zoom-image">
    <label style="font-weight: bold;">Perpustakaan</label>
  </a>
</div>
<!-- <div class="col-lg-2 text-center">
  <a href="#">
    <img src="<?php echo $base_url; ?>dist/images/menu/kalkulator.png" class="zoom-image">
    <label style="font-weight: bold;">Tabungan Digital</label>
  </a>
</div> -->
</div>

<br>  

<div class="row">
  <div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100 bg-light-info overflow-hidden shadow-none">
      <div class="card-body position-relative">
        <div class="row">
          <div class="col-lg-7">
            <div class="d-flex align-items-center mb-7">
              <div class="rounded-circle overflow-hidden me-6">
                <img src="<?php echo base_url(); ?>dist/images/profile/user-1.jpg" alt="" width="40" height="40">
              </div>
              <h5 class="fw-semibold mb-0 fs-5">Absensi Hari ini</h5>
            </div>
            <div class="d-flex align-items-center">
              <div class="border-end pe-4 border-muted border-opacity-10">
                <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                  <?php $hadir = $this->db->query("SELECT * FROM tb_absen WHERE tanggal='".date('Y-m-d')."' AND keterangan='Hadir'")->num_rows();?>
                  <?php echo $hadir; ?>
                  <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                  <p class="mb-0 text-dark">Siswa Hadir</p>
                </div>
                <div class="ps-4">
                  <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                   <?php $terlambat = $this->db->query("SELECT * FROM tb_absen WHERE tanggal='".date('Y-m-d')."' AND keterangan='Terlambat'")->num_rows();?>
                   <?php echo $terlambat; ?>
                   <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                   <p class="mb-0 text-dark">Siswa Terlambat</p>
                 </div>
                 <div class="ps-4">
                  <?php
                  $belum_absen = $this->db->query("
                    SELECT * FROM tb_siswa
                    ")->num_rows();
                    ?>
                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php echo $belum_absen-($hadir+$terlambat); ?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                    <p class="mb-0 text-dark">Siswa belum absen</p>
                  </div>
                  <div class="ps-4">
                    <?php
                    $total_siswa = $this->db->query("
                      SELECT * FROM tb_siswa
                      ")->num_rows();
                      ?>
                      <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><?php echo $total_siswa; ?><i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                      <p class="mb-0 text-dark">Total Siswa</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="welcome-bg-img mb-n7 text-end">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100 bg-light-danger overflow-hidden shadow-none">
            <div class="card-body position-relative">
              <div class="row">
                <div class="col-sm-7">
                  <div class="d-flex align-items-center mb-7">
                    <div class="rounded-circle overflow-hidden me-6">
                      <img src="<?php echo base_url(); ?>dist/images/profile/user-2.jpg" alt="" width="40" height="40">
                    </div>
                    <h5 class="fw-semibold mb-0 fs-5">Kunjungan perpustakaan hari ini</h5>
                  </div>
                  <div class="d-flex align-items-center">
                    <div class="border-end pe-4 border-muted border-opacity-10">
                      <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                        <?php $kunjung = $this->db->query("SELECT DISTINCT nama FROM tb_kunjungan_perpus WHERE tanggal_kunjungan='".date('Y-m-d')."' AND keterangan='Kunjungan'")->num_rows();?>
                        <?php echo $kunjung; ?>
                        <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                        <p class="mb-0 text-dark">Siswa Berkunjung</p>
                      </div>
                      <div class="border-end pe-4 border-muted border-opacity-10">
                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                          <?php $kunjung = $this->db->query("SELECT DISTINCT nama FROM tb_kunjungan_perpus WHERE tanggal_kunjungan='".date('Y-m-d')."' AND keterangan='Kunjungan'")->num_rows();?>
                          <?php //echo $kunjung; ?> 0
                          <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                          <p class="mb-0 text-dark">Siswa Pinjam Buku</p>
                        </div>
                        <div class="border-end pe-4 border-muted border-opacity-10">
                          <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                            <?php $kunjung = $this->db->query("SELECT DISTINCT nama FROM tb_kunjungan_perpus WHERE tanggal_kunjungan='".date('Y-m-d')."' AND keterangan='Kunjungan'")->num_rows();?>
                            <?php// echo $kunjung; ?> 0
                            <i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                            <p class="mb-0 text-dark">Perlu Kembalikan Buku</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="welcome-bg-img mb-n7 text-end">
                        <img src="<?php echo base_url(); ?>dist/images/backgrounds/welcome-bg2.png" alt="" class="img-fluid">
                      </div>
                    </div>
                  </div>    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


