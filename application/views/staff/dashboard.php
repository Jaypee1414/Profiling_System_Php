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
              if(isset($leave))
              {
                echo sizeof($leave);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Leaves</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-log-out"></i>
            </div>
            
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php 
              if(isset($certificate))
              {
                echo sizeof($certificate);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Certificates</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-document"></i>
            </div>
            
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php 
              if(isset($credentials))
              {
                echo sizeof($credentials);
              }
              else{
                echo 0;
              }
              ?></h3>

              <p>Credentials</p>
            </div>
            <div class="icon">
              <i class="ionicons ion-android-list"></i>
            </div>
            
          </div>
        </div>


        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
