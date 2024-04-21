<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>ASKA Bali | CV - Job Order {{$job->perusahaan->nama}}</title>
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

  .page_break {
    page-break-after: always;
  }
</style>

<div>
  <?php
    $nomor = 1;
    $jml = count($job->detil);
  ?>

  @foreach ($job->detil as $jd)
    <img class="logo" src="{{asset('assets/images/logo.png')}}" width="11%" alt="">
    
    <table >
      <tr>
        <td rowspan="2" style="width: 12%; border-left: none; border-top: none; border-bottom: none;">
        </td>
        <td style="width: 22%">受入企業名</td>
        <td class="blue" style="width: 38%; border-right:none;">{{$job == null ? '' : $job->perusahaan->namajp}}</td>
        <td class="blue" style="width: 3%; text-right; border-left:none;">様</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
        <td class="blue" style="width: 12%">職種</td>
        <td class="blue" style="width: 12%"></td>
      </tr>
      <tr>
        <td>監理団体名</td>
        <td class="blue" style="border-right:none;">{{$job == null ? '' : $job->perusahaan->lembaga->namajp}}</td>
        <td class="blue" style="text-right; border-left:none;">様</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
        <td class="blue" style="width:12%">日本語レーベル</td>
        <td class="blue" style="width: 12%"></td>
      </tr>
    </table>

    <table style="margin-top: 15px">
      <tr>
        <td class="bold-border bold" style="width: 12%">No.</td>
        <td class="bold-border bold" style="width: 22%">{{$nomor}}</td>
        <td class="bold-border bold">履歴書</td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="9" class="blue" style="width: 12%">本人</td>
        <td rowspan="2" style="width: 11%">氏名</td>
        <td style="width: 11%">カタカナ</td>
        <td colspan="5" style="width: 41%">{{$jd->siswa->namajp}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
        <td rowspan="9" class="student-image" style="width: 24%; padding: 0; background-image: url({{asset($jd->siswa->photo == null ? 'assets/images/user-default.jpg' : $jd->siswa->photo)}})"></td>
      </tr>
      <tr>
        <td>ローマ字</td>
        <td colspan="5" style="text-transform: uppercase">{{$jd->siswa->nama}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">生年月日</td>
        <td>{{ (new \App\Helper)->tgljepang($jd->siswa->tglahir) }}</td>
        <td>年齡</td>
        <td>{{ (new \App\Helper)->durasitahun($jd->siswa->tglahir) }}</td>
        <td>性別</td>
        <td>{{$jd->siswa->jk->namajp}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">身長</td>
        <td>{{$jd->siswa->detil->tinggi}} Cm</td>
        <td colspan="2">色盲</td>
        <td colspan="2">{{$jd->siswa->detil->butawarna == 0 ? 'いいえ' : 'はい'}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">体重</td>
        <td>{{$jd->siswa->detil->berat}} Kg</td>
        <td colspan="2">アレルギー</td>
        <td colspan="2">{{$jd->siswa->detil->alergi == 0 ? '無' : '有'}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">血液型</td>
        <td style="padding: 0">
          <div style="display:flex; flex-direction:column">
            <div style="float:left; text-align:center; width:50%; border-right: 1px solid #000; height:20px; margin-top: -4px; padding-top: 4px">{{$jd->siswa->detil->idgoldarah == null ? '' : $jd->siswa->detil->goldarah->namajp}}</div>
            <div style="text-align:center">視力</div>
          </div>
        </td>
        <td>左</td>
        <td>{{$jd->siswa->detil->matakiri}}</td>
        <td>右</td>
        <td>{{$jd->siswa->detil->matakanan}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">出身地</td>
        <td style="text-transform: uppercase">{{$jd->siswa->tplahir}}</td>
        <td colspan="2">タバコを吸うか</td>
        <td colspan="2">{{$jd->siswa->detil->merokok == 0 ? 'いいえ' : 'はい'}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">現在地</td>
        <td style="text-transform: uppercase">{{$jd->siswa->idkab == null ? '' : $jd->siswa->kabupaten->nama}}</td>
        <td colspan="2">お酒を飲むか</td>
        <td colspan="2">{{$jd->siswa->detil->alkohol == 0 ? 'いいえ' : 'はい'}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
      <tr>
        <td colspan="2">宗教</td>
        <td>{{$jd->siswa->idagama == null ? '' : $jd->siswa->agama->namajp}}</td>
        <td colspan="2">利き手</td>
        <td colspan="2">{{$jd->siswa->detil->idtangan == null ? '' : $jd->siswa->detil->tangan->namajp}}</td>
        <td style="width: 1%; border-top: none; border-bottom: none;"></td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="3" class="blue" style="width: 12%">家族</td>
        <td style="width: 22%">婚姻状況</td>
        <td colspan="2">
          <?php
            $kawin = $jd->siswa->detil->idstatuskawin;
            if ($kawin > 1) {
              $kawin = 1;
            }elseif ($kawin == 1 && $kawin != null) {
              $kawin = 0;
            }
          ?>
          <span style="margin-right: 10px;">未婚</span>
          <input type="checkbox" style="display:inline" {{$kawin == 0 ? 'checked' : ''}}>
          <span style="margin: 0 10px;">既婚</span>
          <input type="checkbox" style="display: inline" {{$kawin == 1 ? 'checked' : ''}}>
        </td>
        <td>子供 : <span style="margin: 0 10px">{{$jd->siswa->detil->jmlanak}} </span> 人</td>
      </tr>
      <tr>
        <td>
          <span style="margin-right: 10px;">父</span>
          <input type="checkbox" style="display: inline" {{count($jd->siswa->keluarga->where('idhubungan',1)) > 0 ? 'checked' : ''}}>
        </td>
        <td>兄 : <span style="margin: 0 10px; color : {{count($jd->siswa->keluarga->where('idhubungan',3)) == 0 ? 'white' : 'black'}}">{{count($jd->siswa->keluarga->where('idhubungan',3))}}</span> 人</td>
        <td>姉 : <span style="margin: 0 10px; color : {{count($jd->siswa->keluarga->where('idhubungan',5)) == 0 ? 'white' : 'black'}}">{{count($jd->siswa->keluarga->where('idhubungan',5))}}</span> 人</td>
        <td style="width: 24%">祖父 : <span style="margin: 0 10px; color : {{count($jd->siswa->keluarga->where('idhubungan',7)) == 0 ? 'white' : 'black'}}">{{count($jd->siswa->keluarga->where('idhubungan',7))}}</span> 人</td>
      </tr>
      <tr>
        <td>
          <span style="margin-right: 10px;">母</span>
          <input type="checkbox" style="display: inline" {{count($jd->siswa->keluarga->where('idhubungan',2)) > 0 ? 'checked' : ''}}>
        </td>
        <td>弟 : <span style="margin: 0 10px; color : {{count($jd->siswa->keluarga->where('idhubungan',4)) == 0 ? 'white' : 'black'}}">{{count($jd->siswa->keluarga->where('idhubungan',4))}}</span> 人</td>
        <td>妹 : <span style="margin: 0 10px; color : {{count($jd->siswa->keluarga->where('idhubungan',6)) == 0 ? 'white' : 'black'}}">{{count($jd->siswa->keluarga->where('idhubungan',6))}}</span> 人</td>
        <td style="width: 24%">祖母 : <span style="margin: 0 10px; color : {{count($jd->siswa->keluarga->where('idhubungan',8)) == 0 ? 'white' : 'black'}}">{{count($jd->siswa->keluarga->where('idhubungan',8))}}</span> 人</td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="2" class="blue" style="width: 12%">学歴</td>
        <td style="width: 22%">期間</td>
        <td>最終学歴・学校名</td>
        <td style="width: 24%">専攻</td>
      </tr>
      <tr>
        <?php
          $pendidikan = App\Models\SiswaPendidikan::with('jenjang')->where('idsiswa',$jd->idsiswa)->orderby('idjenjang','desc')->first();
        ?>
        <td>{{$pendidikan == null ? '' : $pendidikan->thnmasuk.'年07月 ~ '.(new \App\Helper)->bulanjepang($pendidikan->tgllulus)}}</td>
        <td>{{$pendidikan == null ? '' : $pendidikan->namasekolah.' '.$pendidikan->jenjang->jenjangjp}}</td>
        <td></td>
      </tr>
      <tr>
        <td class="blue" style="width: 12%">日本語学校</td>
        <td>
          @if ($jd->siswa->idjenis == 1)
            @if ($jd->siswa->idperiode != null)
              {{$jd->siswa->periode->tahun}}年{{$jd->siswa->periode->idbulan < 10 ? '0'.$jd->siswa->periode->idbulan : ''}}月 ~ 現在
            @endif
          @else
              
          @endif
        </td>
        <td>{{$jd->siswa->idjenis == 1 ? 'LPK ASKA BALI' : ''}}</td>
        <td>日本語学習期間: 2ヶ 月間</td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="2" class="blue" style="width: 12%">職歴</td>
        <td style="width: 22%">期間</td>
        <td style="width: 12%">仕事</td>
        <td>内容</td>
        <td style="width: 12%">備考</td>
      </tr>
      <tr>
        <td>~ 現在</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="2" class="blue" style="width: 12%">資格</td>
        <td>車運転免許書</td>
        <td style="width: 24%">取得年月 : 2023年10月</td>
      </tr>
      <tr>
        <td></td>
        <td>取得年月 :</td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="5" class="blue" style="width: 12%">個人情報</td>
        <td style="width: 22%">長所</td>
        <td>{{$jd->siswa->detil->idkeunggulan == null ? '' : $jd->siswa->detil->keunggulan->namajp}}</td>
      </tr>
      <tr>
        <td>短所</td>
        <td>{{$jd->siswa->detil->idkekurangan == null ? '' : $jd->siswa->detil->kekurangan->namajp}}</td>
      </tr>
      <tr>
        <td>趣味</td>
        <td>{{$jd->siswa->detil->idhobi == null ? '' : $jd->siswa->detil->hobi->namajp}}</td>
      </tr>
      <tr>
        <td>電話番号</td>
        <td>{{$jd->siswa->nohp}}</td>
      </tr>
      <tr>
        <td>日本へ行く目的</td>
        <td></td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td class="blue" style="width: 12%">在日<br>親戚家族</td>
        <td style="width: 22%">
          <span style="margin-right: 10px;">有</span>
          <input type="checkbox" style="display:inline" {{$jd->siswa->keluargajepang != null ? 'checked' : ''}}>
          <span style="margin: 0 10px;">無</span>
          <input type="checkbox" style="display: inline" {{$jd->siswa->keluargajepang == null ? 'checked' : ''}}>
        </td>
        <td>関係 : {{$jd->siswa->keluargajepang == null ? '' : $jd->siswa->keluargajepang->hubungan->namajp}}</td>
        <td>所在地 : {{$jd->siswa->keluargajepang == null ? '' : $jd->siswa->keluargajepang->perfektur->namajp}}</td>
      </tr>
    </table>

    <table style="margin-top: 8px">
      <tr>
        <td rowspan="2" style="width: 12%" class="blue">テスト結果</td>
        <td style=" width:11%">IQ</br>
          （20問10分）
        </td>
        <td style="width: 11%">算数</td>
        <td colspan="2" style="width: 12%">腕立て伏せ</br>（1分）</td>
        <td colspan="2" style="width:10%">腹筋</br>（1分）</td>
        <td colspan="2">スクワットジャンプ</br>（1分）</td>
        <td colspan="2">重量挙げ20kg</br>（1分）</td>
      </tr>
      <tr>
        <td style="width: 11%"></td>
        <td style="width: 11%"></td>
        <td style="border-right:none; width: 7%"></td>
        <td class="text-left" style="border-left:none; width: 7%">回</td>
        <td style="border-right:none; width:6%"></td>
        <td class="text-left" style="border-left:none; width:6%">回</td>
        <td style="border-right:none"></td>
        <td class="text-left" style="border-left:none">回</td>
        <td style="width: 8.5%; border-right:none"></td>
        <td class="text-left" style="border-left:none; width:8.5%">回</td>
      </tr>
    </table>
    <div style="text-align: right; margin-top: 5px; font-size: 13px">LPK ASKA BALI</div>

    @if ($jml - $nomor > 0)
      <div class="page_break"></div>
    @endif

    <?php $nomor ++; ?>
  @endforeach
  
</div>

