<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>ASKA Bali | Kartu Keluarga - {{$data->siswa->nama}}</title>
<style media="screen">
  @font-face {
    font-family: "Noto Sans JP";
    font-style: normal;
    font-weight: 400;
    src: url('{{ asset("app-assets/fonts/Noto_Sans_JP/static/NotoSansJP-Regular.ttf") }}') format('truetype');
  }
  @font-face {
    font-family: "Noto Sans JP Bold";
    font-style: normal;
    font-weight: 400;
    src: url('{{ asset("app-assets/fonts/Noto_Sans_JP/static/NotoSansJP-SemiBold.ttf") }}') format('truetype');
  }

  .title {
    font-family: "Noto Sans JP Bold", sans-serif;
    margin: 0;
    font-size: 20px;
  }

  .subtitle {
    font-family: "Noto Sans JP Bold", sans-serif;
    font-size: 14px;
    margin: 0;
  }

  .bold {
    font-family: "Noto Sans JP Bold", sans-serif;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    font-family: "Noto Sans JP", sans-serif;
    font-size: 10px;
  }

  td {
    text-align:left;
    padding: 2px;
    vertical-align: middle;
    border: 1px solid #000;
    text-align: center;
  }

  th {
    padding: 5px;
    text-align:center;
  }

  .inline td {
    border-top: none;
    border-bottom: none;
  }

  .noborder td {
    border: none;
    text-align:left;
    padding: 1px 4px;
  }

  .logo {
    position: absolute;
    top: -12;
    left: 0;
  }
  .right {
    position: absolute;
    top: 0;
    right: 0;
  }
  .grey {
    background-color: rgb(201, 201, 201);
  }
  .bold-border {
    border: 2px solid #000;
    font-size: 18px;
  }
  .pagenumber:before {
    content: counter(page);
  }

  main {
    font-size: 13px;
    color: black;
  }

  footer {
    position: fixed;
    text-align: right;
    bottom: 0;
    font-size: 13px;
  }
  .page_break {
    page-break-after: always;
  }
  @page {
    margin: 40px;
  }
  .student-image {
    background-color: #cccccc;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<div>
  <center>
    <p class="title">戸籍謄本</p>
    <p class="subtitle">番号. {{$data->nomor}}</p>
  </center>
  <br>
  <table class="noborder">
    <tr>
      <td style="width: 10%">家長名</td>
      <td style="width: 1%">:</td>
      <td style="text-transform: uppercase">
        {{$data->kepalakeluarga == null ? '' : $data->kepalakeluarga->nama}}
      </td>
      <td style="width: 8%">郡</td>
      <td style="width: 1%">:</td>
      <td style="width: 20%; text-transform: uppercase">{{$data->kecamatan->nama}}</td>
    </tr>
    <tr>
      <td>住所</td>
      <td>:</td>
      <td style="text-transform: uppercase">{{$data->alamat}}</td>
      <td>市</td>
      <td>:</td>
      <td style="text-transform: uppercase">{{$data->kabupaten->nama}}</td>
    </tr>
    <tr>
      <td>隣組・民組番号</td>
      <td>:</td>
      <td style="text-transform: uppercase">{{$data->rtrw}}</td>
      <td>郵便番号</td>
      <td>:</td>
      <td style="text-transform: uppercase">{{$data->desa->kodepos}}</td>
    </tr>
    <tr>
      <td>村</td>
      <td>:</td>
      <td style="text-transform: uppercase">{{$data->desa->nama}}</td>
      <td>州</td>
      <td>:</td>
      <td style="text-transform: uppercase">{{$data->provinsi->nama}}</td>
    </tr>
  </table>

  <table style="padding-top: 3px">
    <tr>
      <td style="width: 2%">番</td>
      <td style="width: 24%">姓名</td>
      <td style="width: 12%">人口登録番号</td>
      <td style="width: 5%">性別</td>
      <td style="width: {{$data->goldarah == 2 ? '13' : '10'}}%">出身地</td>
      <td style="width: 9%">生年月日</td>
      <td style="width: {{$data->goldarah == 2 ? '8' : '8'}}%">宗教</td>
      <td style="width: {{$data->goldarah == 2 ? '8' : '7'}}%">学歴</td>
      <td style="width: {{$data->goldarah == 2 ? '9' : '7'}}%">職業</td>
      @if ($data->goldarah != 2)
        <td style="width: 6%">血液型</td>
      @endif
    </tr>
    <tr>
      <td class="grey"></td>
      @if ($data->goldarah == 2)
        @for ($i = 1; $i < 9; $i++)
          <td class="grey">({{$i}})</td>
        @endfor
      @else
        @for ($i = 1; $i < 10; $i++)
          <td class="grey">({{$i}})</td>
        @endfor
      @endif
    </tr>
    @for ($i = 1; $i < 11; $i++)
      <?php
        $a = $data->anggota->where('nourut',$i)->first();
      ?>
      <tr>
        <td>{{$i}}</td>
        <td style="text-align: left; text-transform: uppercase">
          {{$a == null ? '-' : $a->nama}}
        </td>
        <td>{{$a == null ? '-' : $a->nik}}</td>
        <td>{{$a == null ? '-' : $a->jk->namajp.'性'}}</td>
        <td style="text-align: left; text-transform: uppercase">
          {{$a == null ? '-' : $a->tplahir}}
        </td>
        <td>{{$a == null ? '-' : (new \App\Helper)->tgljepang($a->tglahir)}}</td>
        <td>{{$a == null ? '-' : $a->agama->namajp}}</td>
        <td>{{$a == null ? '-' : $a->pendidikan->jenjangjp}}</td>
        <td>{{$a == null ? '-' : $a->pekerjaan->namajp}}</td>
        @if ($data->goldarah != 2)
          <td>{{$a == null ? '-' : $a->goldarah->namajp}}</td>
        @endif
      </tr> 
    @endfor
    
  </table>

  <table style="padding-top: 5px">
    <tr>
      <td rowspan="2" style="width: 2%">番</td>
      <td rowspan="2" style="width: 6%">現状</td>
      <td rowspan="2" style="width: 10%">結婚日</td>
      <td rowspan="2" style="width: 8%">家族関係</td>
      <td rowspan="2" style="width: 12%">国籍</td>
      <td colspan="2" style="width: 18%">入国文書</td>
      <td colspan="2" style="width: 34%">両親の名</td>
    </tr>
    <tr>
      <td style="width: 8%">パスポート番号</td>
      <td style="width: 10%">在留資格認定書番号</td>
      <td style="width: 17%">父</td>
      <td style="width: 17%">母</td>
    </tr>
    <tr>
      <td class="grey"></td>
      @if ($data->goldarah == 2)
        @for ($i = 9; $i < 17; $i++)
          <td class="grey">({{$i}})</td>
        @endfor
      @else
        @for ($i = 10; $i < 18; $i++)
          <td class="grey">({{$i}})</td>
        @endfor
      @endif
    </tr>
    @for ($i = 1; $i < 11; $i++)
      <?php
        $a = $data->anggota->where('nourut',$i)->first();
      ?>
      <tr>
        <td>{{$i}}</td>
        <td>{{$a == null ? '-' : $a->statuskawin->namajp}}</td>
        <td>
          @if ($a != null)
            @if ($a->tglkawin != null)
              {{(new \App\Helper)->tgljepang($a->tglkawin)}}
            @else
              -
            @endif
          @else
            -
          @endif
        </td>
        <td>{{$a == null ? '-' : $a->hubungan->namajp}}</td>
        <td>{{$a == null ? '-' : $a->wn->namajp}}</td>
        <td>
          @if ($a != null)
            @if ($a->nopaspor != null)
              {{$a->nopaspor}}
            @else
              -
            @endif
          @else
            -
          @endif
        </td>
        <td>
          @if ($a != null)
            @if ($a->nokitas != null)
              {{$a->nokitas}}
            @else
              -
            @endif
          @else
            -
          @endif
        </td>
        <td style="text-align: left; text-transform: uppercase">{{$a == null ? '-' : $a->namaayah}}</td>
        <td style="text-align: left; text-transform: uppercase">{{$a == null ? '-' : $a->namaibu}}</td>
      </tr> 
    @endfor
  </table>

  <table class="noborder" style="margin-top: 15px">
    <tr>
      <td style="width: 36%">
        <table class="noborder">
          <tr>
            <td style="width:30%">発行日</td>
            <td style="width: 1%">:</td>
            <td>{{(new \App\Helper)->tgljepang($data->tglterbit)}}</td>
          </tr>
          <tr>
            <td>第1枚目</td>
            <td style="width: 1%">:</td>
            <td>家長用</td>
          </tr>
          <tr>
            <td>第2枚目</td>
            <td style="width: 1%">:</td>
            <td>隣組長用</td>
          </tr>
          <tr>
            <td>第3枚目</td>
            <td style="width: 1%">:</td>
            <td>村長用</td>
          </tr>
          <tr>
            <td>第4枚目</td>
            <td style="width: 1%">:</td>
            <td>郡長用</td>
          </tr>
        </table>
      </td>
      <td style="width: 32%; text-align:center">
        家長
        <br><br>
        （署名）
        <br><br>
        <span style="text-transform: uppercase">
          {{$data->kepalakeluarga == null ? '' : $data->kepalakeluarga->nama}}
        </span>
        <br>
        指印又は署名
      </td>
      <td style="width: 32%; text-align:center">
        民事登録事務官
        <br><br>
        （署名）（公印）
        <br><br>
        {{$data->namakadis}}
        <br>
        公務員番号：{{$data->nipkadis}}
      </td>
    </tr>
  </table>
</div>

