<?php include_once "header.php" ; ?> 
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">الشهادات المهنية</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <form class="navbar-form"> 
        </form>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        
        <?php foreach ($conn->getReference('certificates/')->getSnapshot()->getValue() as $key => $certificates){ ?>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <img src="<?php echo $certificates['logo']; ?>" height="130" width="160" alt="">
            </div>
            <div class="card-body">
              <h4 class="card-title"><?php echo $certificates['name']; ?></h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> </span> <?php echo decrypt($certificates['describe']); ?> </p>
              </div>
              <div class="card-footer">
                <div class="stats">
                //  <i class="material-icons">access_time</i> <?php echo convert_date($certificates['updated_at'])."<br>".datetime_to_string_ago($certificates['updated_at']); ?>
                </div>
              </div>
            </div>
          </div>
           <?php } ?>
        </div>
      </div>
    </div>
  </div>
  
  
  <?php include_once "footer.php" ; ?> 
