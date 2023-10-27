<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Title -->

  <title>Absensi Digital #MIN1JBG</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="handheldfriendly" content="true" />
  <meta name="MobileOptimized" content="width" />
  <meta name="description" content="Mordenize" />
  <meta name="author" content="" />
  <meta name="keywords" content="Mordenize" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="shortcut icon" type="image/png" href="<?php base_url() ?>assets/logo_min.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/style.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
  <style type="text/css">
    .nav-icon-hover {
      display: none;
    }
    #main-wrapper[data-layout=vertical] .app-header.fixed-header .navbar {
      background: #008d4c !important; 
      padding: 0 0px !important;
      border-radius: 0px !important;
      box-shadow: none !important; 
      margin-top: 0px !important;
    }
    .btn{
      border-radius: 0px !important;
    }
    .card2 {
      position: relative !important;
      display: flex !important;
      flex-direction: column !important;
      min-width: 0 !important;
      word-wrap: break-word !important;
      background-color: #fff !important;
      background-clip: border-box !important;
      border: 1px solid rgba(0,0,0,.2) !important;
      border-radius: 0.25rem;
      color: black;
    }
    .card-body2 {
      flex: 1 1 auto;
      padding: 1rem 1rem;
    }
    .card-header2 {
      padding: 0.5rem 1rem;
      margin-bottom: 0;
      background-color: rgba(0,0,0,.03);
      border-bottom: 1px solid rgba(0,0,0,.125);
    }
    .img-fluid{
      max-width: 1000px !important;
      height: auto;
    }
  </style>
</head>

<body>
  <div class="preloader">
    <img src="<?php echo base_url(); ?>assets/logo_min.png" alt="loader" class="lds-ripple img-fluid" style="width: 16vh; height: 300" /> <BR>
    <center style="font-weight: bold; padding-top: 30%; color: orange;"><label style=" padding: 8px;border-radius: 10px">#MIN 1 JOMBANG <label style="color: green">GODIGITAL</label></label></center>
  </div>
  <div
  class="page-wrapper"
  id="main-wrapper"
  data-layout="vertical"
  data-navbarbg="skin6"
  data-sidebartype="full"
  data-sidebar-position="fixed"
  data-header-position="fixed"
  >
  <aside class="left-sidebar">
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between" style="background-color: #008d4c" >
        <a href="#" class="text-nowrap logo-img">
          <!-- <table>
            <tr>
              <td width="50%" style="text-align: right;"><img src="<?php echo base_url(); ?>assets/logo_min.png" class="dark-logo" width="39" alt="" /></td>
              <td width="50%" style="text-align: left; line-height: 15px; padding-left: 2px">
                <label style="font-weight: bold; color: white; font-size: 19px; padding-top: 10px">E-Absensi</label><br>
                <label style="color: white; font-size: 11px">Min 1 Jombang</label>
              </td>
            </tr>
          </table> -->
          <table style="padding-left: 0px" width="30%" >
            <tr>
                 <!--  <td width="1px">
                    <a href="./" style="color: white"><i style="font-size: 25px" class="ti ti-arrow-left"></i></a>
                  </td> -->
                  <td width="5%" style="text-align: right;"><img src="<?php base_url() ?>assets/logo_min.png" class="dark-logo" width="39" alt="" /></td>
                  <td width="50%" style="text-align: left; line-height: 15px; padding-left: 2px">
                    <label style="font-weight: bold; color: white; font-size: 19px; padding-top: 10px">Madrasah <label style="color: #f9ca24; font-weight: bold;">Digital</label></label><br>
                    <label style="color: white; font-size: 11px;">MIN I Jombang</label>
                  </td>
                </tr>
              </table>

            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse" style="color: white">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <?php 
          if ($this->session->userdata['username']['level']==2) {
           include 'master/menu_absen.php'; 
         }else{
           include 'master/menu.php'; 
         }
         ?>
       </div>
     </aside>
     <div class="body-wrapper">
      <header class="app-header" style="background-color: #008d4c"> 
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link sidebartoggler ms-n3" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2" style="color: white"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end collapse" id="navbarNav" style="">
            <div class="d-flex align-items-center justify-content-between">
              <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                <i class="ti ti-align-justified fs-7"></i>
              </a>
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                  <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="user-profile-img">
                        <img src="<?php echo base_url(); ?>dist/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="">
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">

                    <div class="message-body">
                      <a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                        <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                          <img src="<?php echo base_url(); ?>dist/images/profile/user-1.jpg" alt="" width="24" height="24">
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h6 class="mb-1 bg-hover-primary fw-semibold"> Admin </h6>
                          <span class="d-block text-dark">Account Settings</span>
                        </div>
                      </a>
                    </div>
                    <div class="d-grid py-4 px-7 pt-8">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-outline-primary">Log Out</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <!-- Header End -->

      <div class="container-fluid">
        <?php include $halaman.".php"; ?>
      </div>

      <script type="text/javascript">
        function show_siswa(e) {
          var id = "";
          id =  $("#id").val();

        }
      </script>
      <script src="<?php echo base_url(); ?>dist/libs/jquery/dist/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>dist/libs/simplebar/dist/simplebar.min.js"></script>
      <script src="<?php echo base_url(); ?>dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
      <script src="<?php echo base_url(); ?>dist/js/app.minisidebar.init.js"></script>
      <script src="<?php echo base_url(); ?>dist/js/sidebarmenu.js"></script>
      <script src="<?php echo base_url(); ?>dist/js/custom.js"></script>
      <script src="<?php echo base_url(); ?>dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>dist/js/datatable/datatable-basic.init.js"></script>
      <?php 
      if (isset($_POST['filter'])) {
        $filternya = "?tgl_awal=".$_REQUEST['tgl_awal']."&tgl_akhir=".$_REQUEST['tgl_akhir']."&kelas=".$_REQUEST['kelas']."&status=".$_REQUEST['status'];
      }
      ?>
      <script>
        var tabel = null;
        var tabel2 = null;
        $(document).ready(function() {
          tabel = $('#table-laporan').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "ordering": true, 
            "scrollY": 500,
            "scrollX": true,
            "order": [[ 0, 'asc' ]], 
            "ajax":
            {
              "url": "<?= base_url('laporan_view'.$filternya);?>",
              "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[10, 50],[10, 50]],
            "columns": [
            {"data": 'nama',"sortable": false, 
            render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }  
          },
          { "data": "nis" }, 
          { "data": "nama" }, 
          { "data": "kelas" },  
          { "data": "tanggal", "class" : "wrap" },  
          { "data": "jam_masuk",
          render: function(data, type, row,meta) {
            return '<b>'+data+'</b>';
          }
        },  
        { "data": "keterangan" }, 
        { "data": "jam_pulang",
        render: function(data, type, row,meta) {
          return '<b>'+data+'</b>';
        }
      },  
      { "data": "keterangan_pulang" }, 
      { "data": "id",
      render: function(data, type, row,meta) {
        const txt = "'Apakah anda yakin menghapus data ini ?'";
        return '<form action="" method="POST"><input type="hidden" name="id" value="'+data+'"/> <button type="submit" name="hapus_absensi" title="batalkan" class="btn btn-danger btn-sm" onclick="return confirm('+txt+')"><i class="ti ti-arrow-back"></i></button></form>';
      }
    }, 
    ],
  });

          $(document).ready(function() {
            tabel2 = $('#table-siswa').DataTable({
              "processing": true,
              "responsive":true,
              "serverSide": true,
              "scrollY": 500,
              "scrollX": true,
              "ordering": true, 
              "order": [[ 2, 'asc' ]], 
              "ajax":
              {
                "url": "<?= base_url('data_siswa_show');?>",
                "type": "POST"
              },
              "deferRender": true,
              "aLengthMenu": [[10, 50, 100],[10, 50,100]],
              "columns": [
              {"data": 'foto',   
              render: function (data, type, row, meta) {
                if(!data){
                  return ' <img src="<?php echo base_url(); ?>assets/siswa/blank.jpg" class="rounded-circle  border border-dark" style="width: 80%; height: 80%" >';
                }else{
                  return ' <img src="<?php echo base_url(); ?>assets/siswa/'+data+'" class="rounded-circle  border border-dark" style="width: 80%; height: 80%" >';
                }
              }  
            },
            { "data": "rfid" },
            { "data": "nisn" },
            { "data": "nama" }, 
            { "data": "kelas" }, 
            { "data": "jk" },  
            { "data": "nama_ayah" },  
            { "data": "telepon" },  
            { "data": "alamat" },  
            { "data": "id",
            "render": 
            function( data, type, row, meta ) {
              return '<a href="<?php echo base_url(); ?>act_siswa?id='+data+'" class="btn btn-primary"><i class="ti ti-edit"></i></a><button class="btn btn-danger"><i class="ti ti-trash"></i></button>';
            }
          },
          ],
        });
          });
        });
</script>
<?php include "Perpustakaan/js_perpus.php"; ?>
</body>
</html>
