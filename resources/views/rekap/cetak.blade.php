<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Rekapitulasi Nilai Audit</title>
<style media="screen">
  table {
    border-collapse: collapse;
    width: 100%;
    font-family: "Times New Roman", Times, serif;
  }
  td{
    text-align:left;
    padding: 3px;
    vertical-align: top;
  }
  th{
    padding: 5px 1px !important;
    text-align:center;
  }
  ul {
    margin: 0px;
    padding-left: 13px;
    list-style-type: disc;
  }
  li {
    margin-bottom: 3px;
  }
  hr.noteline {
    border: 1px solid rgb(165, 165, 165) !important;
    margin-top: 0;
  }
  .note {
    color: rgb(125, 125, 125);
    font-size: 12px;
  }
  .header{
    margin-left: 15px;
    margin-right: 15px;
    margin-top: -40px !important;
  }
  main {
    font-size: 12px;
    margin-left: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
  }
  /* footer {
    position: fixed;
    bottom: 40px; left: 25px; right: 25px;
    margin-top: 20px;
  } */
  .page_break {
    page-break-after: always;
  }
  @page {
    margin-top: 60px;

  }
  td p {
    margin: 0 !important; 
  }

  td ol {
    margin: 0 !important;
    padding-left: 18px !important;
  }
</style>


<center class="header">
  <div style="margin-bottom: -10px; text-align:center">
    <p style="font-weight: bold; font-size:18px !important; margin-top:2px; text-transform: uppercase">REKAPITULASI PENILAIAN AUDIT</p>
  </div>
</center>

<main>
  <table style="margin-bottom: 20px; width: 50%; ">
    <tr>
      <td style="width:18%;">Tahun Audit</td>
      <td>: {{$audit->tahun}}</td> 
    </tr>
    <tr>
      <td>Bagian</td>
      <td>: {{$audit->bagian->nama}}</td> 
    </tr>
    <tr>
      <td>Sub Bagian</td>
      <td>: {{$audit->subbagian->jenjang}} {{$audit->subbagian->nama}}</td>
    </tr>
    <tr>
      <td>Kaprodi</td>
      <td>: {{$audit->kaprodi->dosen->nama}}</td>
    </tr>

  </table>

  <table style="margin-bottom: 20px; width: 50%; float:right; position:absolute; top:0;">
    <tr>
      <td style="vertical-align:unset; width:18%">Auditor</td>
      <td>
          <ul style="padding-left: 18px; margin-bottom:0">
            @foreach ($auditor as $a)
            <li>{{$a->dosen->nama}}</li>
            @endforeach
          </ul>
      </td>
    </tr>
  </table>


  @foreach ($standar as $s)
  <table border="1" style="margin-bottom: 15px;">
    <thead>
      <tr>
        <th colspan="7" style="text-align: left !important; padding: 5 10px !important; background-color:chartreuse;">MASTER STANDAR : {{$s->standar->nama}}</th>
      </tr>
      <tr>
        <th>NO</th>
        <th>REF</th>
        <th>PERNYATAAN EVALUASI</th>
        <th>INDIKATOR</th>
        <th>SKOR PRODI</th>
        <th>SKOR AUDITOR</th>
        <th>KOMENTAR</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $no = 1; 
      ?>
      @foreach($datas->where('idstandar',$s->standar->id) as $d)
        <tr>
          <td style="text-align: center">{{$no}}</td>
          <td style="text-align: center">{{$d->indikator->ref}}</td>
          <td>{!!$d->indikator->pernyataan!!}</td>
          <td>{!!$d->indikator->indikator!!}</td>
          <td style="text-align: center">{{$d->peringkatauditi->skor}}</td>
          <td style="text-align: center">{{$d->peringkatauditor->skor}}</td>
          <td style="text-align: center">{{$d->komentarauditor}}</td>
        </tr>
        <?php $no++; ?>
      @endforeach
    </tbody>
  </table>
  @endforeach

  {{-- <p style="font-size: 9px; border-bottom: 1px solid #000; padding-bottom:3px; margin-top:30px"><i>Dicetak oleh: {{auth::user()->pegawai->nama}}<i></p> --}}

</main>
