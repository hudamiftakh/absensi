
<?php 
header('Content-type: text/plain');
$data = [
	'api_key' => 'FMJ5rNIdm8tn3smAHsjgND3YDFD8T8',
	'sender' => '6281330743343',
	'number' => '6285748496135',
	'message' => "*Notifikasi Absensi MIN 1 JOMBANG* \n Absensi siswa Selasa, 12 november 2023 \n \n Nama : *Muhammad Ali* \n Kelas : *6-A* \n Jam Absen : *12:22* \n Keterangan : *Terlambat 120 Menit* \n \n  *Note* :  _Jangan membalas pesan ini, ini adalah pesat otomatis yang dikirim dari sistem aplikasi absensi MIN 1 JOMbang_",
	// 'message' => "Hello, this is the first line.\nThis is the second line."
];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://wa.digitalminsajo.sch.id/send-message',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
	CURLOPT_POSTFIELDS => json_encode($data),
	CURLOPT_HTTPHEADER => array(
		'Content-Type: application/json'
	),
));

$response = curl_exec($curl);
curl_close($curl);
$djson = json_decode($response,true);
if($djson["status"]){
	echo $response;
}else{
	
}



	// $data = [
	// 	'api_key' => 'FMJ5rNIdm8tn3smAHsjgND3YDFD8T8',
	// 	'sender' => '6281330743343',
	// 	'number' => $hp,
	// 	'message' => $text
	// ];
	// $curl = curl_init();
	// curl_setopt_array($curl, array(
	// 	CURLOPT_URL => 'https://wa.digitalminsajo.sch.id/send-message',
	// 	CURLOPT_RETURNTRANSFER => true,
	// 	CURLOPT_ENCODING => '',
	// 	CURLOPT_MAXREDIRS => 10,
	// 	CURLOPT_TIMEOUT => 0,
	// 	CURLOPT_FOLLOWLOCATION => true,
	// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	// 	CURLOPT_CUSTOMREQUEST => 'POST',
	// 	CURLOPT_POSTFIELDS => json_encode($data),
	// 	CURLOPT_HTTPHEADER => array(
	// 		'Content-Type: application/json'
	// 	),
	// ));
	// $response = curl_exec($curl);
	// curl_close($curl);
	// echo $response;