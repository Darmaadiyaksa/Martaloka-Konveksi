@extends('layouts.menu')

@section('title-head', 'Dashboard')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Dashboard {{auth::user()->pejabat->jabatan->nama}}</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Simulasi UP</a></li>
              <li class="breadcrumb-item active">Dahboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-lg-4 col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-center align-items-center py-1">
            <h4 class="card-title">Persentase Simulasi Serentak</h4>
          </div>
          <div class="card-body p-0">
            <div id="radialbar-charts" class="mb-1"></div>
            <div class="row border-top text-center mx-0">
              <div class="col-4 border-right py-50">
                <p class="card-text text-muted mb-0">Mahasiswa</p>
                <h3 class="font-weight-bolder mb-0">30</h3>
              </div>
              <div class="border-right col-4 py-50">
                <p class="card-text text-muted mb-0">Sudah</p>
                <h3 class="font-weight-bolder mb-0">0</h3>
              </div>
              <div class="col-4 py-50">
                <p class="card-text text-muted mb-0">Belum</p>
                <h3 class="font-weight-bolder mb-0">35</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')

@endsection

@section('jspage')
<script>
  $(function () {
    'use strict';
    var radialBarChartEl = document.querySelector('#radialbar-charts'),
    radialBarChartConfig = {
      chart: {
        height: 120,
        type: 'radialBar'
      },
      colors: ['#04be5b'],
      plotOptions: {
        radialBar: {
          size: 130,
          hollow: {
            size: '35%'
          },
          track: {
            margin: 20
          },
          dataLabels: {
            name: {
              show: false,
            },
            value: {
              fontSize: '2rem',
              fontFamily: 'Montserrat',
            },
            total: {
              show: true,
              fontSize: '1rem',
              label: 'Persentase',
              formatter: function (w) {
                return '70%';
              }
            }
          }
        }
      },
      grid: {
        padding: {
          top: -35,
          bottom: -30
        }
      },
      legend: {
        show: false,
        position: 'bottom'
      },
      stroke: {
        lineCap: 'round'
      },
      series: [70],
      labels: ['Comments']
    };
    if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
    var radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
    radialChart.render();
    }
  });
</script>
@stop
