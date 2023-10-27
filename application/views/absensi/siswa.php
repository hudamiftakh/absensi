
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Data siswa</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">List data siswa</li>
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
<a href="<?php echo base_url(); ?>act_siswa" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah</a> 
<a href="<?php echo base_url(); ?>upload_csv" class="btn btn-success"><i class="ti ti-upload"></i> Import CSV</a> 
<br>
<br>
<div class="table-responsive">
    <table id="table-siswa" class="table border table-striped display" style="width: 100%">
        <thead style="background-color: #f39c12; color: white">
            <!-- start row -->
            <tr>
                <th width="100px">Foto</th>
                <th>RFID</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>JK</th>
                <th>Orang Tua</th>
                <th>WA</th>
                <th>Alamat</th>
                <th nowrap="">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="9">
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
    .dataTables_filter, .dataTables_length {
        margin-bottom: 0px !important;
    }
    .wrap{
        white-space: nowrap;
    }
</style>