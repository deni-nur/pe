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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['portal/(:num)/dashboard'] = 'dashboard';

$route['portal/(:num)/darhum'] = 'darhum';
$route['portal/(:num)/darhum/add'] = 'darhum/add';
$route['portal/(:num)/darhum/edit/(:num)'] = 'darhum/edit/$1';

$route['portal/(:num)/pangkat'] = 'pangkat';
$route['portal/(:num)/pangkat/add'] = 'pangkat/add';
$route['portal/(:num)/pangkat/edit/(:num)'] = 'pangkat/edit/$1';

$route['portal/(:num)/golongan'] = 'golongan';
$route['portal/(:num)/golongan/add'] = 'golongan/add';
$route['portal/(:num)/golongan/edit/(:num)'] = 'golongan/edit/$1';

$route['portal/(:num)/jabatan'] = 'jabatan';
$route['portal/(:num)/jabatan/add'] = 'jabatan/add';
$route['portal/(:num)/jabatan/edit/(:num)'] = 'jabatan/edit/$1';

$route['portal/(:num)/pegawai'] = 'pegawai';
$route['portal/(:num)/pegawai/add'] = 'pegawai/add';
$route['portal/(:num)/pegawai/edit/(:num)'] = 'pegawai/edit/$1';
$route['portal/(:num)/pegawai/nip_barcode_qrcode/(:num)'] = 'pegawai/nip_barcode_qrcode/$1';
$route['portal/(:num)/pegawai/nip_barcode_print/(:num)'] = 'pegawai/nip_barcode_print/$1';
$route['portal/(:num)/pegawai/nip_qrcode_print/(:num)'] = 'pegawai/nip_qrcode_print/$1';

$route['portal/(:num)/ttd'] = 'ttd';
$route['portal/(:num)/ttd/add'] = 'ttd/add';
$route['portal/(:num)/ttd/edit/(:num)'] = 'ttd/edit/$1';

$route['portal/(:num)/ttd_keu'] = 'ttd_keu';
$route['portal/(:num)/ttd_keu/add'] = 'ttd_keu/add';
$route['portal/(:num)/ttd_keu/edit/(:num)'] = 'ttd_keu/edit/$1';

$route['portal/(:num)/rekening'] = 'rekening';
$route['portal/(:num)/rekening/add'] = 'rekening/add';
$route['portal/(:num)/rekening/edit/(:num)'] = 'rekening/edit/$1';

$route['portal/(:num)/provinsi'] = 'provinsi';
$route['portal/(:num)/provinsi/add'] = 'provinsi/add';
$route['portal/(:num)/provinsi/edit/(:num)'] = 'provinsi/edit/$1';

$route['portal/(:num)/kabupaten'] = 'kabupaten';
$route['portal/(:num)/kabupaten/add'] = 'kabupaten/add';
$route['portal/(:num)/kabupaten/edit/(:num)'] = 'kabupaten/edit/$1';

$route['portal/(:num)/kecamatan'] = 'kecamatan';
$route['portal/(:num)/kecamatan/add'] = 'kecamatan/add';
$route['portal/(:num)/kecamatan/edit/(:num)'] = 'kecamatan/edit/$1';

$route['portal/(:num)/desa'] = 'desa';
$route['portal/(:num)/desa/add'] = 'desa/add';
$route['portal/(:num)/desa/edit/(:num)'] = 'desa/edit/$1';

$route['portal/(:num)/dd'] = 'dd';
$route['portal/(:num)/dd/add'] = 'dd/add';
$route['portal/(:num)/dd/edit/(:num)'] = 'dd/edit/$1';

$route['portal/(:num)/ld'] = 'ld';
$route['portal/(:num)/ld/add'] = 'ld/add';
$route['portal/(:num)/ld/edit/(:num)'] = 'ld/edit/$1';

$route['portal/(:num)/akun'] = 'akun';
$route['portal/(:num)/akun/add'] = 'akun/add';
$route['portal/(:num)/akun/edit/(:num)'] = 'akun/edit/$1';

$route['portal/(:num)/kelompok'] = 'kelompok';
$route['portal/(:num)/kelompok/add'] = 'kelompok/add';
$route['portal/(:num)/kelompok/edit/(:num)'] = 'kelompok/edit/$1';

$route['portal/(:num)/jenis'] = 'jenis';
$route['portal/(:num)/jenis/add'] = 'jenis/add';
$route['portal/(:num)/jenis/edit/(:num)'] = 'jenis/edit/$1';

$route['portal/(:num)/objek'] = 'objek';
$route['portal/(:num)/objek/add'] = 'objek/add';
$route['portal/(:num)/objek/edit/(:num)'] = 'objek/edit/$1';

$route['portal/(:num)/rincian_objek'] = 'rincian_objek';
$route['portal/(:num)/rincian_objek/add'] = 'rincian_objek/add';
$route['portal/(:num)/rincian_objek/edit/(:num)'] = 'rincian_objek/edit/$1';

$route['portal/(:num)/sub_rincian_objek'] = 'sub_rincian_objek';
$route['portal/(:num)/sub_rincian_objek/add'] = 'sub_rincian_objek/add';
$route['portal/(:num)/sub_rincian_objek/edit/(:num)'] = 'sub_rincian_objek/edit/$1';

$route['portal/(:num)/sasaran_rpjmd'] = 'sasaran_rpjmd';
$route['portal/(:num)/sasaran_rpjmd/add'] = 'sasaran_rpjmd/add';
$route['portal/(:num)/sasaran_rpjmd/edit/(:num)'] = 'sasaran_rpjmd/edit/$1';
$route['portal/(:num)/sasaran_rpjmd/(:num)/indikator_sasaran_rpjmd_add'] = 'sasaran_rpjmd/indikator_sasaran_rpjmd_add';
$route['portal/(:num)/sasaran_rpjmd/(:num)/indikator_sasaran_rpjmd_edit/(:num)'] = 'sasaran_rpjmd/indikator_sasaran_rpjmd_edit/$1';
$route['portal/(:num)/sasaran_rpjmd/(:num)/indikator_sasaran_rpjmd_realisasi/(:num)'] = 'sasaran_rpjmd/indikator_sasaran_rpjmd_realisasi/$1';

$route['portal/(:num)/urusan'] = 'urusan';
$route['portal/(:num)/urusan/add'] = 'urusan/add';
$route['portal/(:num)/urusan/edit/(:num)'] = 'urusan/edit/$1';

$route['portal/(:num)/bidang_urusan'] = 'bidang_urusan';
$route['portal/(:num)/bidang_urusan/add'] = 'bidang_urusan/add';
$route['portal/(:num)/bidang_urusan/edit/(:num)'] = 'bidang_urusan/edit/$1';

$route['portal/(:num)/tujuan'] = 'tujuan';
$route['portal/(:num)/tujuan/add'] = 'tujuan/add';
$route['portal/(:num)/tujuan/edit/(:num)'] = 'tujuan/edit/$1';
$route['portal/(:num)/tujuan/(:num)/indikator_tujuan_add'] = 'tujuan/indikator_tujuan_add';
$route['portal/(:num)/tujuan/(:num)/indikator_tujuan_edit/(:num)'] = 'tujuan/indikator_tujuan_edit/$1';
$route['portal/(:num)/tujuan/(:num)/indikator_tujuan_realisasi/(:num)'] = 'tujuan/indikator_tujuan_realisasi/$1';

$route['portal/(:num)/sasaran'] = 'sasaran';
$route['portal/(:num)/tujuan/(:num)/sasaran/add'] = 'sasaran/add';
$route['portal/(:num)/tujuan/(:num)/sasaran/edit/(:num)'] = 'sasaran/edit/$1';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/indikator_sasaran_add'] = 'sasaran/indikator_sasaran_add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/indikator_sasaran_edit/(:num)'] = 'sasaran/indikator_sasaran_edit/$1';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/indikator_sasaran_realisasi/(:num)'] = 'sasaran/indikator_sasaran_realisasi/$1';

$route['portal/(:num)/program'] = 'program';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/add'] = 'program/add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/edit/(:num)'] = 'program/edit/$1';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/indikator_program_add'] = 'program/indikator_program_add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/indikator_program_edit/(:num)'] = 'program/indikator_program_edit/$1';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/indikator_program_realisasi/(:num)'] = 'program/indikator_program_realisasi/$1';

$route['portal/(:num)/kegiatan'] = 'kegiatan';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/add'] = 'kegiatan/add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/edit/(:num)'] = 'kegiatan/edit/$1';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/(:num)/indikator_kegiatan_add'] = 'kegiatan/indikator_kegiatan_add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/(:num)/indikator_kegiatan_edit/(:num)'] = 'kegiatan/indikator_kegiatan_edit/$1';

$route['portal/(:num)/subkeg'] = 'subkeg';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/(:num)/subkeg/add'] = 'subkeg/add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/(:num)/subkeg/edit/(:num)'] = 'subkeg/edit/$1';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/(:num)/subkeg/(:num)/indikator_subkeg_add'] = 'subkeg/indikator_subkeg_add';
$route['portal/(:num)/tujuan/(:num)/sasaran/(:num)/program/(:num)/kegiatan/(:num)/subkeg/(:num)/indikator_subkeg_edit/(:num)'] = 'subkeg/indikator_subkeg_edit/$1';

$route['portal/(:num)/pad'] = 'pad';
$route['portal/(:num)/pad/add'] = 'pad/add';
$route['portal/(:num)/pad/edit/(:num)'] = 'pad/edit/$1';
$route['portal/(:num)/pad/realisasi/(:num)'] = 'pad/realisasi/$1';

$route['portal/(:num)/dpa'] = 'dpa';
$route['portal/(:num)/dpa/add'] = 'dpa/add';
$route['portal/(:num)/dpa/edit/(:num)'] = 'dpa/edit/$1';
$route['portal/(:num)/dpa/(:num)/belanja'] = 'dpa/belanja';
$route['portal/(:num)/dpa/(:num)/belanja_add'] = 'dpa/belanja_add';
$route['portal/(:num)/dpa/(:num)/belanja_edit/(:num)'] = 'dpa/belanja_edit/$1';
$route['portal/(:num)/dpa/(:num)/belanja_pergeseran/(:num)'] = 'dpa/belanja_pergeseran/$1';
$route['portal/(:num)/dpa/(:num)/belanja_perubahan/(:num)'] = 'dpa/belanja_perubahan/$1';

$route['portal/(:num)/iku'] = 'iku';
$route['portal/(:num)/iku/add'] = 'iku/add';
$route['portal/(:num)/iku/edit/(:num)'] = 'iku/edit/$1';
$route['portal/(:num)/iku/cetak/(:num)'] = 'iku/cetak/$1';

$route['portal/(:num)/pk_kadis'] = 'pk_kadis';
$route['portal/(:num)/pk_kadis/add'] = 'pk_kadis/add';
$route['portal/(:num)/pk_kadis/edit/(:num)'] = 'pk_kadis/edit/$1';
$route['portal/(:num)/pk_kadis/cetak/(:num)'] = 'pk_kadis/cetak/$1';
$route['portal/(:num)/pk_kadis/cetak_lampiran/(:num)'] = 'pk_kadis/cetak_lampiran/$1';
$route['portal/(:num)/pk_kadis/(:num)/lampiran'] = 'pk_kadis/lampiran';
$route['portal/(:num)/pk_kadis/(:num)/lampiran_add'] = 'pk_kadis/lampiran_add';
$route['portal/(:num)/pk_kadis/(:num)/lampiran_edit/(:num)'] = 'pk_kadis/lampiran_edit/$1';
$route['portal/(:num)/pk_kadis/(:num)/lampiran/(:num)/program_pk_kadis'] = 'pk_kadis/program_pk_kadis';
$route['portal/(:num)/pk_kadis/(:num)/lampiran/(:num)/program_pk_kadis_add'] = 'pk_kadis/program_pk_kadis_add';
$route['portal/(:num)/pk_kadis/(:num)/lampiran/(:num)/program_pk_kadis_edit/(:num)'] = 'pk_kadis/program_pk_kadis_edit/$1';

$route['portal/(:num)/pk_kabid'] = 'pk_kabid';
$route['portal/(:num)/pk_kabid/add'] = 'pk_kabid/add';
$route['portal/(:num)/pk_kabid/edit/(:num)'] = 'pk_kabid/edit/$1';
$route['portal/(:num)/pk_kabid/cetak/(:num)'] = 'pk_kabid/cetak/$1';
$route['portal/(:num)/pk_kabid/cetak_lampiran/(:num)'] = 'pk_kabid/cetak_lampiran/$1';
$route['portal/(:num)/pk_kabid/(:num)/lampiran'] = 'pk_kabid/lampiran';
$route['portal/(:num)/pk_kabid/(:num)/lampiran_add'] = 'pk_kabid/lampiran_add';
$route['portal/(:num)/pk_kabid/(:num)/lampiran_edit/(:num)'] = 'pk_kabid/lampiran_edit/$1';
$route['portal/(:num)/pk_kabid/(:num)/lampiran/(:num)/program_pk_kabid'] = 'pk_kabid/program_pk_kabid';
$route['portal/(:num)/pk_kabid/(:num)/lampiran/(:num)/program_pk_kabid_add'] = 'pk_kabid/program_pk_kabid_add';
$route['portal/(:num)/pk_kabid/(:num)/lampiran/(:num)/program_pk_kabid_edit/(:num)'] = 'pk_kabid/program_pk_kabid_edit/$1';

$route['portal/(:num)/pk_kasi'] = 'pk_kasi';
$route['portal/(:num)/pk_kasi/add'] = 'pk_kasi/add';
$route['portal/(:num)/pk_kasi/edit/(:num)'] = 'pk_kasi/edit/$1';
$route['portal/(:num)/pk_kasi/cetak/(:num)'] = 'pk_kasi/cetak/$1';
$route['portal/(:num)/pk_kasi/cetak_lampiran/(:num)'] = 'pk_kasi/cetak_lampiran/$1';
$route['portal/(:num)/pk_kasi/(:num)/lampiran'] = 'pk_kasi/lampiran';
$route['portal/(:num)/pk_kasi/(:num)/lampiran_add'] = 'pk_kasi/lampiran_add';
$route['portal/(:num)/pk_kasi/(:num)/lampiran_edit/(:num)'] = 'pk_kasi/lampiran_edit/$1';
$route['portal/(:num)/pk_kasi/(:num)/lampiran/(:num)/kegiatan_pk_kasi'] = 'pk_kasi/kegiatan_pk_kasi';
$route['portal/(:num)/pk_kasi/(:num)/lampiran/(:num)/kegiatan_pk_kasi_add'] = 'pk_kasi/kegiatan_pk_kasi_add';
$route['portal/(:num)/pk_kasi/(:num)/lampiran/(:num)/kegiatan_pk_kasi_edit/(:num)'] = 'pk_kasi/kegiatan_pk_kasi_edit/$1';

$route['portal/(:num)/pk_kadis_perubahan'] = 'pk_kadis_perubahan';
$route['portal/(:num)/pk_kadis_perubahan/add'] = 'pk_kadis_perubahan/add';
$route['portal/(:num)/pk_kadis_perubahan/edit/(:num)'] = 'pk_kadis_perubahan/edit/$1';
$route['portal/(:num)/pk_kadis_perubahan/cetak/(:num)'] = 'pk_kadis_perubahan/cetak/$1';
$route['portal/(:num)/pk_kadis_perubahan/cetak_lampiran/(:num)'] = 'pk_kadis_perubahan/cetak_lampiran/$1';
$route['portal/(:num)/pk_kadis_perubahan/(:num)/lampiran'] = 'pk_kadis_perubahan/lampiran';
$route['portal/(:num)/pk_kadis_perubahan/(:num)/lampiran_add'] = 'pk_kadis_perubahan/lampiran_add';
$route['portal/(:num)/pk_kadis_perubahan/(:num)/lampiran_edit/(:num)'] = 'pk_kadis_perubahan/lampiran_edit/$1';
$route['portal/(:num)/pk_kadis_perubahan/(:num)/lampiran/(:num)/program_pk_kadis'] = 'pk_kadis_perubahan/program_pk_kadis';
$route['portal/(:num)/pk_kadis_perubahan/(:num)/lampiran/(:num)/program_pk_kadis_add'] = 'pk_kadis_perubahan/program_pk_kadis_add';
$route['portal/(:num)/pk_kadis_perubahan/(:num)/lampiran/(:num)/program_pk_kadis_edit/(:num)'] = 'pk_kadis_perubahan/program_pk_kadis_edit/$1';

$route['portal/(:num)/st'] = 'st';
$route['portal/(:num)/st/add'] = 'st/add';
$route['portal/(:num)/st/edit/(:num)'] = 'st/edit/$1';
$route['portal/(:num)/st/cetak/(:num)'] = 'st/cetak/$1';
$route['portal/(:num)/st/cetak2/(:num)'] = 'st/cetak2/$1';
$route['portal/(:num)/st/(:num)/pengikut'] = 'pengikut';
$route['portal/(:num)/st/(:num)/pengikut/add'] = 'pengikut/add';
$route['portal/(:num)/st/(:num)/pengikut/edit/(:num)'] = 'pengikut/edit/$1';

$route['portal/(:num)/lhpd'] = 'lhpd';
$route['portal/(:num)/lhpd/add'] = 'lhpd/add';
$route['portal/(:num)/lhpd/edit/(:num)'] = 'lhpd/edit/$1';
$route['portal/(:num)/lhpd/cetak/(:num)'] = 'lhpd/cetak/$1';
$route['portal/(:num)/lhpd/cetak_baru/(:num)/(:num)'] = 'lhpd/cetak_baru/$1/$1';
$route['portal/(:num)/lhpd/(:num)/gambar_data'] = 'lhpd/gambar_data';
$route['portal/(:num)/lhpd/(:num)/gambar_add'] = 'lhpd/gambar_add';
$route['portal/(:num)/lhpd/(:num)/gambar_edit/(:num)'] = 'lhpd/gambar_edit/$1';

$route['portal/(:num)/sppd'] = 'sppd';
$route['portal/(:num)/sppd/add'] = 'sppd/add';
$route['portal/(:num)/sppd/edit/(:num)'] = 'sppd/edit/$1';
$route['portal/(:num)/sppd/cetak/(:num)'] = 'sppd/cetak/$1';

$route['portal/(:num)/pp'] = 'pp';
$route['portal/(:num)/pp/add'] = 'pp/add';
$route['portal/(:num)/pp/edit/(:num)'] = 'pp/edit/$1';
$route['portal/(:num)/pp/cetak/(:num)'] = 'pp/cetak/$1';
$route['portal/(:num)/pp/(:num)/r_pp_data'] = 'pp/r_pp_data';
$route['portal/(:num)/pp/(:num)/r_pp_add'] = 'pp/r_pp_add';
$route['portal/(:num)/pp/(:num)/r_pp_edit/(:num)'] = 'pp/r_pp_edit/$1';
$route['portal/(:num)/pp/(:num)/filter'] = 'pp/filter';
$route['portal/(:num)/pp/(:num)/nota_dinas'] = 'pp/nota_dinas';

$route['portal/(:num)/kwitansi'] = 'kwitansi';
$route['portal/(:num)/kwitansi/(:num)/belanja'] = 'kwitansi/belanja';
$route['portal/(:num)/kwitansi/(:num)/belanja/(:num)/data'] = 'kwitansi/data';
$route['portal/(:num)/kwitansi/(:num)/belanja/(:num)/add'] = 'kwitansi/add';
$route['portal/(:num)/kwitansi/(:num)/belanja/(:num)/edit/(:num)'] = 'kwitansi/edit/$1';
$route['portal/(:num)/kwitansi/(:num)/belanja/(:num)/cetak/(:num)'] = 'kwitansi/cetak/$1';
$route['portal/(:num)/kwitansi/(:num)/belanja/(:num)/cetak2/(:num)'] = 'kwitansi/cetak2/$1';
$route['portal/(:num)/kwitansi/(:num)/belanja/(:num)/cetak_dinas_biasa/(:num)'] = 'kwitansi/cetak_dinas_biasa/$1';

$route['portal/(:num)/rekap'] = 'rekap';
$route['portal/(:num)/rekap/cetak_rincian/(:num)/(:num)'] = 'rekap/cetak_rincian/$1/$1';
$route['portal/(:num)/rekap/cetak_belanja/(:num)/(:num)'] = 'rekap/cetak_belanja/$1/$1';
$route['portal/(:num)/rekap/(:num)/belanja_data'] = 'rekap/belanja_data';
$route['portal/(:num)/rekap/(:num)/belanja_data/(:num)/rincian_belanja_data'] = 'rekap/rincian_belanja_data';
$route['portal/(:num)/rekap/(:num)/belanja_data/(:num)/cetak_dinas_biasa'] = 'rekap/cetak_rincian_belanja_dinas_biasa';
$route['portal/(:num)/rekap/(:num)/belanja_data/(:num)/cetak_dalam_kota'] = 'rekap/cetak_rincian_belanja_dalam_kota';
$route['portal/(:num)/rekap/(:num)/belanja_data/cetak_rekap_perkode_rekening'] = 'rekap/cetak_rekap_perkode_rekening';

$route['portal/(:num)/pelatihan'] = 'pelatihan';
$route['portal/(:num)/pelatihan/add'] = 'pelatihan/add';
$route['portal/(:num)/pelatihan/edit/(:num)'] = 'pelatihan/edit/$1';
$route['portal/(:num)/pelatihan/form'] = 'pelatihan/form';
$route['portal/(:num)/pelatihan/import'] = 'pelatihan/import';
$route['portal/(:num)/pelatihan/view'] = 'pelatihan/view';

$route['portal/(:num)/kelembagaan'] = 'kelembagaan/lembaga';
$route['portal/(:num)/kelembagaan/add'] = 'kelembagaan/add';
$route['portal/(:num)/kelembagaan/edit/(:num)'] = 'kelembagaan/edit/$1';
$route['portal/(:num)/kelembagaan/cetak'] = 'kelembagaan/cetak';

$route['portal/(:num)/bkk'] = 'bkk';
$route['portal/(:num)/bkk/add'] = 'bkk/add';
$route['portal/(:num)/bkk/edit/(:num)'] = 'bkk/edit/$1';
$route['portal/(:num)/bkk/form'] = 'bkk/form';
$route['portal/(:num)/bkk/import'] = 'bkk/import';
$route['portal/(:num)/bkk/view'] = 'bkk/view';

$route['portal/(:num)/padat_karya'] = 'padat_karya';
$route['portal/(:num)/padat_karya/add'] = 'padat_karya/add';
$route['portal/(:num)/padat_karya/edit/(:num)'] = 'padat_karya/edit/$1';
$route['portal/(:num)/padat_karya/form'] = 'padat_karya/form';
$route['portal/(:num)/padat_karya/import'] = 'padat_karya/import';
$route['portal/(:num)/padat_karya/view'] = 'padat_karya/view';

$route['portal/(:num)/tkm'] = 'tkm';
$route['portal/(:num)/tkm/add'] = 'tkm/add';
$route['portal/(:num)/tkm/edit/(:num)'] = 'tkm/edit/$1';
$route['portal/(:num)/tkm/form'] = 'tkm/form';
$route['portal/(:num)/tkm/import'] = 'tkm/import';
$route['portal/(:num)/tkm/view'] = 'tkm/view';

$route['portal/(:num)/pmi'] = 'pmi';
$route['portal/(:num)/pmi/add'] = 'pmi/add';
$route['portal/(:num)/pmi/edit/(:num)'] = 'pmi/edit/$1';
$route['portal/(:num)/pmi/form'] = 'pmi/form';
$route['portal/(:num)/pmi/import'] = 'pmi/import';
$route['portal/(:num)/pmi/view'] = 'pmi/view';

$route['portal/(:num)/pmi_kasus'] = 'pmi_kasus';
$route['portal/(:num)/pmi_kasus/add'] = 'pmi_kasus/add';
$route['portal/(:num)/pmi_kasus/edit/(:num)'] = 'pmi_kasus/edit/$1';
$route['portal/(:num)/pmi_kasus/form'] = 'pmi_kasus/form';
$route['portal/(:num)/pmi_kasus/import'] = 'pmi_kasus/import';
$route['portal/(:num)/pmi_kasus/view'] = 'pmi_kasus/view';

$route['portal/(:num)/tka'] = 'tka';
$route['portal/(:num)/tka/(:num)/data_tka'] = 'tka/data_tka';
$route['portal/(:num)/tka/(:num)/add'] = 'tka/add';
$route['portal/(:num)/tka/(:num)/edit/(:num)'] = 'tka/edit/$1';
$route['portal/(:num)/tka/(:num)/form'] = 'tka/form';
$route['portal/(:num)/tka/(:num)/import'] = 'tka/import';
$route['portal/(:num)/tka/(:num)/view'] = 'tka/view';

$route['portal/(:num)/perusahaan'] = 'perusahaan';
$route['portal/(:num)/perusahaan/add'] = 'perusahaan/add';
$route['portal/(:num)/perusahaan/edit/(:num)'] = 'perusahaan/edit/$1';
$route['portal/(:num)/perusahaan/form'] = 'perusahaan/form';
$route['portal/(:num)/perusahaan/import'] = 'perusahaan/import';
$route['portal/(:num)/perusahaan/view'] = 'perusahaan/view';

$route['portal/(:num)/umk'] = 'umk';
$route['portal/(:num)/umk/add'] = 'umk/add';
$route['portal/(:num)/umk/edit/(:num)'] = 'umk/edit/$1';

$route['portal/(:num)/spsb'] = 'spsb';
$route['portal/(:num)/spsb/add'] = 'spsb/add';
$route['portal/(:num)/spsb/edit/(:num)'] = 'spsb/edit/$1';

$route['portal/(:num)/translok'] = 'translok';
$route['portal/(:num)/translok/add'] = 'translok/add';
$route['portal/(:num)/translok/edit/(:num)'] = 'translok/edit/$1';

$route['portal/(:num)/pnp_trans'] = 'pnp_trans';
$route['portal/(:num)/pnp_trans/add'] = 'pnp_trans/add';
$route['portal/(:num)/pnp_trans/edit/(:num)'] = 'pnp_trans/edit/$1';
$route['portal/(:num)/pnp_trans/(:num)/anggota_trans'] = 'anggota_trans';
$route['portal/(:num)/pnp_trans/(:num)/anggota_trans/add'] = 'anggota_trans/add';
$route['portal/(:num)/pnp_trans/(:num)/anggota_trans/edit/(:num)'] = 'anggota_trans/edit/$1';

$route['portal/(:num)/dokren'] = 'dokren';
$route['portal/(:num)/dokren/add'] = 'dokren/add';
$route['portal/(:num)/dokren/edit/(:num)'] = 'dokren/edit/$1';

$route['portal/(:num)/dokev'] = 'dokev';
$route['portal/(:num)/dokev/add'] = 'dokev/add';
$route['portal/(:num)/dokev/edit/(:num)'] = 'dokev/edit/$1';

$route['portal/(:num)/report'] = 'report';
$route['portal/(:num)/report/renstra/(:num)'] = 'report/renstra/$1';

$route['portal/(:num)/report_padat_karya'] = 'report_padat_karya/pakar';
$route['portal/(:num)/report_padat_karya/cetak'] = 'report_padat_karya/cetak';

$route['portal/(:num)/portal_data'] = 'portal/portal_data';
$route['portal/(:num)/add'] = 'portal/add';
$route['portal/(:num)/edit/(:num)'] = 'portal/edit/$1';

$route['portal/(:num)/konfigurasi'] = 'konfigurasi';
$route['portal/(:num)/konfigurasi/add'] = 'konfigurasi/add';
$route['portal/(:num)/konfigurasi/edit/(:num)'] = 'konfigurasi/edit/$1';

$route['portal/(:num)/user'] = 'user';
$route['portal/(:num)/user/add'] = 'user/add';
$route['portal/(:num)/user/edit/(:num)'] = 'user/edit/$1';
$route['portal/(:num)/user/del'] = 'user/del';

//$route['portal/(:num)/userdetails'] = 'userdetails';
