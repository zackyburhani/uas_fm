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
    <?php if($level_user == 1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Top Dosen Terbaik</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <div id="container" class="container-fluid" style="height: 400px"></div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>Eksport Data Feedback</strong>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="form-group">
                <form method="POST" action="<?php echo site_url('Dosen/cetak') ?>">
                    <label for="inputEmail3" class="col-sm-2 control-label">Export To Excel</label>
                    <div class="col-sm-10">
                        <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</button>    
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } elseif($level_user == 0){ ?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="form-group">
            <label style="margin-top: 5px;" for="inputEmail3" class="col-sm-2 control-label"><i class="fa fa-mortar-board"></i> Pilih Fakultas</label>
              <form method="GET"  action="<?php echo site_url('Admin/pilihDosen')?>"> 
              <div class="col-sm-4">
                <select class="form-control" name="fakultas">
                  <option required value="FTI">Fakultas Teknologi Informasi</option>
                  <option required value="FE">Fakultas Ekonomi</option>
                  <option required value="FIKOM">Fakultas Ilmu Komunikasi</option>
                  <option required value="FISIP">Fakultas Ilmu Sosial Dan Ilmu Politik</option>
                  <option required value="FT">Fakultas Teknik</option>
                </select>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Pilih</button>
              </div>
              </form>
            </div>
        </div>       
      </div>

      <div class="panel-body">
        <?php if(isset($getChained)) { ?>
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatablebuku">
          <thead>
            <tr>
              <th width="20px">No.</th>
              <th>Nama Dosen</th>
              <th width="200px"><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
          
          <?php $no=1; ?>
          <?php foreach($getChained as $dosen) { ?>
            <tr>
              <td class="text-center"><?php echo $no++."." ?></td>
              <td><?php echo $dosen->nm_dosen ?></td>
              <td class="text-center">
                <button data-toggle="modal" data-target="#konfirmasi<?php echo $dosen->nik ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel </button>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <?php } else {?>
          <div class="container-fluid">
            <center><h3><i>Silahkan Pilih Fakultas Untuk Menampilkan Data Dosen</i></h3></h3></center>   
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
    <?php } ?>
</section>


  <?php foreach ($getAllDosen as $dosen) { ?>
    <div class="modal fade" id="konfirmasi<?php echo $dosen->nik ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-file-excel-o"></i> Konfirmasi</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/Eksport')?>" enctype="multipart/form-data">
          <div class="modal-body">

            Export NIK <?php echo $dosen->nik ?> dengan nama <?php echo $dosen->nm_dosen ?>
            <input type="hidden" name="nik" value="<?php echo $dosen->nik ?>">
            <input type="hidden" name="nm_dosen" value="<?php echo $dosen->nm_dosen ?>">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Eksport</button>
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>

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


</body>
</html>
