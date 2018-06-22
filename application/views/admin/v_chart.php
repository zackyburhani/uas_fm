<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Highcharts Example</title>

        <style type="text/css">

        </style>
    </head>
    <body>

<script src="<?php blink('/assets/Highcharts-6.1.0/code/highcharts.js')?>"></script>
<script src="<?php blink('/assets/Highcharts-6.1.0/code/highcharts-3d.js')?>"></script>
<script src="<?php blink('/assets/Highcharts-6.1.0/code/modules/exporting.js')?>"></script>
<script src="<?php blink('/assets/Highcharts-6.1.0/code/modules/export-data.js')?>"></script>


<section class="content-header">
  <h1>
    Dashboard
    <small>Halaman Data Dosen</small>
  </h1>
</section>

<section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>Top Dosen Terbaik</strong>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
           <div id="container" class="container-fluid" style="height: 400px"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>Total Feedback</strong>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
           <div id="container2" class="container-fluid" style="height: 400px"></div>
          </div>
        </div>
      </div>
    </div>

</section>

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Top 5 Dosen Yang Mendapatkan Feedback "Sangat Baik" Dan "Baik" Terbanyak'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Persentase Nilai',
        data: [
            <?php 
                // data yang diambil dari database
                if(count($graph)>0)
                {
                    foreach ($graph as $data) {
                        echo "['" .$data->nm_dosen . "'," . $data->jumlah ."],\n";
                    }
                }
            ?>
        ]
    }]
});
</script>

<script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Jumlah Feedback Berdasarkan Fakultas'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Persentase Jumlah Feedback',
        data: [
            <?php 
                // data yang diambil dari database
                if(count($fakultas)>0)
                {
                    foreach ($fakultas as $data) {
                        echo "['" .$data->fakultas . "'," . $data->jumlah ."],\n";
                    }
                }
            ?>
        ]
    }]
});
        </script>


</body>
</html>
