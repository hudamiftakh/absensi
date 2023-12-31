
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--  Title -->
  <title>Aplikasi digital MIN 1 JOMBANG</title>
  <!--  Favicon -->
  <!-- <link rel="shortcut icon" type="image/png" href="../landing/dist/images/logos/favicon.ico"> -->
  <link rel="shortcut icon" type="image/png" href="<?php base_url() ?>assets/logo_min.png" />
  <!--  Aos --><link rel="stylesheet" href="<?php echo base_url(); ?>dist/landing/aos.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/style.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/landing/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/landing/style.min.css">
</head>

<body>
  <div class="page-wrapper p-0 overflow-hidden">
    <header class="header">
      <nav class="navbar navbar-expand-lg py-0" style="background-color: #008d4c" >
        <div class="container">
          <a class="navbar-brand me-0 py-0" href="#">
          	<table style="padding-left: 0px" width="30%" >
              <tr>
                 <!--  <td width="1px">
                    <a href="./" style="color: white"><i style="font-size: 25px" class="ti ti-arrow-left"></i></a>
                  </td> -->
                  <td width="5%" style="text-align: right;"><img src="<?php base_url() ?>assets/logo_min.png" class="dark-logo" width="45" alt="" /></td>
                  <td width="50%" style="text-align: left; line-height: 15px; padding-left: 2px">
                    <label style="font-weight: bold; color: white; font-size: 29px; padding-top: 10px">Aplikasi <label style="color: #f9ca24; font-weight: bold;">Absensi</label></label><br>
                    <label style="color: white; font-size: 11px;">MIN I Jombang</label>
                  </td>
                </tr>
              </table>
            </a>
          </div>
        </nav>
      </header>
      <div class="body-wrapper overflow-hidden">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-11">
          <div class="container">
            <div class="row align-items-center" style="padding-top: 0px">
              <div class="col-xl-6">
                <div class="hero-content my-xl-0">
                  <label style="font-size: 20px"><i style="font-size: 20px" class="ti ti-rocket text-secondary fs-6"></i> Selamat datang !!</label>
                  <h1 class="fw-bolder mb-8 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">Aplikasi <span style="color: #008d4c;">Absensi Digital</span></h1>
                  <p class="fs-5 mb-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">Aplikasi Absensi Digital MIN 1 JOMBANG adalah solusi modern untuk mengelola kehadiran siswa di Madrasah MIN 1 Jombang. Aplikasi ini memungkinkan pencatatan absensi yang efisien, pemantauan waktu, dan pelaporan yang akurat, memudahkan administrasi sekolah dalam manajemen kehadiran.</p>

                  <!-- <a href="<?php echo base_url(); ?>absensi_masuk" 
                    class="btn btn-primary px-5 btn-hover-shadow d-block mb-3 mb-sm-0">
                    <i class="ti ti-clipboard"></i> Absensi Masuk
                  </a>
                  <a href="<?php echo base_url(); ?>absensi_pulang" 
                    class="btn btn-success px-5 btn-hover-shadow d-block mb-3 mb-sm-0">
                    <i class="ti ti-clipboard"></i>  Absensi Pulang
                  </a> -->

                  <div class="d-sm-flex align-items-center gap-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                    <a class="btn btn-primary px-5 btn-hover-shadow d-block mb-3 mb-sm-0" href="<?php echo base_url(); ?>absensi_masuk"><i class="ti ti-clipboard"></i> Absensi Masuk</a>
                    <a class="btn btn-success d-block scroll-link" href="<?php echo base_url(); ?>absensi_pulang"><i class="ti ti-clipboard"></i> Absensi Pulang</a>
                  </div>
                </div>
              </div>
              <style type="text/css">

                .hero-section .hero-img-slide {
                 min-width: 0px !important; 
                 height: 0px !important; 
               }
             </style>
             <div class="col-xl-6">
              <div class="position-relative p-4 rounded">
                <div style="padding-top: 5%">
                  <!-- <center> -->
                    <div class="row">
                      <div class="col-sm-12" style="padding-left: 20px; padding-top: 10px">
                        <center>
                          <img src="<?php echo base_url(); ?>assets/absensi_online.png" width="80%">
                          <!-- <h2><b>Absensi MIN 1 JBG</b></h2><br> -->
                        </center>
                      </div>
                      <div class="col-sm-6">
                      </div>
                    </div>
                  </div>

                  <!-- </center> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="footer-part pt-8 pb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="text-center">
              <a href="index-new.html">
                <img src="../landingpage/dist/images/logos/favicon.ico" alt="" class="img-fluid pb-3">
              </a>
              <p class="mb-0 text-dark">Absensi MIN 1 jombang <a
                class="text-dark text-hover-primary border-bottom border-primary"
                href="https://digitalminsajo.sch.id">APLIKASI MIN 1 JOMBANG.</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="<?php echo base_url(); ?>dist/landing/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/landing/aos.js"></script>
    <script src="<?php echo base_url(); ?>dist/landing/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/landing/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/landing/custom.js"></script>
  </body>

  </html>