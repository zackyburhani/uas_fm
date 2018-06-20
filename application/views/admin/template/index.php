
  <!-- Main content -->
    <section class="content">
    	<!--START CONTENT LABEL-->
    	<div class="callout callout-info">
    		<div class="row">
    			<div class="form-group">
					<div class="col-md-5">
							<h4 style="margin-top: 20px;">Selamat Datang <i><?php echo $username ?></i> !</h4>
						</div>
				</div>
    		</div>
         </div>
         <!--EDN CONTENT LABEL-->

      <?php if($level_user == 0){ ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $totalDosen ?></h3>

              <p>Data Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php blink('Admin/Dosen') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $totalPertanyaan ?></h3>

              <p>Data Pertanyaan</p>
            </div>
            <div class="icon">
              <i class="fa fa-book fa-fw"></i>
            </div>
            <a href="<?php blink('Admin/Pertanyaan') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

         <div class="col-md-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalUser ?></h3>

              <p>Data User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user fa-fw"></i>
            </div>
            <a href="<?php blink('Admin/user') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <?php } ?>

      <?php if($level_user == 2) { ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $totalPertanyaan ?></h3>

              <p>Data Pertanyaan</p>
            </div>
            <div class="icon">
              <i class="fa fa-book fa-fw"></i>
            </div>
            <a href="<?php blink('Mahasiswa') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php } ?>

    </section>
    <!-- right col -->