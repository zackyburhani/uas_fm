
<section class="content-header">
  <h1>
    <small>Halaman Data Dosen</small>
  </h1>
</section>

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
        <button class="btn btn-default" data-toggle="modal"data-target="#entryDosenModal"><i class="fa fa-plus"></i></button> Tambah Data Dosen
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatablebuku">
          <thead>
            <tr>
              <th width="30px">NIK</th>
              <th class="text-center">Nama Dosen</th>
              <th class="text-center">Fakultas</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Alamat</th>
              <th width="30px">Edit</th>
              <th width="30px">Hapus</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($getAllDosen as $dosen) { ?>
            <tr>
              <td><?php echo $dosen->nik ?></td>
              <td><?php echo $dosen->nm_dosen ?></td>
              <td class="text-center"><?php echo $dosen->fakultas ?></td>
              <td class="text-center"><?php echo $dosen->jk ?></td>
              <td><?php echo ucwords($dosen->alamat) ?></td>
              <td class="text-center"><button class="btn btn-warning" data-toggle="modal" data-target="#updateDosenModal<?php echo $dosen->nik ?>"><i class="fa fa-edit"></i></button></td>
              <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#deleteDosenModal<?php echo $dosen->nik ?>"><i class="fa fa-trash"></i></button></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

 <!-- entry modal Dosen -->
  <div class="modal fade" id="entryDosenModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-users"></i> Tambah Data Dosen</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/tambahDosen')?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group"><label>NIK</label>
              <input required class="form-control required text-capitalize" placeholder="Input NIK" data-placement="top" data-trigger=manual" type="text" value="<?php echo $getKodeDosen ?>" readonly name="nik">
            </div>

            <div class="form-group"><label>Nama Dosen</label>
              <input required class="form-control required text-capitalize" placeholder="Input Nama Dosen" data-placement="top" data-trigger="manual" type="text" name="nm_dosen">
            </div>

            <div class="form-group"><label>Fakultas</label>
              <div class="custom-select my-1 mr-sm-2">
                <select class="form-control" name="fakultas">
                  <option required value="FTI">Fakultas Teknologi Informasi</option>
                  <option required value="FE">Fakultas Ekonomi</option>
                  <option required value="FIKOM">Fakultas Ilmu Komunikasi</option>
                  <option required value="FISIP">Fakultas Ilmu Sosial Dan Ilmu Politik</option>
                  <option required value="FT">Fakultas Teknik</option>
                </select>
              </div>
            </div>

            <div class="form-group"><label>Jenis Kelamin</label>
              <div class="radio">
                <label class="radio-inline"><input type="radio" value="L" required name="jk">Laki-laki</label>
                <label class="radio-inline"><input type="radio" value="P" required name="jk">Perempuan</label>
              </div>
            </div>

            <div class="form-group"><label>Alamat</label>
              <textarea required name="alamat" class="form-control"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php foreach ($getAllDosen as $dosen) { ?>
    <div class="modal fade" id="updateDosenModal<?php echo $dosen->nik ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-users"></i> Tambah Data Dosen</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/updateDosen')?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group"><label>NIK</label>
              <input required class="form-control required text-capitalize" placeholder="Input NIK" data-placement="top" data-trigger=manual" type="text" value="<?php echo $dosen->nik ?>" readonly name="nik">
            </div>

            <div class="form-group"><label>Nama Dosen</label>
              <input required class="form-control required text-capitalize" placeholder="Input Nama Dosen" data-placement="top" data-trigger="manual" type="text" name="nm_dosen" value="<?php echo $dosen->nm_dosen ?>">
            </div>

            <div class="form-group"><label>Fakultas</label>
              <div class="custom-select my-1 mr-sm-2">
                <select class="form-control" name="fakultas">
                  <option <?php if( $dosen->fakultas=='FTI'){echo "selected"; } ?> value="FTI">Fakultas Teknologi Informasi</option>
                  <option <?php if( $dosen->fakultas=='FE'){echo "selected"; } ?> value="FE">Fakultas Ekonomi</option>
                  <option <?php if( $dosen->fakultas=='FIKOM'){echo "selected"; } ?> value="FIKOM">Fakultas Ilmu Komunikasi</option>
                  <option <?php if( $dosen->fakultas=='FISIP'){echo "selected"; } ?> value="FISIP">Fakultas Ilmu Sosial Dan Ilmu Politik</option>
                  <option <?php if( $dosen->fakultas=='FT'){echo "selected"; } ?> value="FT">Fakultas Teknik</option>
                  <option <?php if( $dosen->fakultas=='ASTRI'){echo "selected"; } ?> value="ASTRI">Akademi Sekretari</option>
                </select>
              </div>
            </div>

            <div class="form-group"><label>Jenis Kelamin</label>
              <div class="radio">
                <label class="radio-inline"><input <?php if( $dosen->jk=='L'){echo "checked"; } ?> type="radio" value="L" name="jk">Laki-laki</label>
                <label class="radio-inline"><input <?php if( $dosen->jk=='P'){echo "checked"; } ?> type="radio" value="P" name="jk">Perempuan</label>
              </div>
            </div>

            <div class="form-group"><label>Alamat</label>
              <textarea name="alamat" class="form-control"><?php echo $dosen->alamat ?></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>

<?php foreach($getAllDosen as $dosen) { ?>
  <div class="modal fade" id="deleteDosenModal<?php echo $dosen->nik ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-trash"></i> Konfirmasi Hapus</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/hapusDosen')?>" enctype="multipart/form-data">
          <div class="modal-body">
            <span>Anda Yakin Ingin Menghapus dosen dengan nama <b><?php echo $dosen->nm_dosen ?></b> ?</span>
          </div>
          <input type="hidden" name="nik" value="<?php echo $dosen->nik ?>">
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

</section>
  
