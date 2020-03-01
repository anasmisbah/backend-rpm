@extends('layouts.chart')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-warning card-outline mt-3">
          <div class="card-header border-0">
            <div class="d-flex justify-content-center">
              <h3 class="card-title text-bold">Quantity (KL)</h3>
            </div>
          </div>
          <div class="card-body">
            <div class="position-relative mb-4">
              <canvas id="quantity-chart" height="200"></canvas>
            </div>
          </div>
        </div>
        <!-- /.card -->
  </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-warning card-outline mt-3">
          <div class="card-header border-0">
            <div class="d-flex justify-content-center">
              <h3 class="card-title text-bold">Revenue</h3>
            </div>
          </div>
          <div class="card-body">
            <div class="position-relative mb-4">
              <canvas id="revenue-chart" height="200"></canvas>
            </div>
          </div>
        </div>
        <!-- /.card -->
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

    let url = "{{ route('transaction.datachart') }}"
    const id = "{{$distributor->id}}"
    $.ajax({
        type: 'get',
        url: url,
        data: {
            'id': id,
        },
        success: function(data) {
            var $quantityChart = $('#quantity-chart')
            var quantityChart  = new Chart($quantityChart, {
                type   : 'bar',
                data   : {
                labels  : data.label,
                datasets: [
                    {
                    backgroundColor: '#007bff',
                    borderColor    : '#007bff',
                    data           : data.quantity
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
                        return  value + ' KL'
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
                    backgroundColor: '#17A2B8',
                    borderColor    : '#17A2B8',
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
                        return 'Rp ' + value
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
            $(".se-pre-con").fadeOut('slow');
        },
    });


})
</script>
@endpush
