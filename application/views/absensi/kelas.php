
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Data Kelas</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">List data kelas</li>
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
<?php 

if (isset($_REQUEST['hapus'])) {
    $hapus = $this->db->query("DELETE FROM tb_kelas WHERE id='".$_REQUEST['id']."'");
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
<a href="<?php echo base_url(); ?>act_kelas" class="btn btn-primary"><i class="ti ti-plus"></i> Tambah</a> 
<br>
<br>
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-striped" id="config-table">
                        <thead style="background-color: #f39c12; color: white; width: 10% !important">
                            <tr>
                                <th>#</th>
                                <th>kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            $kelas = $this->db->get('tb_kelas')->result_array();
                            foreach ($kelas as $key => $data) {
                                ?>
                                <tr>
                                    <td width="1%"><?php echo $no++; ?></td>
                                    <td width="20%"><?php echo $data['nama']; ?></td>
                                    <td width="1%" nowrap="">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <a href="<?php echo base_url(); ?>act_kelas?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="ti ti-edit"></i></a>
                                            <button class="btn btn-danger" name="hapus" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
