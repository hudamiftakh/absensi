
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">siswa</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted" href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Tambah / Update data siswa</li>
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
    $dasis = $this->db->query("SELECT * FROM tb_siswa WHERE id='".$_REQUEST['id']."'")->row_array();
}
echo $this->session->flashdata('alert')['alert'];
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h5 class="card-title fw-semibold mb-0">Tambah-Edit Siswa</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?php echo base_url(); ?>absensi/save_siswa" method="POST" enctype="multipart/form-data">
                     <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Kode RFID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="rfid" value="<?php echo $dasis['rfid']; ?>" placeholder="Nomor RFID" autofocus>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nis" value="<?php echo $dasis['nis']; ?>" placeholder="NIS (Nomor Induk Siswa)">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $_REQUEST['id']; ?>">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nisn" value="<?php echo $dasis['nisn']; ?>" placeholder="NISN (Nomor Induk Siswa Nasional)">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama"  name="nama" value="<?php echo $dasis['nama']; ?>">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Tempat Lahir"  name="tempat_lahir" value="<?php echo $dasis['tempat_lahir']; ?>">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Tgl Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="Tanggal Lahir Lahir" name="tanggal_lahir" value="<?php echo $dasis['tanggal_lahir']; ?>">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="jk">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" <?php echo ($dasis['jk']=='L') ? "selected": ""; ?>>L</option>
                                <option value="P" <?php echo ($dasis['jk']=='P') ? "selected": ""; ?>>P</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" placeholder="Alamat" name="alamat"><?php echo $dasis['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="kelas">
                                <option value="">Pilih Kelas</option>
                                <?php 
                                $dakel = $this->db->get('tb_kelas')->result_array();
                                foreach ($dakel as $key => $value):
                                    ?>
                                    <option value="<?php echo $value['nama']; ?>" <?php echo ($dasis['kelas']==$value['nama']) ? "selected" : ""; ?>><?php echo $value['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Wa Orangtua</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="WA Orangtua" name="telepone" value="<?php echo $dasis['telepon']; ?>">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Nama Ayah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" value="<?php echo $dasis['nama_ayah']; ?>">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_Ibu" value="<?php echo $dasis['nama_ibu']; ?>">
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <?php if(empty($dasis['foto'])): ?>
                                <input type="file" class="form-control" placeholder="Foto" name="foto">
                                <?php else : ?>
                                    <img src="<?php echo base_url(); ?>assets/siswa/<?php echo $dasis['foto']; ?>" style="width: 15%; height: 15%" class="rounded-circle border border-dark" >
                                    <input type="hidden" class="form-control" value="<?php echo $dasis['foto']; ?>" name="foto_lama">
                                    <input type="file" class="form-control" value="<?php echo $dasis['foto']; ?>" name="foto">
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputPassword1" class="form-label fw-semibold col-sm-2 col-form-label"></label>
                            <div class="col-sm-9">
                                <a href="<?php echo base_url(); ?>siswa" class="btn btn-danger">Kembali</a>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>