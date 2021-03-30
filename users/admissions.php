<?php include_once "header.php" ; ?>

<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;"><h3>مواعيد التسجيل بالجامعات </h3></a>
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
            <div class="col-md-12">
              <!--start-->
              <div class="col-md-12">
                <div class="card card-plain">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0"> مواعيد التسجيل في الجامعات السعودية</h4>
                    <p class="card-category"> 2021</p>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="text-primary">
                          <th>
                            
                          </th>
                          <th>
                            اسم الجامعة
                          </th>
                          <th>
                            البرنامج
                          </th>
                          <th>
                            يفتح التسجيل
                          </th>
                          <th>
                            يغلق التسجيل
                          </th>
                        </thead>
                        <?php foreach ($conn->getReference('admissions/')->getSnapshot()->getValue() as $key => $admissions){ ?>
                        <tbody>
                          <tr>
                            <td>
                              
                            </td>
                            <td>
                            <?php
                        if($conn->getReference('universities/')->getSnapshot()->numChildren() != 0)
                        {
                          foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $university_key => $university)
                          {
                            if($admissions['university_id'] == $university_key)
                            {
                              echo $university['name'];
                            }
                          }
                        }
                        ?>
                            </td>
                            <td>
                              <?php echo $admissions['name'];?> 
                            </td>
                            <td>
                              <?php echo '<span class="badge badge-success">'.$admissions['start_date'].'</span>'; ?>
                            </td>
                            <td>
                              <?php echo '<span class="badge badge-danger">'.$admissions['end_date'].'</span>'; ?>
                            </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                          </div>        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



  <?php include_once "footer.php" ; ?>