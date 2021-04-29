<?php include_once "header.php" ; ?>

<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">حساب النسبة الموزونة</a>
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
  <div class="content" >
    <div class="container-fluid">
      <div class="row" >
        <div class="col-md-10">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">حساب النسبة الموزونة</h4>
              <p class="card-category">2020-2021</p>
            </div>
            <div class="card-body" >
              <div class="row" >
                <div class="col-md-5">
                  <div class="form-group"  >
                    <label class="bmd-label-floating">اختر الجامعة </label>
                    <select name="university_id" id="get_cal" class="form-control select2" >
                      <?php foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $uni_key => $uni){ ?>
                        <option value="<?php echo $uni_key;?>"> <?php echo $uni['name'].' - '.$uni['location'];?>
                        <?php }?>
                      </option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating"> </label>
                    </div>
                  </div>
                
                <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating"> </label>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <input type="text" class="form-control" id="scholastic_chievement" >
                      <label class="bmd-label-floating" for="scholastic_chievement">درجة التحصيلي</label>
                    </div>
                  </div>
                <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating"> </label>
                    </div>
                  </div>
                  <div class="col-md-5">
                  <div class="form-group">
                    <input  type="text" class="form-control"  id="general_aptitude" >
                    <label class="bmd-label-floating" for="general_aptitude">درجة القدرات</label>
                  </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating"> </label>
                    </div>
                  </div>
                  <div class="col-md-5">
                  <div class="form-group">
                    <input type="text" class="form-control"  id="high_school" >
                    <label class="bmd-label-floating" for="high_school">الثانوية العامة</label>
                  </div>
                </div>
                </div>
              </div>

              
              <br>
              <div class="clearfix"  align="center">
                <button type="button" onclick="calc()" class="btn btn-primary" >حساب</button>


                <div class="form-group">
                  <div class="col-sm-10">
                    <span class="form-control" id="result" placeholder="النسبة الموزونة"></span>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "footer.php" ; ?>
