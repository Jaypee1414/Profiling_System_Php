<style>
  .floatybox {
     display: inline-block;
     width: 123px;
}
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Employee Management</a></li>
        <li class="active">Edit Employee</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

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

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Employee</h3>
            </div>
            <!-- /.box-header -->

            <?php if(isset($content)): ?>
              <?php foreach($content as $cnt): ?>
                  <!-- form start -->
                  <?php echo form_open_multipart('Staff/update');?>
                    <div class="box-body">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="hidden" name="txtid" value="<?php echo $cnt['id'] ?>" class="form-control" placeholder="Full Name" readonly>
                          <input type="text" name="txtname" value="<?php echo $cnt['staff_name'] ?>" class="form-control" placeholder="Full Name" readonly disabled>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Department</label>
                            <?php
                            if(isset($department))
                            {
                              foreach($department as $cnt1)
                              {
                                if($cnt1['id']==$cnt['department_id'])
                                { ?>
                                <input value="<?php echo $cnt1['department_name'] ?>" 
                                class="form-control" 
                                readonly>
                               <?php }
                              }
                            } 
                            ?>

                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control" name="slcgender" readonly>
                            <option value="" >Select</option>
                            <?php
                            if($cnt['gender']=='Male')
                            {
                              print '<option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>';
                            }
                            elseif($cnt['gender']=='Femle')
                            {
                              print '<option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                    <option value="Others">Others</option>';
                            }
                            elseif($cnt['gender']=='Others')
                            {
                              print '<option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others" selected>Others</option>';
                            }
                            else{
                              print '<option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="txtemail" value="<?php echo $cnt['email'] ?>" class="form-control" placeholder="Email" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile</label>
                          <input type="text" name="txtmobile" value="<?php echo $cnt['mobile'] ?>" class="form-control" placeholder="Mobile" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Photo</label>
                          <input type="file" name="filephoto" value="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="date" name="txtdob" value="<?php echo $cnt['dob'] ?>" class="form-control" placeholder="DOB" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date of Joining</label>
                          <input type="date" name="txtdoj" value="<?php echo $cnt['doj'] ?>" class="form-control" placeholder="DOJ" readonly>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>City</label>
                          <input type="text" name="txtcity" value="<?php echo $cnt['city'] ?>" class="form-control" placeholder="City" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Province</label>
                          <input type="text" name="txtstate" value="<?php echo $cnt['state'] ?>" class="form-control" placeholder="Province" readonly>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Country</label>
                            <?php
                              if(isset($country))
                              {
                                foreach ($country as $cnt1)
                                {
                                  if($cnt1['country_name']==$cnt['country'])
                                  {?>
                                <input value="<?php echo $cnt1['country_name'] ?>" 
                                class="form-control" 
                                readonly>
                                  
                                <?php }
                              }
                            }
                            ?>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Address</label>
                          <textarea readonly class="form-control" name="txtaddress"><?php echo $cnt['address'] ?></textarea>
                        </div>
                      </div>
                      
                    </div>
                    <!-- /.box-body -->
                  </form>
                <?php endforeach; ?>
            <?php endif; ?>
              <hr/>
            <div class="box-header with-border">
              <h3 class="box-title">Employee Certificate</h3>
            </div>
        <section class="content">
            <div div class="row">
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
          <div class="box box-info-secondary">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Certificate</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if(isset($certificate)):
                  $i=1; 
                  foreach($certificate as $cnt): 
                ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $cnt['name']; ?></td>
                      <td>
                        <a href="<?php echo base_url();?>Download-Credentials/<?php echo $cnt['certificate'];?>" class="btn btn-success">Download</a>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <section class="content">
      <div class="row">
      <hr/>
            <div class="box-header with-border">
              <h3 class="box-title">Employee Credentials</h3>
            </div>
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
          <div class="box box-info-white">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Credentials</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if(isset($credential)):
                  $i=1; 
                  foreach($credential as $cnt): 
                ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $cnt['name']; ?></td>
                      <td>
                        <a href="<?php echo base_url();?>Download-Credentials/<?php echo $cnt['credentials'];?>" class="btn btn-success">Download</a>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </section>
  <!-- /.content-wrapper -->