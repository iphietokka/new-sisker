
@extends('layouts.home')
@section('content')
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$datakerja}}</h3>

              <p>Data Kerjasama</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('kerjasama')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              @foreach($aktif as $ak)
              <h3>{{$ak->aktif}}</h3>
                @endforeach
              <p>Kerjasama Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{url('aktif')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              @foreach($akanberakhir as $ab)

              <h3>{{$ab->akanberakhir}}</h3>
              
              @endforeach
              <p>Kerjasama Akan Berakhir</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('akan-berakhir')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              @foreach($berakhir as $br)

              <h3>{{$br->berakhir}}</h3>
           
              @endforeach
              <p>Kerjasama Berakhir</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('berakhir')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    

    
   <div class="col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Statistik Kerjasama</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">

                  <div id="container"></div>

              </div>
            </div>
      </div>
    </div>

        <!-- ./col -->
      </div>

    </section>
  
 
@endsection
<script type="module">
  import Highcharts from 'https://code.highcharts.com/es-modules/masters/highcharts.src.js';
  $(function () {
    var data_desk = <?php echo $desk; ?>;
    var data_tahun = <?php echo $tahun; ?>;

    $('#container').highcharts({

      chart: {

        type: 'column'

      },

      title: {

        text: 'Statistik Kerjasama / Tahun'

      },

      xAxis: {

        categories: data_tahun
      },

      yAxis: {
        min: 0,
        title: {
          text: 'Jumlah'
        },
        stackLabels: {
          enabled: true,
          style: {
            fontWeight: 'bold',
            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
          }
        }
      },

      plotOptions: {
        bar: {
          dataLabels: {
            enabled: true
          }
        }
      },
      legend: {
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: 25,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
      },
      credits: {
        enabled: false
      },
      series: [{
        name: 'Kerjasama  ',
        data: data_desk

      }]
    });
  });
</script>
   