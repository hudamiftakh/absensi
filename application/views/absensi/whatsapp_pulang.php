<?php 
$menit = (date('H:i')<'12:00') ? (date('H') - 7) * 60 + (date('i') -0)." Menit" : '';
$text = "*NOTIFIKASI ABSEN MIN 1 JOMBANG* \n \n Siswa dengan NIS ".$data_siswa['nis']." Atas nama *".$data_siswa['nama']."* Sudah melakukan absensi pulang jam *".date('H:i')."* dengan status *".$keterangan_pulang."* ".$menit."
";
$hp =  str_replace('+', '', hp($data_siswa['telepon']));
sendWa1($hp,$text);
?>