<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
  return redirect('home');
});

Route::get('', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::prefix('pendaftaran')->group(function () {
  Route::get('', [App\Http\Controllers\FrontendPendaftaranController::class, 'index'])->name('pendaftaran-daftar');
  Route::get('refreshcaptcha', [App\Http\Controllers\FrontendPendaftaranController::class, 'refreshcaptcha'])->name('refreshcaptcha');
  Route::post('store', [App\Http\Controllers\FrontendPendaftaranController::class, 'store'])->name('pendaftaran.store');
});

Route::prefix('profil')->group(function () {
  Route::get('galeri', [App\Http\Controllers\FrontendGaleriController::class, 'index'])->name('profil.galeri');
  Route::get('program', [App\Http\Controllers\FrontendProgramController::class, 'index'])->name('profil.program');
  Route::get('sejarah', [App\Http\Controllers\FrontendSejarahController::class, 'index'])->name('profil.sejarah');
  Route::get('tentangkami', [App\Http\Controllers\FrontendTentangKamiController::class, 'index'])->name('profil.tentangkami');
});

Route::prefix('informasi')->group(function () {
  Route::get('', [App\Http\Controllers\FrontendInformasiController::class, 'index'])->name('informasi');
  Route::get('detail/{slug}', [App\Http\Controllers\FrontendInformasiController::class, 'detail'])->name('informasi.detail');
}); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('select2')->group(function(){
  Route::get('agama', [App\Http\Controllers\Select2Controller::class, 'agama'])->name('s2.agama');
  Route::get('bulan', [App\Http\Controllers\Select2Controller::class, 'bulan'])->name('s2.bulan');
  Route::get('desa', [App\Http\Controllers\Select2Controller::class, 'desa'])->name('s2.desa');
  Route::get('goldarah', [App\Http\Controllers\Select2Controller::class, 'goldarah'])->name('s2.goldarah');
  Route::get('hubungan', [App\Http\Controllers\Select2Controller::class, 'hubungan'])->name('s2.hubungan');
  Route::get('hubungankk', [App\Http\Controllers\Select2Controller::class, 'hubungankk'])->name('s2.hubungankk');
  Route::get('hubunganjepang', [App\Http\Controllers\Select2Controller::class, 'hubunganjepang'])->name('s2.hubunganjepang');
  Route::get('hobi', [App\Http\Controllers\Select2Controller::class, 'hobi'])->name('s2.hobi');
  Route::get('jabatan', [App\Http\Controllers\Select2Controller::class, 'jabatan'])->name('s2.jabatan');
  Route::get('jenisinformasi', [App\Http\Controllers\Select2Controller::class, 'jenisinformasi'])->name('s2.jenisinformasi');
  Route::get('jeniskegiatan', [App\Http\Controllers\Select2Controller::class, 'jeniskegiatan'])->name('s2.jeniskegiatan');
  Route::get('jenispegawai', [App\Http\Controllers\Select2Controller::class, 'jenispegawai'])->name('s2.jenispegawai');
  Route::get('jenispekerjaan', [App\Http\Controllers\Select2Controller::class, 'jenispekerjaan'])->name('s2.jenispekerjaan');
  Route::get('jenjangpendidikan', [App\Http\Controllers\Select2Controller::class, 'jenjangpendidikan'])->name('s2.jenjangpendidikan');
  Route::get('kantor', [App\Http\Controllers\Select2Controller::class, 'kantor'])->name('s2.kantor');
  Route::get('kecamatan', [App\Http\Controllers\Select2Controller::class, 'kecamatan'])->name('s2.kecamatan');
  Route::get('kabupaten', [App\Http\Controllers\Select2Controller::class, 'kabupaten'])->name('s2.kabupaten');
  Route::get('keunggulan', [App\Http\Controllers\Select2Controller::class, 'keunggulan'])->name('s2.keunggulan');
  Route::get('kekurangan', [App\Http\Controllers\Select2Controller::class, 'kekurangan'])->name('s2.kekurangan');
  Route::get('lembaga', [App\Http\Controllers\Select2Controller::class, 'lembaga'])->name('s2.lembaga');
  Route::get('pegawai', [App\Http\Controllers\Select2Controller::class, 'pegawai'])->name('s2.pegawai');
  Route::get('pekerjaan', [App\Http\Controllers\Select2Controller::class, 'pekerjaan'])->name('s2.pekerjaan');
  Route::get('perfektur', [App\Http\Controllers\Select2Controller::class, 'perfektur'])->name('s2.perfektur');
  Route::get('perusahaan', [App\Http\Controllers\Select2Controller::class, 'perusahaan'])->name('s2.perusahaan');
  Route::get('provinsi', [App\Http\Controllers\Select2Controller::class, 'provinsi'])->name('s2.provinsi');
  Route::get('sekolah', [App\Http\Controllers\Select2Controller::class, 'sekolah'])->name('s2.sekolah');
  Route::get('statuskawin', [App\Http\Controllers\Select2Controller::class, 'statuskawin'])->name('s2.statuskawin');
  Route::get('statuskerja', [App\Http\Controllers\Select2Controller::class, 'statuskerja'])->name('s2.statuskerja');
  Route::get('subpekerjaan', [App\Http\Controllers\Select2Controller::class, 'subpekerjaan'])->name('s2.subpekerjaan');
  Route::get('tangan', [App\Http\Controllers\Select2Controller::class, 'tangan'])->name('s2.tangan');
  Route::get('wn', [App\Http\Controllers\Select2Controller::class, 'wn'])->name('s2.wn');
});

Route::prefix('masterdata')->group(function(){
  Route::prefix('jenispekerjaan')->group(function(){
    Route::get('', [App\Http\Controllers\MDJenisPekerjaanController::class, 'index'])->name('md.jenispekerjaan');
    Route::get('dt',[App\Http\Controllers\MDJenisPekerjaanController::class, 'dt'])->name('md.jenispekerjaan.dt');
    Route::get('detail/{id}',[App\Http\Controllers\MDJenisPekerjaanController::class, 'detail'])->name('md.jenispekerjaan.detail');
    Route::post('store', [App\Http\Controllers\MDJenisPekerjaanController::class, 'store'])->name('md.jenispekerjaan.store');
    Route::post('update', [App\Http\Controllers\MDJenisPekerjaanController::class, 'update'])->name('md.jenispekerjaan.update');
    Route::post('storesub', [App\Http\Controllers\MDJenisPekerjaanController::class, 'storesub'])->name('md.jenispekerjaan.storesub');
    Route::post('updatesub', [App\Http\Controllers\MDJenisPekerjaanController::class, 'updatesub'])->name('md.jenispekerjaan.updatesub');
  });

  Route::prefix('kantor')->group(function(){
    Route::get('', [App\Http\Controllers\MDKantorController::class, 'index'])->name('md.kantor');
    Route::get('dt/{idstatus?}',[App\Http\Controllers\MDKantorController::class, 'dt'])->name('md.kantor.dt');
    Route::get('detail/{id}',[App\Http\Controllers\MDKantorController::class, 'detail'])->name('md.kantor.detail');
    Route::post('store', [App\Http\Controllers\MDKantorController::class, 'store'])->name('md.kantor.store');
    Route::post('update', [App\Http\Controllers\MDKantorController::class, 'update'])->name('md.kantor.update');
  });

  Route::prefix('lembaga')->group(function(){
    Route::get('', [App\Http\Controllers\MDLembagaController::class, 'index'])->name('md.lembaga');
    Route::get('dt',[App\Http\Controllers\MDLembagaController::class, 'dt'])->name('md.lembaga.dt');
    Route::get('getperusahaan/{id}',[App\Http\Controllers\MDLembagaController::class, 'getperusahaan'])->name('md.lembaga.getperusahaan');
    Route::post('store', [App\Http\Controllers\MDLembagaController::class, 'store'])->name('md.lembaga.store');
    Route::post('update', [App\Http\Controllers\MDLembagaController::class, 'update'])->name('md.lembaga.update');
  });

  Route::prefix('lpk-penyangga')->group(function(){
    Route::get('', [App\Http\Controllers\MDLPKPenyanggaController::class, 'index'])->name('md.lpkpenyangga');
    Route::get('dt',[App\Http\Controllers\MDLPKPenyanggaController::class, 'dt'])->name('md.lpkpenyangga.dt');
    Route::post('store', [App\Http\Controllers\MDLPKPenyanggaController::class, 'store'])->name('md.lpkpenyangga.store');
    Route::post('update', [App\Http\Controllers\MDLPKPenyanggaController::class, 'update'])->name('md.lpkpenyangga.update');
  });

  Route::prefix('pegawai')->group(function(){
    Route::get('', [App\Http\Controllers\MDPegawaiController::class, 'index'])->name('md.pegawai');
    Route::get('dt/{idstatus?}',[App\Http\Controllers\MDPegawaiController::class, 'dt'])->name('md.pegawai.dt');
    Route::get('detail/{id}',[App\Http\Controllers\MDPegawaiController::class, 'detail'])->name('md.pegawai.detail');
    Route::get('create',[App\Http\Controllers\MDPegawaiController::class, 'create'])->name('md.pegawai.create');
    Route::get('edit/{id}',[App\Http\Controllers\MDPegawaiController::class, 'edit'])->name('md.pegawai.edit');
    Route::get('getpegawai/{id}',[App\Http\Controllers\MDPegawaiController::class, 'getpegawai'])->name('md.pegawai.getpegawai');
    Route::post('store', [App\Http\Controllers\MDPegawaiController::class, 'store'])->name('md.pegawai.store');
    Route::post('update', [App\Http\Controllers\MDPegawaiController::class, 'update'])->name('md.pegawai.update');
    Route::post('updatekepegawaian', [App\Http\Controllers\MDPegawaiController::class, 'updatekepegawaian'])->name('md.pegawai.updatekepegawaian');
    Route::get('getpendidikan/{id}',[App\Http\Controllers\MDPegawaiController::class, 'getpendidikan'])->name('md.pegawai.getpendidikan');
    Route::post('storependidikan', [App\Http\Controllers\MDPegawaiController::class, 'storependidikan'])->name('md.pegawai.storependidikan');
    Route::post('updatependidikan', [App\Http\Controllers\MDPegawaiController::class, 'updatependidikan'])->name('md.pegawai.updatependidikan');
    Route::post('deletependidikan', [App\Http\Controllers\MDPegawaiController::class, 'deletependidikan'])->name('md.pegawai.deletependidikan');
    Route::post('generatenpk', [App\Http\Controllers\MDPegawaiController::class, 'generatenpk'])->name('md.pegawai.generatenpk');
    Route::post('exportexcel', [App\Http\Controllers\MDPegawaiController::class, 'exportexcel'])->name('md.pegawai.exportexcel');
  });

  Route::prefix('perusahaan')->group(function(){
    Route::get('', [App\Http\Controllers\MDPerusahaanController::class, 'index'])->name('md.perusahaan');
    Route::get('dt',[App\Http\Controllers\MDPerusahaanController::class, 'dt'])->name('md.perusahaan.dt');
    Route::get('detail/{id}',[App\Http\Controllers\MDPerusahaanController::class, 'detail'])->name('md.perusahaan.detail');
    Route::post('store', [App\Http\Controllers\MDPerusahaanController::class, 'store'])->name('md.perusahaan.store');
    Route::post('storealamat', [App\Http\Controllers\MDPerusahaanController::class, 'storealamat'])->name('md.perusahaan.storealamat');
    Route::post('update', [App\Http\Controllers\MDPerusahaanController::class, 'update'])->name('md.perusahaan.update');
  });

  Route::prefix('sekolah')->group(function(){
    route::get('',[App\Http\Controllers\MDSekolahController::class, 'index'])->name('md.sekolah');
    route::get('dt',[App\Http\Controllers\MDSekolahController::class, 'dt'])->name('md.sekolah.dt');
    route::post('store',[App\Http\Controllers\MDSekolahController::class, 'store'])->name('md.sekolah.store');
    route::post('update',[App\Http\Controllers\MDSekolahController::class, 'update'])->name('md.sekolah.update');
    route::get('detil/{id}',[App\Http\Controllers\MDSekolahController::class, 'detil'])->name('md.sekolah.detil');
    route::get('dtdetil/{idprov}',[App\Http\Controllers\MDSekolahController::class, 'dtdetil'])->name('md.sekolah.dtdetil');
  });

  Route::prefix('siswa')->group(function(){
    Route::get('', [App\Http\Controllers\MDSiswaController::class, 'index'])->name('md.siswa');
    Route::get('dt',[App\Http\Controllers\MDSiswaController::class, 'dt'])->name('md.siswa.dt');
    Route::get('detail/{id}',[App\Http\Controllers\MDSiswaController::class, 'detail'])->name('md.siswa.detail');
    Route::get('gethubungan/{id}',[App\Http\Controllers\MDSiswaController::class, 'gethubungan'])->name('md.siswa.gethubungan');
    Route::post('store', [App\Http\Controllers\MDSiswaController::class, 'store'])->name('md.siswa.store');
    Route::post('update', [App\Http\Controllers\MDSiswaController::class, 'update'])->name('md.siswa.update');
    Route::get('getkeluarga/{id}',[App\Http\Controllers\MDSiswaController::class, 'getkeluarga'])->name('md.siswa.getkeluarga');
    Route::post('storekeluarga', [App\Http\Controllers\MDSiswaController::class, 'storekeluarga'])->name('md.siswa.storekeluarga');
    Route::post('updatekeluarga', [App\Http\Controllers\MDSiswaController::class, 'updatekeluarga'])->name('md.siswa.updatekeluarga');
    Route::post('deletekeluarga', [App\Http\Controllers\MDSiswaController::class, 'deletekeluarga'])->name('md.siswa.deletekeluarga');
    Route::get('getkeluargajepang/{id}',[App\Http\Controllers\MDSiswaController::class, 'getkeluargajepang'])->name('md.siswa.getkeluargajepang');
    Route::post('storekeluargajepang', [App\Http\Controllers\MDSiswaController::class, 'storekeluargajepang'])->name('md.siswa.storekeluargajepang');
    Route::post('updatekeluargajepang', [App\Http\Controllers\MDSiswaController::class, 'updatekeluargajepang'])->name('md.siswa.updatekeluargajepang');
    Route::post('deletekeluargajepang', [App\Http\Controllers\MDSiswaController::class, 'deletekeluargajepang'])->name('md.siswa.deletekeluargajepang');
    Route::get('getpendidikan/{id}',[App\Http\Controllers\MDSiswaController::class, 'getpendidikan'])->name('md.siswa.getpendidikan');
    Route::post('storependidikan', [App\Http\Controllers\MDSiswaController::class, 'storependidikan'])->name('md.siswa.storependidikan');
    Route::post('updatependidikan', [App\Http\Controllers\MDSiswaController::class, 'updatependidikan'])->name('md.siswa.updatependidikan');
    Route::post('deletependidikan', [App\Http\Controllers\MDSiswaController::class, 'deletependidikan'])->name('md.siswa.deletependidikan');
    Route::get('getpekerjaan/{id}',[App\Http\Controllers\MDSiswaController::class, 'getpekerjaan'])->name('md.siswa.getpekerjaan');
    Route::post('storepekerjaan', [App\Http\Controllers\MDSiswaController::class, 'storepekerjaan'])->name('md.siswa.storepekerjaan');
    Route::post('updatepekerjaan', [App\Http\Controllers\MDSiswaController::class, 'updatepekerjaan'])->name('md.siswa.updatepekerjaan');
    Route::post('deletepekerjaan', [App\Http\Controllers\MDSiswaController::class, 'deletepekerjaan'])->name('md.siswa.deletepekerjaan');
    Route::post('exportexcel', [App\Http\Controllers\MDSiswaController::class, 'exportexcel'])->name('md.siswa.exportexcel');
    Route::post('cetakcv', [App\Http\Controllers\MDSiswaController::class, 'cetakcv'])->name('md.siswa.cetakcv');
  });

  Route::prefix('user')->group(function(){
    Route::post('create', [App\Http\Controllers\MDUserController::class, 'store'])->name('md.user.store');
    Route::post('delete', [App\Http\Controllers\MDUserController::class, 'delete'])->name('md.user.delete');
    Route::post('generateusersiswa', [App\Http\Controllers\MDUserController::class, 'generateusersiswa'])->name('md.siswa.generateuser');
    Route::post('generateuserpegawai', [App\Http\Controllers\MDUserController::class, 'generateuserpegawai'])->name('md.pegawai.generateuser');
  });
});

Route::prefix('pengaturan')->group(function(){
  Route::prefix('kalender')->group(function(){
    Route::get('', [App\Http\Controllers\PengaturanKalenderController::class, 'index'])->name('kalender');
    Route::get('dt', [App\Http\Controllers\PengaturanKalenderController::class, 'dt'])->name('kalender.dt');
    Route::post('store', [App\Http\Controllers\PengaturanKalenderController::class, 'store'])->name('kalender.store');
    Route::post('update', [App\Http\Controllers\PengaturanKalenderController::class, 'update'])->name('kalender.update');
  });

  Route::prefix('profil')->group(function(){
    Route::get('', [App\Http\Controllers\PengaturanProfilController::class, 'index'])->name('profil');
    Route::post('store', [App\Http\Controllers\PengaturanProfilController::class, 'store'])->name('profil.store');
    Route::post('update', [App\Http\Controllers\PengaturanProfilController::class, 'update'])->name('profil.update');
  });
});

Route::prefix('reqruitment')->group(function(){
  Route::prefix('job-order')->group(function(){
    Route::get('', [App\Http\Controllers\ReqJobOrderController::class, 'index'])->name('req.joborder');
    Route::get('dt', [App\Http\Controllers\ReqJobOrderController::class, 'dt'])->name('req.joborder.dt');
    Route::get('detail/{id}', [App\Http\Controllers\ReqJobOrderController::class, 'detail'])->name('req.joborder.detail');
    Route::post('store', [App\Http\Controllers\ReqJobOrderController::class, 'store'])->name('req.joborder.store');
    Route::post('update', [App\Http\Controllers\ReqJobOrderController::class, 'update'])->name('req.joborder.update');
    Route::post('delete', [App\Http\Controllers\ReqJobOrderController::class, 'delete'])->name('req.joborder.delete');
    Route::post('storesiswa', [App\Http\Controllers\ReqJobOrderController::class, 'storesiswa'])->name('req.joborder.storesiswa');
    Route::post('cetakcv', [App\Http\Controllers\ReqJobOrderController::class, 'cetakcv'])->name('req.joborder.cetakcv');
    Route::post('cetakcvall', [App\Http\Controllers\ReqJobOrderController::class, 'cetakcvall'])->name('req.joborder.cetakcvall');
  });

  Route::prefix('interview')->group(function(){
    Route::get('', [App\Http\Controllers\ReqInterviewController::class, 'index'])->name('req.interview');
  });
});

Route::prefix('kontenweb')->group(function(){
  Route::prefix('informasi')->group(function(){
    Route::get('', [App\Http\Controllers\WebInformasiController::class, 'index'])->name('web.informasi');
    Route::get('dt', [App\Http\Controllers\WebInformasiController::class, 'dt'])->name('web.informasi.dt');
    Route::get('create', [App\Http\Controllers\WebInformasiController::class, 'create'])->name('web.informasi.create');
    Route::post('store', [App\Http\Controllers\WebInformasiController::class, 'store'])->name('web.informasi.store');
    Route::get('edit/{id}', [App\Http\Controllers\WebInformasiController::class, 'edit'])->name('web.informasi.edit');
    Route::post('update', [App\Http\Controllers\WebInformasiController::class, 'update'])->name('web.informasi.update');
    Route::post('delete', [App\Http\Controllers\WebInformasiController::class, 'delete'])->name('web.informasi.delete');
  });

  Route::prefix('galeri')->group(function(){
    Route::get('', [App\Http\Controllers\WebGaleriController::class, 'index'])->name('web.galeri');
    Route::get('dt', [App\Http\Controllers\WebGaleriController::class, 'dt'])->name('web.galeri.dt');
    Route::get('create', [App\Http\Controllers\WebGaleriController::class, 'create'])->name('web.galeri.create');
    Route::post('store', [App\Http\Controllers\WebGaleriController::class, 'store'])->name('web.galeri.store');
    Route::post('delete', [App\Http\Controllers\WebGaleriController::class, 'delete'])->name('web.galeri.delete');
  });

  Route::prefix('lowongan')->group(function(){
    Route::get('', [App\Http\Controllers\WebLowonganController::class, 'index'])->name('web.lowongan');
    Route::post('store', [App\Http\Controllers\WebLowonganController::class, 'store'])->name('web.lowongan.store');
    Route::post('delete', [App\Http\Controllers\WebLowonganController::class, 'delete'])->name('web.lowongan.delete');
  });
});

Route::prefix('biodata')->group(function () {
  Route::get('', [App\Http\Controllers\CalonBiodataController::class, 'index'])->name('biodata');
  Route::get('edit', [App\Http\Controllers\CalonBiodataController::class, 'edit'])->name('biodata.edit');
  Route::post('update', [App\Http\Controllers\CalonBiodataController::class, 'update'])->name('biodata.update');
});

Route::prefix('siswa')->group(function () {
  Route::prefix('biodata')->group(function () {
    Route::get('', [App\Http\Controllers\SiswaBiodataController::class, 'index'])->name('siswa.biodata');
  });
  Route::prefix('kartukeluarga')->group(function () {
    Route::get('', [App\Http\Controllers\SiswaKKController::class, 'index'])->name('siswa.kk');
    Route::post('store', [App\Http\Controllers\SiswaKKController::class, 'store'])->name('siswa.kk.store');
    Route::post('storeanggota', [App\Http\Controllers\SiswaKKController::class, 'storeanggota'])->name('siswa.kk.storeanggota');
    Route::get('getanggota/{id}', [App\Http\Controllers\SiswaKKController::class, 'getanggota'])->name('siswa.kk.getanggota');
    Route::post('updateanggota', [App\Http\Controllers\SiswaKKController::class, 'updateanggota'])->name('siswa.kk.updateanggota');
    Route::post('deleteanggota', [App\Http\Controllers\SiswaKKController::class, 'deleteanggota'])->name('siswa.kk.deleteanggota');
    Route::post('cetak', [App\Http\Controllers\SiswaKKController::class, 'cetak'])->name('siswa.kk.cetak');
  });
});

Route::post('reset-password',[App\Http\Controllers\ResetPasswordController::class, 'sendemail'])->name('ResetPassword');
Route::post('store-password',[App\Http\Controllers\ResetPasswordController::class, 'storepassword'])->name('storePassword');
Route::get('reset',[App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('reset');
Route::get('new-password/{token}',[App\Http\Controllers\ResetPasswordController::class, 'newpassword'])->name('NewPassword');
Route::post('ubahpassword',[App\Http\Controllers\MDUserController::class, 'ubahpassword'])->name('user.ubahpassword');
Route::get('sessiontema/{id}', [App\Http\Controllers\HomeController::class, 'sessiontema'])->name('sessiontema');
