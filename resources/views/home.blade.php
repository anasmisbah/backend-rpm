@extends('layouts.master')

@push('css')

@endpush

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Dashboard</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$promo}}</h3>

          <p>Promos</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$news}}</h3>

          <p>News</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-paper"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$event}}</h3>

          <p>Events</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-calendar"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$distributor}}</h3>

          <p>Distributor</p>
        </div>
        <div class="icon">
          <i class="ion ion-ios-people"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$user}}</h3>

            <p>Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-person"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$transaction}}</h3>

            <p>Transaction</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$coupon}}</h3>

            <p>Coupons</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-pricetag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$distributor}}</h3>

            <p>Voucher</p>
          </div>
          <div class="icon">
            <i class="ion ion-card"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
  </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Sales Transaction</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$total}} KL</span>
                    <span>Total Transaction</span>
                </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                </span>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<script>
    $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

    let url = "{{ route('home.chart') }}"
    $.ajax({
        type: 'get',
        url: url,
        success: function(data) {
            var $salesChart = $('#sales-chart')
            var salesChart  = new Chart($salesChart, {
              type   : 'bar',
              data   : {
                labels  : data.label,
                datasets: [
                  {
                    backgroundColor: '#007bff',
                    borderColor    : '#007bff',
                    data           : data.transaction
                  }
                ]
              },
              options: {
                maintainAspectRatio: false,
                tooltips           : {
                  mode     : mode,
                  intersect: intersect
                },
                hover              : {
                  mode     : mode,
                  intersect: intersect
                },
                legend             : {
                  display: false
                },
                scales             : {
                  yAxes: [{
                    // display: false,
                    gridLines: {
                      display      : true,
                      lineWidth    : '4px',
                      color        : 'rgba(0, 0, 0, .2)',
                      zeroLineColor: 'transparent'
                    },
                    ticks    : $.extend({
                      beginAtZero: true,

                      // Include a dollar sign in the ticks
                      callback: function (value, index, values) {
                        if (value >= 1000) {
                          value /= 1000
                          value += 'KL'
                        }
                        return value
                      }
                    }, ticksStyle)
                  }],
                  xAxes: [{
                    display  : true,
                    gridLines: {
                      display: false
                    },
                    ticks    : ticksStyle
                  }]
                }
              }
            })

            var $revenueChart = $('#revenue-chart')
            var revenueChart  = new Chart($revenueChart, {
              type   : 'bar',
              data   : {
                labels  : data.label,
                datasets: [
                  {
                    backgroundColor: '#28A745',
                    borderColor    : '#28A745',
                    data           : data.revenue
                  }
                ]
              },
              options: {
                maintainAspectRatio: false,
                tooltips           : {
                  mode     : mode,
                  intersect: intersect
                },
                hover              : {
                  mode     : mode,
                  intersect: intersect
                },
                legend             : {
                  display: false
                },
                scales             : {
                  yAxes: [{
                    // display: false,
                    gridLines: {
                      display      : true,
                      lineWidth    : '4px',
                      color        : 'rgba(0, 0, 0, .2)',
                      zeroLineColor: 'transparent'
                    },
                    ticks    : $.extend({
                      beginAtZero: true,

                      // Include a dollar sign in the ticks
                      callback: function (value, index, values) {
                        if (value >= 1000) {
                          value /= 1000
                          value += 'k'
                        }
                        return value + ' IDR'
                      }
                    }, ticksStyle)
                  }],
                  xAxes: [{
                    display  : true,
                    gridLines: {
                      display: false
                    },
                    ticks    : ticksStyle
                  }]
                }
              }
            })
        }
    })

})

</script>
@endpush
