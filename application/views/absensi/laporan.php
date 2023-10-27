
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Data Laporan</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">List Data Laporan</li>
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
    <div class="accordion accordion-flush position-relative overflow-hidden" id="accordionFlushExample">
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
                                    <label class="form-label fw-semibold col-sm-3 col-form-label text-end">Kelas</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="kelas">
                                            <option value="">Semua</option>
                                            <?php 
                                            $dakel = $this->db->get('tb_kelas')->result_array();
                                            foreach ($dakel as $key => $value):
                                                ?>
                                                <option value="<?php echo $value['nama']; ?>" <?php echo ($_REQUEST['kelas']==$value['nama']) ? "selected" : ""; ?>><?php echo $value['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-3 col-form-label text-end">Pilih Status</label>
                                    <div class="col-sm-9">
                                        <div class="input-group border rounded-1">
                                            <select class="form-control" name="status">
                                                <option value="">Semua</option>
                                                <option value="Hadir" <?php echo ($_REQUEST['status']=="Hadir") ? "selected" : ""; ?>>Hadir</option>
                                                <option value="Terlambat" <?php echo ($_REQUEST['status']=="Terlambat") ? "selected" : ""; ?>>Terlambat</option>
                                                <option value="Pulang" <?php echo ($_REQUEST['status']=="Pulang") ? "selected" : ""; ?>>Pulang</option>
                                                <option value="Pulang Cepat" <?php echo ($_REQUEST['status']=="Pulang Cepat") ? "selected" : ""; ?>>Pulang Cepat</option>
                                            </select>
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
<?php 

if (isset($_REQUEST['hapus_absensi'])) {
    $hapus = $this->db->query("DELETE FROM tb_absen WHERE id='".$_REQUEST['id']."'");
    if ($hapus) {
        echo '
        <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-message">
        <strong>Perhatian !! Data berhasil dihapus</strong>
        </div>
        </div>

        ';
    }else{
        echo '
        <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-message">
        <strong>Perhatian !! Data gagal dihapus</strong>
        </div>
        </div>
        ';
    }
}?>
<button class="btn btn-info" style="float: right; background-color: green; color: white; border-color: green "><i class="ti ti-file-spreadsheet"></i>Excel</button> 
<button class="btn btn-danger" style="float: right;"><i class="ti ti-file"></i>PDF</button> 
<div class="table-responsive">
    <table id="table-laporan" class="table border table-striped display" style="width: 100%">
        <thead style="background-color: #f39c12; color: white">
            <tr>
                <th>#</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Keterangan Masuk</th>
                <th>Jam Pulang</th>
                <th>Keterangan Pulang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="11">
                    <center>
                        <div class="spinner-border" role="status">
                          <span class="visually-hidden">Loading...</span>
                      </div> Loading....
                  </center>
              </td>    
          </tr>
      </tbody>
  </table>
</div>

<style type="text/css">
    .wrap{
        white-space: nowrap;
    }
</style>