
<section class="content-header">
  <h1>
    Dashboard
    <small>Halaman Data Dosen</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button class="btn btn-default" data-toggle="modal"data-target="#entryDosenModal"><i class="fa fa-plus"></i></button> Tambah Data Dosen <?php echo $name ?>
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatablebuku">
          <thead>
            <tr>
              <th style="width: 20px">No.</th>
              <th>Nama Mahasiswa</th>
              <th>Pendapat Mahasiswa</th>
              <th width="50px" align="center">Total Nilai</th>
              <th class="text-center">Kesimpulan Feedback</th>
              <th width="50px">Lihat</th>
            </tr>
          </thead>
          <tbody>
          <?php $no=1; ?>
          <?php foreach($getAllHasil as $dosen) { ?>
          <?php $total = $this->ModelDosen->total($dosen->mahasiswa,$dosen->nik); ?>
            <tr>
              <td class="text-center"><?php echo $no++."." ?></td>
              <td><?php echo ucwords($dosen->nm_user) ?></td>
              <td><?php echo $dosen->feedback ?></td>
              <td class="text-center"><?php echo round($total->total) ?></td>
              <?php 
                if($total->total >= 80 && $total->total <= 100){
                  $status = "Sangat Baik";
                } else if($total->total >= 70 && $total->total < 80){
                  $status = "Baik";
                } else if($total->total >= 60 && $total->total < 70){
                  $status = "Kurang Baik";
                } else if($total->total >= 50 && $total->total < 60){
                  $status = "Buruk";
                } else if($total->total < 20 || $total->total > 100){
                  $status = "Tidak Valid";
                }
              ?>
              <td class="text-center">
              <?php if($status == "Sangat Baik" || $status == "Baik") { ?>
                <label style="color: blue;"><?php echo $status ?></label>
              <?php } else if($status == "Kurang Baik" || $status == "Buruk") { ?>
                <label style="color: red;"><?php echo $status ?></label>
              <?php } ?>
              </td>
              <td class="text-center"><button class="btn btn-info" data-toggle="modal" data-target="#lihatDosenModal<?php echo $dosen->mahasiswa ?>"><i class="fa fa-folder-open"></i></button></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <?php foreach ($getAllHasil as $dosen) { ?>
    <div class="modal fade" id="lihatDosenModal<?php echo $dosen->mahasiswa ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-question-circle"></i> Detail Kuesioner Dosen</div></h4>
        </div>
         <div class="modal-body">
            <?php $detail = $this->ModelDosen->hasilKuesioner_detail($dosen->mahasiswa,$dosen->nik); ?>
            <?php $no=1; ?>
            <?php foreach($detail as $d){ ?>
               <table class="table table-bordered">
                <tr>
                  <td width="30px"><b><?php echo $no++."." ?></b></td>
                  <td><b><?php echo $d->nm_pertanyaan ?></b></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <?php if($d->status == "Buruk" || $d->status == "Kurang Baik") { ?>
                    <span>Jawaban : <label style="color: red"><?php echo $d->status ?></label></span>
                    <?php } if($d->status == "Baik" || $d->status == "Sangat Baik") { ?>
                    <span>Jawaban : <label style="color: blue"><?php echo $d->status ?></label></span>
                    <?php } ?>

                  </td>
                </tr>
              </table>
            <?php } ?>
          </div>
      </div>
    </div>
  </div>
  <?php } ?>



</section>
  
