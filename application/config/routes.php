<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'absensi';
$route['login'] = 'absensi/login';
$route['logout'] = 'absensi/logout';
$route['absensi_masuk'] = 'absensi/absensi_masuk';
$route['absensi_pulang'] = 'absensi/absensi_pulang';
$route['siswa'] = 'absensi/siswa';
$route['kelas'] = 'absensi/kelas';
$route['laporan'] = 'absensi/laporan';
$route['laporan_perkelas'] = 'absensi/laporan_perkelas';
$route['act_siswa'] = 'absensi/act_siswa';
$route['laporan_view'] = 'absensi/laporan_view';
$route['data_siswa_show'] = 'absensi/data_siswa_show';
$route['upload_csv'] = 'absensi/upload_csv';
$route['act_kelas'] = 'absensi/act_kelas';
$route['laporan_total'] = 'absensi/laporan_total';
// Perpustakaan
$route['kunjungan'] = 'perpustakaan/kunjungan';
$route['laporan_kunjungan'] = 'perpustakaan/laporan_kunjungan';
$route['buku'] = 'perpustakaan/buku';
$route['show_buku'] = 'perpustakaan/show_buku';
$route['act_buku'] = 'perpustakaan/act_buku';
$route['pinjam'] = 'perpustakaan/pinjam';
$route['act_pinjam'] = 'perpustakaan/act_pinjam';
$route['denda'] = 'perpustakaan/denda';

// Tabungan
$route['tabungan_transaksi'] = 'tabungan/tabungan_transaksi';


$route['404_override'] = '';
$route['cli/migrate'] = 'migration/index';
$route['translate_uri_dashes'] = FALSE;
