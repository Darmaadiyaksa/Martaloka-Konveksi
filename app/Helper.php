<?php

namespace App;
use Auth;
use Session;
use DateTime;
use App\Models\Ta;
use App\Models\Krs;
use App\Models\MdHari;
use App\Models\MdBulan;
use App\Models\MdNilai;
use App\Models\KrsDetil;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\UnitBagian;
use App\Models\DosenSerdos;
use App\Models\TagihanProdi;
use App\Models\RiwayatJafung;
use App\Models\UnitBagianCid;
use App\Models\UnitBagianSub;
use App\Models\JadwalPresensi;
use App\Models\RiwayatPangkat;
use App\Models\RiwayatPejabat;
use App\Models\MahasiswaMigrasi;
use App\Models\TagihanMahasiswa;
use App\Models\RiwayatPendidikan;
use Illuminate\Support\Facades\Http;
use App\Models\TagihanMahasiswaDetil;
use App\Models\MahasiswaNilaiKonversi;

class Helper
{
  public static function tanggal($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $bulan = date('n',strtotime($tgl));
    $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $t.' '.$b.' '.$ta;
  }

  public static function tgljepang($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $b = date('m',strtotime($tgl));
    $t = date('d',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $ta.'年'.$b.'月'.$t.'日';
  }

  public static function bulanjepang($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $b = date('m',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $ta.'年'.$b.'月';
  }

  public static function haritanggal($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $hari = date('w',strtotime($tgl));
    $bulan = date('n',strtotime($tgl));
    $h = MdHari::where('id',$hari)->pluck('nama')->first();
    $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $h.', '.$t.' '.$b.' '.$ta;
  }

  public static function bulan2($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $bulan = date('n',strtotime($tgl));
    $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
    $ta = date('Y',strtotime($tgl));
    return $b.' '.$ta;
  }

  public static function tanggalrange($tgl)
  {
    $tgl = explode(" - ",$tgl);

    if (count($tgl) > 1) {
      if ($tgl[0] == $tgl[1]) {
        $bulan = date('n',strtotime($tgl[0]));
        $b = Bulan::where('id',$bulan)->pluck('nama')->first();
        $t = date('d',strtotime($tgl[0]));
        $ta = date('Y',strtotime($tgl[0]));
        return $t.' '.$b.' '.$ta;
      }else {
        $bulan = date('n',strtotime($tgl[0]));
        $b = Bulan::where('id',$bulan)->pluck('nama')->first();
        $t = date('d',strtotime($tgl[0]));
        $ta = date('Y',strtotime($tgl[0]));

        $tgl1 = $t.' '.$b.' '.$ta;

        $bulan = date('n',strtotime($tgl[1]));
        $b = Bulan::where('id',$bulan)->pluck('nama')->first();
        $t = date('d',strtotime($tgl[1]));
        $ta = date('Y',strtotime($tgl[1]));

        $tgl2 = $t.' '.$b.' '.$ta;
        return $tgl1.' - '.$tgl2;
      }
    }else {
      $tgl = $tgl[0];
      $bulan = date('n',strtotime($tgl));
      $b = Bulan::where('id',$bulan)->pluck('nama')->first();
      $t = date('d',strtotime($tgl));
      $ta = date('Y',strtotime($tgl));
      return $t.' '.$b.' '.$ta;
    }
  }

  public static function blngaleri($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $bulan = date('n',strtotime($tgl));
    $b = MdBulan::where('id',$bulan)->pluck('alias')->first();
    $ta = date('Y',strtotime($tgl));
    return $b.', '.$ta;
  }

  public static function durasi($data)
  {
    if ($data == '') {
      return 'Belum ditentukan';
    }
    $date1 = new DateTime($data);
    $date2 = new DateTime(date('Y-n-d'));
    $diff  = $date1->diff($date2);
    if ($diff->format('%y') == 0) {
      $lama = $diff->format('%m').' Bulan';
    }else {
      $lama = $diff->format('%y').' Tahun '.$diff->format('%m').' Bulan';
    }

    return $lama;
  }

  public static function durasitahun($data)
  {
    if ($data == null) {
      return '';
    }
    $date1 = new DateTime($data);
    $date2 = new DateTime(date('Y-n-d'));
    $diff  = $date1->diff($date2);
    if ($diff->format('%y') == 0) {
      $lama = '';
    }else {
      $lama = $diff->format('%y');
    }

    return $lama;
  }

  public static function romawi($number)
  {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
      foreach ($map as $roman => $int) {
        if($number >= $int) {
          $number -= $int;
          $returnValue .= $roman;
          break;
        }
      }
    }
    return $returnValue;
  }

  public static function tglblog($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $bulan = date('n',strtotime($tgl));
    $b = MdBulan::where('id',$bulan)->pluck('alias')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $b.' '.$t.', '.$ta;
  }

}
