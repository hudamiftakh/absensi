<script>
  function showSiswa(kelas) {
    var table = $('#table-siswa-laporan').DataTable({
      "processing": true,
      "responsive":true,
      "serverSide": true,
      "bDestroy": true,
      "scrollY": 500,
      "scrollX": true,
      "ordering": true, 
      "order": [[ 1, 'asc' ]], 
      "ajax":
      {
        "url": "<?= base_url('show_siswa_laporan');?>",
        "type": "POST",
        "data" : function (d){
          d.kelas = kelas
        },
        "async": false,
        "cache": false,
      },
      // "deferRender": true,
      "aLengthMenu": [[10, 50, 100],[10, 50,100]],
      "columns": [
      {"data": 'nis',"sortable": true, 
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      } },
      { "data": "kelas" },
      { "data": "nis" },
      { "data": "nama" },
      { "data": "tanggal_lahir" },
      { "data": "alamat" },
      { "data": "jk" },
      ],
    });
    table.ajax.reload();                                                    
  }
  function totSiswaHadir(tgl_awal, tgl_akhir, kelas){
    var table = $('#table-siswa-hadir').DataTable({
      "processing": true,
      "responsive":true,
      "serverSide": true,
      "bDestroy": true,
      "scrollY": 500,
      "scrollX": true,
      "ordering": true, 
      "order": [[ 1, 'asc' ]], 
      "ajax":
      {
        "url": "<?= base_url('laporan_total_siswa_hadir');?>",
        "type": "POST",
        "data" : {tgl_awal : tgl_awal, tgl_akhir : tgl_akhir, kelas : kelas},
        "async": false,
        "cache": false,
      },
      // "deferRender": true,
      "aLengthMenu": [[10, 50, 100],[10, 50,100]],
      "columns": [
      {"data": 'nis',"sortable": true, 
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      } },
      { "data": "kelas" },
      { "data": "nis" },
      { "data": "nama" },
      { "data": "tanggal" },
      { "data": "jam_masuk" },
      { "data": "keterangan" },
      ],
    });
    table.ajax.reload(); 
  }

  function totSiswaTidakHadir(tgl_awal, tgl_akhir, kelas){
    var table1 = $('#table-siswa-tidak-hadir').DataTable({
      "processing": true,
      "responsive":true,
      "serverSide": true,
      "bDestroy": true,
      "scrollY": 500,
      "scrollX": true,
      "ordering": true, 
      "order": [[ 1, 'asc' ]], 
      "ajax":
      {
        "url": "<?= base_url('laporan_total_siswa_tidak_hadir');?>",
        "type": "POST",
        "data" : {tgl_awal : tgl_awal, tgl_akhir : tgl_akhir, kelas : kelas},
        "async": false,
        "cache": false,
      },
      // "deferRender": true,
      "aLengthMenu": [[10, 50, 100],[10, 50,100]],
      "columns": [
      {"data": 'nis',"sortable": true, 
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      } },
      { "data": "kelas" },
      { "data": "nis" },
      { "data": "nama" },
      { "data": "alamat" },
      { "data": "jk" },
      ],
    });
    table1.ajax.reload(); 
  }

  function totSiswaHadirTepatWaktu(tgl_awal, tgl_akhir, kelas){
    var table1 = $('#table-siswa-hadir-tepat-waktu').DataTable({
      "processing": true,
      "responsive":true,
      "serverSide": true,
      "bDestroy": true,
      "scrollY": 500,
      "scrollX": true,
      "ordering": true, 
      "order": [[ 1, 'asc' ]], 
      "ajax":
      {
        "url": "<?= base_url('laporan_total_siswa_hadir_tepat_waktu');?>",
        "type": "POST",
        "data" : {tgl_awal : tgl_awal, tgl_akhir : tgl_akhir, kelas : kelas},
        "async": false,
        "cache": false,
      },
      // "deferRender": true,
      "aLengthMenu": [[10, 50, 100],[10, 50,100]],
      "columns": [
      {"data": 'nis',"sortable": true, 
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      } },
      { "data": "kelas" },
      { "data": "nis" },
      { "data": "nama" },
      { "data": "tanggal" },
      { "data": "jam_masuk" },
      { "data": "keterangan" },
      ],
    });
    table1.ajax.reload(); 
  }

  function totSiswaHadirTidakTepatWaktu(tgl_awal, tgl_akhir, kelas){
    var table1 = $('#table-siswa-tidak-hadir-tepat-waktu').DataTable({
      "processing": true,
      "responsive":true,
      "serverSide": true,
      "bDestroy": true,
      "scrollY": 500,
      "scrollX": true,
      "ordering": true, 
      "order": [[ 1, 'asc' ]], 
      "ajax":
      {
        "url": "<?= base_url('laporan_total_siswa_hadir_tidak_tepat_waktu');?>",
        "type": "POST",
        "data" : {tgl_awal : tgl_awal, tgl_akhir : tgl_akhir, kelas : kelas},
        "async": false,
        "cache": false,
      },
      // "deferRender": true,
      "aLengthMenu": [[10, 50, 100],[10, 50,100]],
      "columns": [
      {"data": 'nis',"sortable": true, 
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      } },
      { "data": "kelas" },
      { "data": "nis" },
      { "data": "nama" },
      { "data": "tanggal" },
      { "data": "jam_masuk" },
      { "data": "keterangan" },
      ],
    });
    table1.ajax.reload(); 
  }

  function totSiswaAbsenPulang(tgl_awal, tgl_akhir, kelas){
    var table1 = $('#table-siswa-absen-pulang').DataTable({
      "processing": true,
      "responsive":true,
      "serverSide": true,
      "bDestroy": true,
      "scrollY": 500,
      "scrollX": true,
      "ordering": true, 
      "order": [[ 1, 'asc' ]], 
      "ajax":
      {
        "url": "<?= base_url('table_siswa_absen_pulang');?>",
        "type": "POST",
        "data" : {tgl_awal : tgl_awal, tgl_akhir : tgl_akhir, kelas : kelas},
        "async": false,
        "cache": false,
      },
      // "deferRender": true,
      "aLengthMenu": [[10, 50, 100],[10, 50,100]],
      "columns": [
      {"data": 'nis',"sortable": true, 
      render: function (data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      } },
      { "data": "kelas" },
      { "data": "nis" },
      { "data": "nama" },
      { "data": "tanggal" },
      { "data": "jam_masuk" },
      { "data": "keterangan_pulang" },
      ],
    });
    table1.ajax.reload(); 
  }
</script>