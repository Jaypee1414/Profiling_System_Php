  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php 
              if(isset($department))
              {
                echo sizeof($department);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Departments</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-social-buffer"></i>
            </div>
            <a href="<?php echo base_url(); ?>manage-department" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php 
              if(isset($staff))
              {
                echo sizeof($staff);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Staff</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-contacts"></i>
            </div>
            <a href="<?php echo base_url(); ?>manage-staff" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php 
              if(isset($leave))
              {
                echo sizeof($leave);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Leave Requests</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>
            <a href="<?php echo base_url(); ?>approve-leave" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>₱<?php 
              if(isset($salary))
              {
                foreach ($salary as $s) {
                  echo $s['total'];
                }
                
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Salary Paid</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-social-usd"></i>
            </div>
            <a href="<?php echo base_url(); ?>manage-salary" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <section class="content">
      <div class="row">

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Ferndale Colleges Employee</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Department</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="img-circle" width="50px" alt="User Image"></td>
                        <td><?php echo $cnt['department_name']; ?></td>
                        <td><?php echo $cnt['gender']; ?></td>
                        <td><?php echo $cnt['mobile']; ?></td>
                        <td><?php echo $cnt['email']; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>Employee-info/<?php echo $cnt['id']; ?>" class="btn btn-success">View</a>
                        </td>
                      </tr>
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



