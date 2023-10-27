<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-9">
				<h4 class="fw-semibold mb-8">Uploac Siswa CSV</h4>
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


 <form action="upload.php" class="dropzone" id="myDropzone"></form> <br>

  <center><button id="simpanBtn" class="btn btn-primary ">Simpan</button></center>


<script>
    // Konfigurasi Dropzone.js
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#myDropzone", {
      url: "<?php echo base_url(); ?>upload_csv",
      autoProcessQueue: false, // Menonaktifkan otomatis pengiriman file
      paramName: "file", // Nama parameter untuk file
      maxFilesize: 5, // Batasan ukuran file dalam MB
      acceptedFiles: ".csv", // Hanya menerima jenis file tertentu
      addRemoveLinks: true, // Menampilkan tombol untuk menghapus file yang sudah diupload
    });

    // Mengaktifkan tombol Simpan
    document.getElementById("simpanBtn").addEventListener("click", function() {
      myDropzone.processQueue(); // Mengirim file yang ada di queue Dropzone
    });
  </script>