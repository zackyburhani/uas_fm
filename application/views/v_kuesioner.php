<!-- Main content -->
<section class="content">

  <?php if($this->session->flashdata('pesan') == TRUE ) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success fade in" id="alert">
          <p><center><b><?php echo $this->session->flashdata('pesan') ?></b></center></p>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if($this->session->flashdata('pesanGagal') == TRUE ) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" id="alert">
          <p><center><b><?php echo $this->session->flashdata('pesanGagal') ?></b></center></p>
        </div>
      </div>
    </div>
  <?php } ?>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="form-group">
            <label style="margin-top: 5px;" for="inputEmail3" class="col-sm-2 control-label"><i class="fa fa-mortar-board"></i> Pilih Fakultas</label>
              <form method="GET"  action="<?php echo site_url('Mahasiswa/Fakultas')?>"> 
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
        <?php if(isset($getDosenFakultas)) { ?>
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatablebuku">
          <thead>
            <tr>
              <th width="20px">No.</th>
              <th>Nama Dosen</th>
              <th width="200px"><center>Acton</center></th>
            </tr>
          </thead>
          <tbody>
          <?php $no=1; ?>
          <?php foreach($getDosenFakultas as $dosen) { ?>
          <?php $selesai = $this->ModelMahasiswa->selesai($dosen->nik,$username); ?>
            <tr>
              <td class="text-center"><?php echo $no++."." ?></td>
              <td><?php echo $dosen->nm_dosen ?></td>
             
              <td class="text-center">
                <?php if($selesai == null){ ?>
                <button class="btn btn-info" data-toggle="modal" data-target="#kuesionerModal<?php echo $dosen->nik ?>"><i class="fa fa-pencil"></i> Isi Kuesioner </button>
                <?php } else {  ?>
                  <span><center><b>-</b></center></span>
                <?php } ?>
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

<?php if(isset($getDosenFakultas)) { ?>
<?php foreach($getDosenFakultas as $pertanyaan){ ?>
<div class="modal fade" id="kuesionerModal<?php echo $pertanyaan->nik ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-pencil"></i> Silahkan Isi Kuesioner Dibawah ini</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Mahasiswa/prosesKuesioner')?>" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="fakultas" value="<?php echo $pertanyaan->fakultas ?>">
            <?php $no=1; ?>
            <?php $b=1; $kb=1; $bk=1; $sb=1; $p=1; ?>
            <?php foreach($getAllPertanyaan as $kuesioner) { ?>
              <input type="hidden" name="nik" value="<?php echo $pertanyaan->nik ?>">
              <input type="hidden" name="id_pertanyaan<?php  echo $p++; ?>" value="<?php echo $kuesioner->id_pertanyaan ?>">
              <table class="table table-bordered">
                <tr>
                  <td width="30px"><b><?php echo $no++."." ?></b></td>
                  <td><b><?php echo $kuesioner->nm_pertanyaan ?></b></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <label class="radio-inline"><input type="radio" required value="Buruk" name="b<?php echo $b++; ?>">Buruk</label>
                    <label class="radio-inline"><input type="radio" required value="Kurang Baik" name="b<?php echo $kb++; ?>">Kurang Baik</label>
                    <label class="radio-inline"><input type="radio" required value="Baik" name="b<?php echo $bk++; ?>">Baik</label>
                    <label class="radio-inline"><input type="radio" required value="Sangat Baik" name="b<?php echo $sb++; ?>">Sangat Baik</label>
                  </td>
                </tr>
              </table>
            <?php } ?>

            <div class="form-group"><label>Feedback</label>
              <textarea required name="feedback" style="height: 70px;" class="form-control"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Kuesioner</button>
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
<?php } ?>


</section>
  
