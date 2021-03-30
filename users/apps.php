<?php include_once "header.php" ; ?>

<div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">تطبيقات مساعدة لك</a>
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
          <?php  foreach ($conn->getReference('apps/')->getSnapshot()->getValue() as $key => $apps){ ?>

          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats"  >
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <img src="<?php echo $apps['logo'];?>" height="60" width="60" alt="">
                  </div>
                  <h3 class="card-title" ><?php echo $apps['name'];?></h3>
                  <br>
                  <div style="color:#3C4858 !important; " >
                  <p class="card-category"  > <?php echo decrypt($apps['describe']); ?></p>
                </div>
                </div>
                <div class="card-footer" >
                  <div class="stats">
                  <?php foreach (explode(',',$apps['OS']) as $OS) { ?>
                   
                    <?php
                    if($OS == 'Android')
                    {
                      echo ' <i class="material-icons ">android</i>' ;
                    }
                    else if($OS == 'IOS')
                    {
                      echo '<i class="material-icons ">phone_iphone</i>';
                    }
                    else if($OS == 'MacOS')
                    {
                      echo '<i class="material-icons ">tablet_mac</i>';
                    }
                    else if($OS == 'Web browser')
                    {
                      echo '<i class="material-icons ">laptop_mac</i>';
                    }

                    ?>                    
                    <?php } ?>
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
