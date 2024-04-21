@extends('layouts.menu')

@section('title-head', 'Dashboard')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Dashboard</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Aska Bali</a></li>
              <li class="breadcrumb-item active">Dahboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-lg-4 col-sm-4">
        <div class="card">
          <div class="card-header">
            <div>
              <p class="card-text mb-0">Siswa Kursus</p>
              <h2 class="font-weight-bolder mb-0">{{$kursus}}</h2>
            </div>
            <div class="avatar bg-light-info p-50 m-0">
              <div class="avatar-content">
                <i class="font-medium-5" data-feather="users"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4">
        <div class="card">
          <div class="card-header">
            <div>
              <p class="card-text mb-0">Siswa di Jepang</p>
              <h2 class="font-weight-bolder mb-0">{{$jepang}}</h2>
            </div>
            <div class="avatar bg-light-danger p-50 m-0">
              <div class="avatar-content">
                <i class="font-medium-5" data-feather="user-check"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4">
        <div class="card">
          <div class="card-header">
            <div>
              <p class="card-text mb-0">Perusahaan Tempat Magang</p>
              <h2 class="font-weight-bolder mb-0">{{$perusahaan}}</h2>
            </div>
            <div class="avatar bg-light-primary p-50 m-0">
              <div class="avatar-content">
                <i class="font-medium-5" data-feather="home"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Grafik Keberangkatan Siswa</h5>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-start mb-3">
              <div class="mr-2">
                <p class="card-text mb-50">{{date('Y')-1}}</p>
                <h3 class="font-weight-bolder">
                  <sup class="font-medium-1 font-weight-bold"><i data-feather="users"></i></sup>
                  <span>{{$thnlalu}}</span>
                </h3>
              </div>
              <div>
                <p class="card-text mb-50">{{date('Y')}}</p>
                <h3 class="font-weight-bolder">
                  <sup class="font-medium-1 font-weight-bold"><i data-feather="users"></i></sup>
                  <span class="text-primary">{{$thnini}}</span>
                </h3>
              </div>
            </div>
            <div id="departure-chart"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('page-js')
<script>
$(document).ready(function() {
  console.log({!!$bulan!!})
  var revenueChartOptions;
  var revenueChart;
  var $revenueChart = document.querySelector('#departure-chart');
  revenueChartOptions = {
    chart: {
      height: 240,
      toolbar: { show: false },
      zoom: { enabled: false },
      type: 'line',
      offsetX: -10
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 12],
      width: [4, 3]
    },
    grid: {
      borderColor: '#e7eef7'
    },
    legend: {
      show: false
    },
    colors: ['#a367dc', '#aaaaaa'],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        inverseColors: false,
        gradientToColors: [window.colors.solid.primary, '#aaaaaa'],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 40, 20, 100]
      }
    },
    markers: {
      size: 0,
      hover: {
        size: 5
      }
    },
    xaxis: {
      labels: {
        style: {
          colors: '#b9b9c3',
          fontSize: '1rem'
        }
      },
      axisTicks: {
        show: false
      },
      categories: {!!$bulan!!},
      axisBorder: {
        show: false
      },
      tickPlacement: 'on'
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        style: {
          colors: '#b9b9c3',
          fontSize: '1rem'
        },
        formatter: function (val) {
          return val > 999 ? (val / 1000).toFixed(0) + 'k' : val;
        }
      }
    },
    grid: {
      padding: {
        top: -20,
        bottom: -10,
        left: 20
      }
    },
    tooltip: {
      x: { show: false }
    },
    series: {!!$grafik!!}
  };
  revenueChart = new ApexCharts($revenueChart, revenueChartOptions);
  revenueChart.render();
});
</script>
@endsection
