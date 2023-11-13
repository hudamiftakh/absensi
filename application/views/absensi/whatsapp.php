<?php 
$menit = (date('H:i')>'07:00') ? (date('H') - 7) * 60 + (date('i') -0)." Menit" : '';

// $text = "*NOTIFIKASI ABSEN MIN 1 JOMBANG* \n \n Siswa dengan NIS ".$data_siswa['nis']." Atas nama *".$data_siswa['nama']."* Sudah melakukan absensi jam *".date('H:i')."* dengan status *".$keterangan."* ".$menit."";

$text = "*Notifikasi Absensi MIN 1 JOMBANG* \n Absensi siswa Selasa, 12 november 2023 \n \n NIS : *".$data_siswa['nis']."* \n Nama : *".$data_siswa['nama']."* \n Kelas : *".$data_siswa['kelas']."* \n Jam Absen : *".date('H:i')."* \n Keterangan : *".$keterangan."* ".$menit." \n \n  *Note* :  _Jangan membalas pesan ini, ini adalah pesat otomatis yang dikirim dari sistem aplikasi absensi MIN 1 JOMbang_";
$hp =  str_replace('+', '', hp($data_siswa['telepon']));
sendWa1($hp,$text);

// whatsapp api
// $data = array(
//   'chatId'      => $hp.'@c.us',
//   'message'    => $text,
// );
// $options = array(
//   'http' => array(
//     'method'  => 'POST',
//     'content' => json_encode($data),
//     'header'=>  "Content-Type: application/json\r\n" .
//     "Accept: application/json\r\n"
//   )
// );
// $url = "https://ru-api.basis-api.com/waInstance1101000819/sendMessage/8c7b8d6b26d891250cb882937249d2aa5cb3c5c15da36079";
// $context  = stream_context_create( $options );
// $result = file_get_contents( $url, false, $context );

// var_dump($result);
// Watsapp api

// echo $response;


?>