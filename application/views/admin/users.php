
<section class="content-header">
  <h1>
    <small>Halaman Data User</small>
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
        <button class="btn btn-default" data-toggle="modal" href="#" data-target="#entryUserModal"><i class="fa fa-plus"></i></button> Tambah Data User
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatablebuku">
          <thead>
            <tr>
              <th>Username</th>
              <th>Nama User</th>
              <th>Email</th>
              <th>Level User</th>
              <th width="30px">Edit</th>
              <th width="30px">Hapus</th>
            </tr>
              </thead>
              <tbody>
                <?php foreach($dataUser as $data){?>
                <tr>
                  <td><?php echo $data->username;?></td>
                  <td><?php echo $data->nm_user;?></td>
                  <td><?php echo $data->email;?></td>
                  <td><?php echo $data->level_user;?></td>
                  <td><a href="#modalEditUser<?php echo $data->username?>" class="btn btn-warning btn-circle" id="editBuku" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </a></td>
                  <td><a href="#modalHapusUser<?php echo $data->username?>" class="btn btn-danger btn-circle" id="hapusBuku" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a></td>
                  <?php } ?>
                </tr>
              </tbody>
            </table>

              <!-- entry modal Barang -->
              <div class="modal fade" id="entryUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel"><div class="icon"><i class="ion ion-cube"></i> Tambah Data User</div></h4>
                    </div>
                    <form method="POST" action="<?php echo site_url('Admin/tambahUser')?>" enctype="multipart/form-data">
                      <div class="modal-body">

                        <div class="form-group"><label>Username</label>
                          <input required class="form-control required text-capitalize" placeholder="Input Username" data-placement="top" data-trigger="manual" type="text" name="username">
                        </div>

                        <div class="form-group"><label>Nama Lengkap</label>
                          <input required class="form-control required text-capitalize" placeholder="Input Nama Lengkap" data-placement="top" data-trigger="manual" type="text" name="nm_user">
                        </div>

                        <div class="form-group"><label>Email</label>
                          <input required class="form-control required text-capitalize" placeholder="Input Email" data-placement="top" data-trigger="manual" type="email" name="email">
                        </div>

                        <div class="form-group"><label>Password</label>
                          <input required class="form-control required text-capitalize" placeholder="Input Password" data-placement="top" data-trigger="manual" type="password" name="password">
                        </div>

                        <div class="form-group"><label>Konfirmasi Password</label>
                          <input required class="form-control required text-capitalize" placeholder="Input Konfirmasi Password" data-placement="top" data-trigger="manual" type="password" name="password2">
                        </div>

                        <div class="form-group"><label>Level User</label>
                          <select name="level_user" class="form-control">
                            <option value="0">Admin</option>
                            <option value="1">Dosen</option>
                            <option value="2">Mahasiswa</option>
                          </select> 
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
              <!-- /.entry Barang modal -->


   <?php if (isset($dataUser)){
     foreach($dataUser as $data){
    ?>
    <div id="modalEditUser<?php echo $data->username?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel"><i class="fa fa-user"></i> Edit Data User</h3>
            </div>
            <form method="POST" action="<?php echo site_url('Admin/updateUsername')?>" enctype="multipart/form-data">
                      <div class="modal-body">

                          <input required class="form-control required text-capitalize" data-placement="top" data-trigger="manual" type="hidden" name="id" value="<?php echo $data->username ?>">

                        <div class="form-group"><label>Username</label>
                          <input required class="form-control required text-capitalize" value="<?php echo $data->username ?>" readonly data-placement="top" data-trigger="manual" type="text" name="username">
                        </div>

                        <div class="form-group"><label>Nama Lengkap</label>
                          <input required class="form-control required text-capitalize" value="<?php echo $data->nm_user ?>" placeholder="Input Nama Lengkap" data-placement="top" data-trigger="manual" type="text" name="nm_user">
                        </div>

                        <div class="form-group"><label>Email</label>
                          <input required class="form-control required text-capitalize" value="<?php echo $data->email ?>" placeholder="Input Email" data-placement="top" data-trigger="manual" type="email" name="email">
                        </div>

                        <div class="form-group"><label>Password</label>
                          <input class="form-control text-capitalize" placeholder="Input Password" data-placement="top" data-trigger="manual" type="password" name="password">
                        </div>

                        <div class="form-group"><label>Konfirmasi Password</label>
                          <input class="form-control text-capitalize" placeholder="Input Konfirmasi Password" data-placement="top" data-trigger="manual" type="password" name="password2">
                        </div>

                        <div class="form-group"><label>Auth</label>
                          <select name="level_user" class="form-control">
                            <option <?php if( $data->level_user=='0'){echo "selected"; } ?> value="0">Admin</option>
                            <option <?php if( $data->level_user=='1'){echo "selected"; } ?> value="1">Dosen</option>
                            <option <?php if( $data->level_user=='2'){echo "selected"; } ?> value="2">Mahasiswa</option>
                          </select> 
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
<?php }
}
?>

<?php if (isset($dataUser)){
  foreach($dataUser as $data){
 ?>
<!-- //MODAL DELETE -->
<div class="modal fade" id="modalHapusUser<?php echo $data->username?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Confirm Delete</h4>
      </div>
      <div class='modal-body'>Kamu yakin ingin menghapus <b><?php echo $data->username ?></b> ?
      </div>
      <div class='modal-footer'>
        <form class="" action="<?php echo site_url('Admin/hapusUsername') ?>" method="post">
          <input type='hidden' value='<?php echo $data->username?>' name='username'>
          <button type='button' class='btn btn-default' data-dismiss='modal'><i class="fa fa-close"></i> Batal</button>
          <button class='btn btn-danger' aria-label='Delete'type='submit' name='hapus'><i class="fa fa-trash"></i> Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
  <?php }
  }
  ?>

  </div>
    <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
    </div>

  </section>
  <!-- right col -->

