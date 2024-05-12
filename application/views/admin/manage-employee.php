<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pre-Register
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Employee Register</a></li>
        <li class="active">Register</li>
      </ol>
    </section>

    <!-- Main content -->
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
              <h3 class="box-title">Employee Register</h3>
            </div>
            <?php echo form_open_multipart('staff/approve_employee');?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Password</th>
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
                        <td><input type="text"  name="txtid" placeholder="<?php echo $i; ?>" value="<?php $cnt['user_id'];?>" style="border: none; width: 25px;"></td>
                        <td><input type="text" name="txtempid" value="<?php echo $cnt['EmployeeID']; ?>" style="border: none;"></td>
                        <td><input type="text" name="txtname" value="<?php echo $cnt['staff_name']; ?>" style="border: none;"></td>
                        <td><input type="text" name="txtmobile" value="<?php echo $cnt['mobile']; ?>" style="border: none;"></td>
                        <td><input type="text" name="txtemail" value="<?php echo $cnt['email']; ?>" style="border: none;"></td>
                        <td><input type="text" name="txtpassword" value="<?php echo $cnt['password']; ?>" style="border: none;"></td>
                        <td>
                          <Button class="btn btn-success">Approve</Button>
                          <a href="<?php echo base_url(); ?>delete-employee/<?php echo $cnt['user_id']; ?>" class="btn btn-danger">Delete</a>
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
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    