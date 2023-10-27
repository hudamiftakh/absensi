
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Data Laporan Rekapan Total Absensi</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">List Data Laporan Rekapan Total Absensi</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">  
                    <img src="<?php echo base_url(); ?>dist/images/breadcrumb/emailSv.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="collapsible-section mb-4">
    <div class="accordion accordion-flush position-relative overflow-show" id="accordionFlushExample">
        <div class="accordion-item mb-3 shadow-none border rounded-top">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed fs-4 fw-semibold px-3 py-6 lh-base border-0 rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"> Filter Data</button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body px-3 fw-normal">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4 row align-items-center">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label text-end">Mulai Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tgl_awal" value="<?php echo (empty($_REQUEST['tgl_awal'])) ? date('Y-m-d') : $_REQUEST['tgl_awal']; ?>">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label fw-semibold col-sm-3 col-form-label text-end">Sampai Tanggal</label>
                                    <div class="col-sm-9">
                                        <div class="input-group border rounded-1">
                                            <input type="date" class="form-control" name="tgl_akhir" value="<?php echo (empty($_REQUEST['tgl_akhir'])) ? date('Y-m-d') : $_REQUEST['tgl_akhir']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label text-end"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-primary btn-lg" type="submit" name="filter">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($_REQUEST['tgl_awal'])) : ?>
    Rekap laporan absensi tanggal <b><?php echo $_REQUEST['tgl_awal']; ?></b> s/d <b><?php echo $_REQUEST['tgl_akhir']; ?></b>
    <button class="btn btn-info" style="float: right; background-color: green; color: white; border-color: green "><i class="ti ti-file-spreadsheet"></i>Excel</button> 
    <!-- <button class="btn btn-danger" style="float: right;"><i class="ti ti-file"></i>PDF</button>  -->
    <br>
    <br>
    <table class="table table-stripped">
        <thead style="background-color: #2e86de; color: white">
            <tr>
                <th>#</th>
                <th>Kelas</th>
                <th>Total Siswa</th>
                <th>Hadir</th>
                <th>Tidak Hadir</th>
                <th>Tepat Waktu</th>
                <th>Terlambat</th>
                <th>Absen Pulang</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $fil_tanggal = "AND tanggal>='".$_REQUEST['tgl_awal']."' AND tanggal<='".$_REQUEST['tgl_akhir']."'";
            $show_kelas = $this->db->get("tb_kelas")->result_array();
            foreach ($show_kelas as $key => $data) :
                $jml_siswa = $this->db->query("SELECT COUNT(*) as jml_siswa FROM tb_siswa WHERE kelas='".$data['nama']."'")->row_array();
                $siswa_hadir = $this->db->query("
                              SELECT COUNT(*) as siswa_hadir 
                              FROM tb_absen 
                              WHERE kelas='".$data['nama']."' 
                              ".$fil_tanggal."")->row_array();
                $tepat_waktu = $this->db->query("
                               SELECT COUNT(*) as tepat_waktu 
                               FROM tb_absen 
                               WHERE kelas='".$data['nama']."' 
                               ".$fil_tanggal." 
                               AND keterangan='Hadir'")->row_array();
                $terlambat = $this->db->query("
                            SELECT COUNT(*) as terlambat 
                            FROM tb_absen
                            WHERE kelas='".$data['nama']."' 
                            ".$fil_tanggal." 
                            AND keterangan='Terlambat'")->row_array();
                $pulang = $this->db->query("
                        SELECT COUNT(*) as pulang 
                        FROM tb_absen 
                        WHERE kelas='".$data['nama']."' 
                        ".$fil_tanggal." 
                        AND jam_pulang!='00:00:00'")->row_array();
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td>
                        <button 
                            onclick="showSiswa('<?php echo $data['nama']; ?>');" 
                            class="btn btn-link" 
                            data-bs-toggle="modal" 
                            data-bs-target="#total_siswa">
                            <b><?php echo $jml_siswa['jml_siswa']; ?></b>
                        </button>
                    </td>
                    <td>
                        <button 
                        onclick="totSiswaHadir(
                        '<?php echo $_REQUEST['tgl_awal']; ?>',
                        '<?php echo $_REQUEST['tgl_akhir']; ?>',
                        '<?php echo $data['nama']; ?>');" 
                        class="btn btn-link" 
                        data-bs-toggle="modal" 
                        data-bs-target="#siswa_hadir">
                        <b><?php echo $siswa_hadir['siswa_hadir']; ?></b>
                        </button>
                    </td>
                    <td>
                        <button 
                        onclick="totSiswaTidakHadir(
                        '<?php echo $_REQUEST['tgl_awal']; ?>',
                        '<?php echo $_REQUEST['tgl_akhir']; ?>',
                        '<?php echo $data['nama']; ?>');" 
                        class="btn btn-link" 
                        data-bs-toggle="modal" 
                        data-bs-target="#siswa_tidak_hadir">
                        <b><?php echo $jml_siswa['jml_siswa']-$siswa_hadir['siswa_hadir']; ?></b>
                        </button>
                    </td>
                    <td>
                        <button 
                        onclick="totSiswaHadirTepatWaktu(
                        '<?php echo $_REQUEST['tgl_awal']; ?>',
                        '<?php echo $_REQUEST['tgl_akhir']; ?>',
                        '<?php echo $data['nama']; ?>');" 
                        class="btn btn-link" 
                        data-bs-toggle="modal" 
                        data-bs-target="#siswa_tepat_waktu">
                        <b><?php echo $tepat_waktu['tepat_waktu']; ?></b>
                        </button>
                    </td>
                    <td>
                        <button 
                        onclick="totSiswaHadirTidakTepatWaktu(
                        '<?php echo $_REQUEST['tgl_awal']; ?>',
                        '<?php echo $_REQUEST['tgl_akhir']; ?>',
                        '<?php echo $data['nama']; ?>');" 
                        class="btn btn-link" 
                        data-bs-toggle="modal" 
                        data-bs-target="#siswa_tidak_tepat_waktu">
                       <b><?php echo $terlambat['terlambat']; ?></b>
                        </button>
                    </td>
                    <td>
                        <button 
                        onclick="totSiswaAbsenPulang(
                        '<?php echo $_REQUEST['tgl_awal']; ?>',
                        '<?php echo $_REQUEST['tgl_akhir']; ?>',
                        '<?php echo $data['nama']; ?>');" 
                        class="btn btn-link" 
                        data-bs-toggle="modal" 
                        data-bs-target="#siswa_absen_pulang">
                       <b><?php echo $pulang['pulang']; ?></b>
                        </button>
                    </td>
                    <td><b><?php 
                        if($siswa_hadir['siswa_hadir']==0 AND $jml_siswa['jml_siswa']==0)
                            {
                                echo number_format(0,2);
                            }else
                            { 
                                echo number_format($siswa_hadir['siswa_hadir']/$jml_siswa['jml_siswa']*100,2); 
                            }?>%</b></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<div class="modal" id="total_siswa">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Daftar Siswa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="tab">
            <table id="table-siswa-laporan" class="table border table-striped display" style="width: 100%">
                    <thead style="background-color: #487eb0 !important; color: white">
                        <tr>
                          <th>No</th>
                          <th>Kelas</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Jenis Kelamin</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td colspan="8">
                            <center>
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div> Loading....
                          </center>
                      </td>    
                  </tr>
              </tbody>
            </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="siswa_hadir">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Siswa Hadir Absen</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="tab">
            <table id="table-siswa-hadir" class="table border table-striped display" style="width: 100%">
                    <thead style="background-color: #487eb0 !important; color: white">
                        <tr>
                          <th>No</th>
                          <th>Kelas</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Jam / Menit</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td colspan="8">
                            <center>
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div> Loading....
                          </center>
                      </td>    
                  </tr>
              </tbody>
            </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="siswa_tidak_hadir">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Siswa Tidak Hadir Absen</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="tab">
            <table id="table-siswa-tidak-hadir" class="table border table-striped display" style="width: 100%">
                    <thead style="background-color: #487eb0 !important; color: white">
                        <tr>
                          <th>No</th>
                          <th>Kelas</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>JK</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td colspan="8">
                            <center>
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div> Loading....
                          </center>
                      </td>    
                  </tr>
              </tbody>
            </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="siswa_tepat_waktu">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Siswa Hadir Tepat Waktu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="tab">
            <table id="table-siswa-hadir-tepat-waktu" class="table border table-striped display" style="width: 100%">
                    <thead style="background-color: #487eb0 !important; color: white">
                        <tr>
                          <th>No</th>
                          <th>Kelas</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Jam / Menit</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td colspan="8">
                            <center>
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div> Loading....
                          </center>
                      </td>    
                  </tr>
              </tbody>
            </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="siswa_tidak_tepat_waktu">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Siswa Hadir Tidak Tepat Waktu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="tab">
            <table id="table-siswa-tidak-hadir-tepat-waktu" class="table border table-striped display" style="width: 100%">
                    <thead style="background-color: #487eb0 !important; color: white">
                        <tr>
                          <th>No</th>
                          <th>Kelas</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Jam / Menit</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td colspan="8">
                            <center>
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div> Loading....
                          </center>
                      </td>    
                  </tr>
              </tbody>
            </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="siswa_absen_pulang">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Siswa Absen Pulang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="tab">
            <table id="table-siswa-absen-pulang" class="table border table-striped display" style="width: 100%">
                    <thead style="background-color: #487eb0 !important; color: white">
                        <tr>
                          <th>No</th>
                          <th>Kelas</th>
                          <th>Nis</th>
                          <th>Nama</th>
                          <th>Tanggal</th>
                          <th>Jam / Menit</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td colspan="8">
                            <center>
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                              </div> Loading....
                          </center>
                      </td>    
                  </tr>
              </tbody>
            </table>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>