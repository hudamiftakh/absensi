
<?php 

$data = [
	'api_key' => 'efacb2a793deade57af9fb2fd3f79b91911c5324',
	'sender' => '6281330743343',
	'number' => '6285748496135',
	'message' => '*NOTIFIKASI ABSEN MIN 1 JOMBANG* Siswa dengan NIS 237563727 Atas nama *Mahardhika Arya Bimnantara* Sudah melakukan absensi jam *11:31* dengan status *Terlambat* 271 Menit '
];
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://wa.srv2.wapanels.com/send-message',
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
echo $response;