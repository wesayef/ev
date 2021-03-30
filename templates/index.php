<?php
include_once 'header.php';
?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-12 align-self-center">
        <h3 class="text-themecolor mb-0 mt-0">الإحصائيات</h3>
      </div>
      <?php include_once 'time_now.php';?>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-dark">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('admins/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-dark">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('admins/')->getSnapshot()->numChildren(),
                            "مشرف",
                            "مشرف واحد",
                            "مشرفان",
                            "مشرفين",
                            "لا يوجد أيّ مشرف مضاف"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-dark display-6"><i class="fa fa-users"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->
              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-dark">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('users/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-dark">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('users/')->getSnapshot()->numChildren(),
                            "عضوية",
                            "عضوية واحدة",
                            "عضويتان",
                            "عضويات",
                            "لا توجد أيّ عضوية مضافة"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-dark display-6"><i class="fas fa-address-book"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->
              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-dark">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('volunteers/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-dark">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('volunteers/')->getSnapshot()->numChildren(),
                            "متطوع",
                            "متطوع واحد",
                            "متطوعان",
                            "متطوعين",
                            "لا يوجد أيّ متطوع مضاف"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-dark display-6"><i class="fas fa-address-card"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->
              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-dark" style="border-color: #963a3a !important;">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('universities/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-dark" style="color: #963a3a !important;">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('universities/')->getSnapshot()->numChildren(),
                            "جامعة",
                            "جامعة واحدة",
                            "جامعتان",
                            "جامعات",
                            "لا توجد أيّ جامعة مضافة"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-dark display-6"  style="color: #963a3a !important;"><i class="fa fa-box"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->
              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-dark" style="border-color: #963a3a !important;">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('admissions/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-dark" style="color: #963a3a !important;">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('admissions/')->getSnapshot()->numChildren(),
                            "موعد",
                            "موعد واحد",
                            "موعدان",
                            "مواعيد",
                            "لا يوجد أيّ موعد قبول مضاف"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-dark display-6"  style="color: #963a3a !important;"><i class="fas fa-warehouse"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->
              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-dark" style="border-color: #963a3a !important;">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('certificates/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-dark" style="color: #963a3a !important;">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('certificates/')->getSnapshot()->numChildren(),
                            "شهادة",
                            "شهادة واحد",
                            "شهادتان",
                            "شهادات",
                            "لا توجد أيّ شهادة مضافة"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-dark display-6"  style="color: #963a3a !important;"><i class="fas fa-hourglass"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->


              <!-- Start Column -->
              <div class="col-lg-4 col-md-6">
                <div class="card border-bottom border-warning">
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center">
                      <div>
                        <h2><?php echo $conn->getReference('apps/')->getSnapshot()->numChildren(); ?></h2>
                        <h6 class="text-warning">
                          <?php
                          echo NUM_with_Text_Just_NUM(
                            $conn->getReference('apps/')->getSnapshot()->numChildren(),
                            "تطبيق",
                            "تطبيق واحد",
                            "تطبيقات",
                            "تطبيقات",
                            "لا يوجد أيّ تطبيق مضاف"
                          );
                          ?>
                        </h6>
                      </div>
                      <div class="ml-auto">
                        <span class="text-warning display-6"><i class="fas fa-keyboard"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Column -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php custom_footer();?>
