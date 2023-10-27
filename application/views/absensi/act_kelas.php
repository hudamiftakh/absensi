
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Kelas</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah / Update data Kelas</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">  
                    <img src="<?php echo base_url(); ?>dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
if (!empty($_REQUEST['id'])) {
    $dasis = $this->db->query("SELECT * FROM tb_kelas WHERE id='".$_REQUEST['id']."'")->row_array();
    $dt = explode("-",$dasis['nama']);
}
echo $this->session->flashdata('alert')['alert'];
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Tambah-Edit Kelas</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?php echo base_url(); ?>absensi/save_kelas" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                 <div class="mb-4 row align-items-center">
                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Pilih kelas</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="kelas" required="">
                            <option value="">Kelas</option>
                            <?php for ($i=1; $i <=6 ; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo ($dt[0]==$i) ? "selected": ""; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Abjad</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="abjad" required="">
                            <option value="">Abjad</option>
                            <option value="A" <?php echo ($dt[1]=='A') ? "selected": ""; ?>>A</option>
                            <option value="B" <?php echo ($dt[1]=='B') ? "selected": ""; ?>>B</option>
                            <option value="C" <?php echo ($dt[1]=='C') ? "selected": ""; ?>>C</option>
                            <option value="D" <?php echo ($dt[1]=='D') ? "selected": ""; ?>>D</option>
                            <option value="E" <?php echo ($dt[1]=='E') ? "selected": ""; ?>>E</option>
                            <option value="F" <?php echo ($dt[1]=='F') ? "selected": ""; ?>>F</option>
                            <option value="G" <?php echo ($dt[1]=='G') ? "selected": ""; ?>>G</option>
                            <option value="H" <?php echo ($dt[1]=='F') ? "selected": ""; ?>>H</option>
                            <option value="I" <?php echo ($dt[1]=='I') ? "selected": ""; ?>>I</option>
                            <option value="J" <?php echo ($dt[1]=='J') ? "selected": ""; ?>>J</option>
                            <option value="K" <?php echo ($dt[1]=='K') ? "selected": ""; ?>>K</option>
                            <option value="L" <?php echo ($dt[1]=='L') ? "selected": ""; ?>>L</option>
                            <option value="M" <?php echo ($dt[1]=='M') ? "selected": ""; ?>>M</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 row align-items-center">
                    <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label"></label>
                    <div class="col-sm-9">
                        <a href="<?php echo base_url(); ?>kelas" class="btn btn-danger">Kembali</a>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>