
<section class="content-header">
  <h1>
    Dashboard
    <small>Halaman Data Pertanyaan</small>
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
        <button class="btn btn-default" data-toggle="modal"data-target="#entryPertanyaanModal"><i class="fa fa-plus"></i></button> Tambah Data Pertanyaan
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatablebuku">
          <thead>
            <tr>
              <th width="20px">No.</th>
              <th>Nama Pertanyaan</th>
              <th width="30px">Edit</th>
              <th width="30px">Hapus</th>
            </tr>
          </thead>
          <tbody>
          <?php $no=1; ?>
          <?php foreach($getAllPertanyaan as $pertanyaan) { ?>
            <tr>
              <td><?php echo $no++."." ?></td>
              <td><?php echo $pertanyaan->nm_pertanyaan ?></td>
              <td class="text-center"><button class="btn btn-warning" data-toggle="modal" data-target="#updatePertanyaanModal<?php echo $pertanyaan->id_pertanyaan ?>"><i class="fa fa-edit"></i></button></td>
              <td class="text-center"><button class="btn btn-danger" data-toggle="modal" data-target="#deletePertanyaanModal<?php echo $pertanyaan->id_pertanyaan ?>"><i class="fa fa-trash"></i></button></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

 <!-- entry modal Dosen -->
  <div class="modal fade" id="entryPertanyaanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-question-circle"></i> Tambah Data Pertanyaan</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/tambahPertanyaan')?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group"><label>Pertanyaan</label>
              <input required class="form-control text-capitalize" required placeholder="Input Pertanyaan" data-placement="top" data-trigger=manual" type="text" name="nm_pertanyaan">
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

<?php foreach($getAllPertanyaan as $pertanyaan){ ?>
<div class="modal fade" id="updatePertanyaanModal<?php echo $pertanyaan->id_pertanyaan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-question-circle"></i> Tambah Data Pertanyaan</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/updatePertanyaan')?>" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group"><label>Pertanyaan</label>
              <input required class="form-control text-capitalize" required placeholder="Input Pertanyaan" data-placement="top" value="<?php echo $pertanyaan->nm_pertanyaan ?>" data-trigger=manual" type="text" name="nm_pertanyaan">
            </div>
            <input type="hidden" name="id_pertanyaan" value="<?php echo $pertanyaan->id_pertanyaan ?>">
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

<?php foreach($getAllPertanyaan as $pertanyaan) { ?>
  <div class="modal fade" id="deletePertanyaanModal<?php echo $pertanyaan->id_pertanyaan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="fa fa-trash"></i> Konfirmasi Hapus</div></h4>
        </div>
        <form method="POST" action="<?php echo site_url('Admin/hapusPertanyaan')?>" >
          <div class="modal-body">
            <span>Anda Yakin Ingin Menghapus</span>
          </div>
          <input type="hidden" name="id_pertanyaan" value="<?php echo $pertanyaan->id_pertanyaan?>">
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
  
