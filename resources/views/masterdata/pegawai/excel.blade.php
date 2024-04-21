<!DOCTYPE html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data {{$data[0]->jenis == 1 ? 'Guru' : 'Pegawai'}}</title>
  <style media="screen">
    table {
      border-collapse: collapse;
      width: 100%;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }
    td {
      text-align:left;
      padding: 10px;
    }
  </style>
  <?php $tgl = date('Y-m-d'); ?>
  <table>
    <tr>
      <th><b>No</b></th>
      <th><b>Nama {{$data[0]->jenis == 1 ? 'Guru' : 'Pegawai'}}</b></th>
      <th><b>Tempat, Tanggal Lahir</b></th>
      <th><b>Jenis Kelamin</b></th>
      <th><b>Agama</b></th>
      <th><b>PTK</b></th>
      <th><b>Status {{$data[0]->jenis == 1 ? 'Guru' : 'Pegawai'}}</b></th>
      <th><b>NUPTK</b></th>
      <th><b>NIP/NPK</b></th>
      <th><b>Lembaga Pengangkatan</b></th>
      <th><b>Nomor SK Pengangkatan</b></th>
      <th><b>TMT Pengangkatan</b></th>
      <th><b>Masa Kerja per {{(new \App\Helper)->periodeabsen($tgl)}}</b></th>
      <th><b>Pangkat/Golongan</b></th>
      <th><b>Alamat Tinggal</b></th>
      <th><b>Wilayah Alamat</b></th>
      <th><b>Email</b></th>
      <th><b>Telepon</b></th>
      <th><b>NIK</b></th>
      <th><b>NPWP</b></th>
      <th><b>Status Perkawinan</b></th>
      <th><b>Status Kerja</b></th>
    </tr>
    <tbody>
      <?php $no = 1; ?>
      @foreach($data as $d)
        <tr>
          <td>{{$no}}</td>
          <td>{{$d->nama}}</td>
          <td>{{$d->tplahir}}, {{ (new \App\Helper)->tanggal($d->tglahir) }}</td>
          <td>{{$d->jk == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
          <td>{{$d->agama->nama}}</td>
          <td>{{$d->detil->idjenisptk == null ? '' : $d->detil->jenisptk->nama}}</td>
          <td>{{$d->idstatuskepegawaian == null ? '' : $d->statussk->nama}}</td>
          <td>{{$d->nuptk}}</td>
          <td>{{$d->nip}}</td>
          <td>{{$d->detil->idlembagapengangkatan == null ? '' : $d->detil->lembaga->nama}}</td>
          <td>{{$d->detil->skpengangkatan}}</td>
          <td>{{$d->detil->tmtpengangkatan == null ? '' : (new \App\Helper)->tanggal($d->detil->tmtpengangkatan)}}</td>
          <td>{{$d->detil->tmtpengangkatan == null ? '' : (new \App\Helper)->lamamengajar($d->detil->tmtpengangkatan)}}</td>
          <td>{{$d->detil->idpangkat == null ? '' : $d->detil->pangkat->pangkat.' ('.$d->detil->pangkat->golongan.'/'.$d->detil->pangkat->ruang.')'}}</td>
          <td>{{$d->alamat}}</td>
          <td>{{$d->idkec == null ? '' : 'Kecamatan '.$d->kecamatan->nama.', '.$d->kecamatan->kabupaten->nama.', '.$d->kecamatan->kabupaten->provinsi->nama}}</td>
          <td>{{$d->email}}</td>
          <td>{{$d->nohp}}</td>
          <td>{{$d->detil->nik}}</td>
          <td>{{$d->detil->npwp}}</td>
          <td>{{$d->detil->statuskawin}}</td>
          <td>{{$d->status->nama}}</td>
        </tr>
        <?php $no++; ?>
      @endforeach
    </tbody>
  </table>
  <br>
  <br>
  <table>
    <tr>
      <td colspan="2" style="font-size: 9px"><i>Diunduh pada {{ (new \App\Helper)->tanggal($tgl) }}</i></td>
    </tr>
    <tr>
      <td colspan="2" style="font-size: 9px"><i>oleh : {{ auth::user()->pegawai->nama }}</i></td>
    </tr>
  </table>
