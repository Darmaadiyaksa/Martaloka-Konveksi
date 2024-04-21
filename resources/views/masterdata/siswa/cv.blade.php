<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>ASKA Bali | CV - {{$data->nama}}</title>
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
  .bold {
    font-family: "Noto Sans JP Bold", sans-serif;
  }
  table {
    border-collapse: collapse;
    width: 100%;
    font-family: "Noto Sans JP", sans-serif;
    font-size: 11px;
  }
  td{
    text-align:left;
    padding: 4px;
    vertical-align: middle;
    border: 1px solid #000;
    text-align: center;
  }
  th{
    padding: 5px;
    text-align:center;
  }
  .inline td {
    border-top: none;
    border-bottom: none;
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
  .blue {
    background-color: rgb(216, 232, 255);
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
    margin: 50px;
  }
  .student-image {
    background-color: #cccccc;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<div>
  <img class="logo" src="{{asset('assets/images/logo.png')}}" width="11%" alt="">
  
  <table >
    <tr>
      <td rowspan="2" style="width: 12%; border-left: none; border-top: none; border-bottom: none;">
      </td>
      <td style="width: 22%">受け入れ企業</td>
      <td class="blue">{{$job == null ? '' : $job->perusahaan->namajp}}</td>
      <td class="blue" style="width: 10%; text-right;">様</td>
    </tr>
    <tr>
      <td>組合</td>
      <td class="blue">{{$job == null ? '' : $job->perusahaan->lembaga->namajp}}</td>
      <td class="blue" style="text-right;">様</td>
    </tr>
  </table>

  <table style="margin-top: 15px">
    <tr>
      <td class="bold-border bold" style="width: 12%">番号</td>
      <td class="bold-border bold" style="width: 22%">
        @if ($job != null)
          <?php $ii = 1; $tampil = ''; ?>
          @foreach ($job->detil as $jd)
            @if ($jd->idsiswa == $data->id)
              {{$ii}}
            @endif
            <?php $ii++; ?>
          @endforeach
        @endif
      </td>
      <td class="bold-border bold" style="width:66%">技能実習履歴書</td>
    </tr>
  </table>

  <table style="margin-top: 8px">
    <tr>
      <td rowspan="9" class="blue bold" style="width: 12%">本人</td>
      <td rowspan="3" style="width: 11%">氏名</td>
      <td style="width: 11%">カタカナ</td>
      <td colspan="5">{{$data->namajp}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      <td rowspan="9" class="student-image" style="width: 24%; padding: 0; background-image: url({{asset($data->photo == null ? 'assets/images/user-default.jpg' : $data->photo)}})"></td>
    </tr>
    <tr>
      <td style="width: 11%">ローマ字</td>
      <td colspan="5" style="text-transform: uppercase">{{$data->nama}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
    <tr>
      <td style="width: 11%">呼び名</td>
      <td colspan="5" style="text-transform: uppercase">{{$data->panggilan}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
    <tr>
      <td colspan="1">生年月日</td>
      <td colspan="2" style="width: 20%">{{ (new \App\Helper)->tgljepang($data->tglahir) }}</td>
      <td>年齡</td>
      <td>{{ (new \App\Helper)->durasitahun($data->tglahir) }}</td>
      <td>性別</td>
      <td>{{$data->jk->namajp}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
    <tr>
      <td>現住所</td>
      <td colspan="6">{{$data->alamat}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
    <tr>
      <td style="width: 11%">婚姻状況</td>
      <td style="width: 11%">
        <?php
        $kawin = $data->detil->idstatuskawin;
        if ($kawin > 1) {
          $kawin = 1;
        }elseif ($kawin == 1 && $kawin != null) {
          $kawin = 0;
        }
        ?>
      </td>
      <td style="width: 10%">視力（裸眼）</td>
      <td style="width: 4.5%; border-right:none">左</td>
      <td style="width: 11%; border-left:none">{{$data->detil->matakiri}}</td>
      <td style="width: 4.5%; border-right:none">右</td>
      <td style="width: 11%; border-left:none">{{$data->detil->matakanan}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
    <tr>
      <td style="width: 11%">身長</td>
      <td style="width: 11%">{{$data->detil->tinggi}} Cm</td>
      <td style="width: 10%">矯正視力</td>
      <td style="width: 4.5%; border-right:none">左</td>
      <td style="width: 11%; border-left:none"></td>
      <td style="width: 4.5%; border-right:none">右</td>
      <td style="width: 11%; border-left:none"></td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>

    </tr>
    <tr>
      <td>体重</td>
      <td>{{$data->detil->berat}} Kg</td>
      <td colspan="2">血液型</td>
      <td colspan="3">{{$data->detil->idgoldarah == null ? '' : $data->detil->goldarah->namajp}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
    <tr>
      <td>利手</td>
      <td>{{$data->detil->tangan->namajp}}</td>
      <td colspan="2">宗教</td>
      <td colspan="3">{{$data->agama->namajp}}</td>
      <td style="width: 1%; border-top: none; border-bottom: none;"></td>
    </tr>
  </table>
  <table style="margin-top: 8px">
    <tr>
      <td class="blue bold" style="width: 12%" rowspan="4">学歴</td>
      <td style="width: 22%">期間</td>
      <td style="width: 42%">学校名</td>
      <td style="width: 24%" colspan="2">学部・専攻</td>
    </tr>
    <tr>
      <td style="width: 10%"></td>
      <td></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td class="blue bold" style="width: 12%">日本語学校</td>
      <td>現在</td>
      <td> LPK ASKA BALI</td>
      <td style="width: 12%; border-right: none">日本語能力：</td>
      <td style="border-left:none"></td>
    </tr>
  </table>
  <table style="margin-top: 8px">
    <tr>
      <td class="blue bold" style="width: 12%" rowspan="4">職 歴</td>
      <td style="width: 22%">期間</td>
      <td style="width: 31%">会社名</td>
      <td style="width: 23%">職種</td>
      <td style="width: 12%">月給</td>
    </tr>
    <tr>
      <td></td>

      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>

      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>

      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <table style="margin-top: 8px">
    <tr>
      <td class="blue bold" style="width: 12%" rowspan="4">資格取得</td>
      <td style="width: 22%">取得日</td>
      <td style="width: 66%">資格・免許</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr>
  </table>
  <table style="margin-top: 8px">
    <tr>
      <td rowspan="6" class="blue bold" style="width: 12%">家族構成</td>
      <td style="width: 15%">続柄</td>
      <td style="width: 38%">氏名</td>
      <td style="width: 3%">年齢</td>
      <td style="width: 32%">業職</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
  <table style="margin-top: 8px">
    <tr>
      <td rowspan="5" class="blue bold" style="width:12%">事前確認</br>情報</td>
      <td class="blue" style="width: 2%">①</td>
      <td class="blue" style="width: 20%">入れ墨</td>
      <td style="width: 22%">{{$data->detil->tatto == 0 ? "いいえ" : "はい"}}</td>
      <td class="blue" style="width: 2%">⑥</td>
      <td class="blue" style="width: 18%">何年間働きたい？</td>
      <td style="width: 24%">36月</td>
    </tr>
    <tr>
      <td class="blue" style="width: 2%">②</td>
      <td class="blue" style="width: 20%">喫煙</td>
      <td style="width: 22%">{{$data->detil->merokok == 0 ? "いいえ" : "はい"}}</td>
      <td class="blue" style="width: 2%">⑦</td>
      <td class="blue" style="width: 18%">大きな病気やケガ、手術</td>
      <td style="width: 24%"></td>
    </tr>
    <tr>
      <td class="blue" style="width: 2%">③</td>
      <td class="blue" style="width: 20%">飲酒</td>
      <td style="width: 22%">{{$data->detil->alkohol == 0 ? "いいえ" : "はい"}}</td>
      <td class="blue" style="width: 18%" colspan="2">（ある場合）詳細</td>
      <td style="width: 24%"></td>
    </tr>
    <tr>
      <td class="blue" style="width: 2%">④</td>
      <td class="blue" style="width: 20%">色覚異常</td>
      <td style="width: 22%">{{$data->detil->butawarna == 0 ? "いいえ" : "はい"}}</td>
      <td class="blue" style="width: 2%">⑧</td>
      <td class="blue" style="width: 18%">アレルギー</td>
      <td style="width: 24%">{{$data->detil->alergi == 0 ? "無" : "有"}}</td>
    </tr>
    <tr>
      <td class="blue" style="width: 2%">⑤</td>
      <td class="blue" style="width: 20%">虫歯</td>
      <td style="width: 22%"></td>
      <td class="blue" style="width: 18%" colspan="2">（ある場合）詳細</td>
      <td style="width: 24%"></td>
    </tr>
  </table>
  <div style="text-align: right; margin-top: 5px; font-size: 13px">LPK ASKA BALI</div>
</div>

