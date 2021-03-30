<?php include_once "header.php" ; ?>

<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">استشارة متخصص </a>
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
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "></h4>معلومات المتخصص</h4>
            </div>
            <!--- table ---->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary" >

                    <th>

                    </th>
                    <th>
                      الأسم
                    </th>
                    <th>
                      التخصص
                    </th>
                    <th>
                      الجامعة
                    </th>
                    <th>
                      المستوى
                    </th>
                    <th>
                      للتواصل
                    </th>
                    <th>
                      التقييم
                    </th>
                  </thead>
                  <?php foreach ($conn->getReference('volunteers/')->getSnapshot()->getValue() as $vol_key => $volunteers){ ?>
                    <tbody>
                      <tr>
                        <td>

                        </td>
                        <td>
                          <?php echo $volunteers['name'];?>
                        </td>
                        <td>
                          <?php
                          if($conn->getReference('majors_in_universities/')->getSnapshot()->numChildren() != 0)
                          {
                            foreach ($conn->getReference('majors_in_universities/')->getSnapshot()->getValue() as $major_key => $major)
                            {
                              if($volunteers['major_id'] == $major_key)
                              {
                                echo $major['name'];
                              }
                            }
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if($conn->getReference('universities/')->getSnapshot()->numChildren() != 0)
                          {
                            foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $university_key => $university)
                            {
                              if($volunteers['university_id'] == $university_key)
                              {
                                echo $university['name'];
                              }
                            }
                          }
                          ?>
                        </td>
                        <td >
                          <?php echo $volunteers['level'];?>
                        </td>
                        <td>

                          <p><a href="<?php echo $volunteers['contact'];?>" target="_blank"><?php echo $volunteers['type_contact'];?> </a></p></h5>
                        </td>
                        <td >
                          <?php
                          if($conn->getReference('ratings/')->getSnapshot()->numChildren() != 0)
                          {
                            $get_all_retings = 0;
                            $num = 0;
                            foreach ($conn->getReference('ratings/')->getSnapshot()->getValue() as $ret_key => $ret)
                            {
                              if($vol_key == $ret['volunteer_id'])
                              {
                                $get_all_retings += $ret['rating'];
                                $num++;
                              }
                            }
                            if($num != 0)
                            {
                              $this_rate = $get_all_retings / $num;
                            }
                            else
                            {
                              $this_rate = 0;
                            }
                            ?>
                            <span class="fa fa-star <?php echo (intval($this_rate) >= 1 ? "checked" : "unchcked");?>"></span>
                            <span class="fa fa-star <?php echo (intval($this_rate) >= 2 ? "checked" : "unchcked");?>"></span>
                            <span class="fa fa-star <?php echo (intval($this_rate) >= 3 ? "checked" : "unchcked");?>"></span>
                            <span class="fa fa-star <?php echo (intval($this_rate) >= 4 ? "checked" : "unchcked");?>"></span>
                            <span class="fa fa-star <?php echo (intval($this_rate) >= 5 ? "checked" : "unchcked");?>"></span>
                            <?php
                          }
                          if(!isset($_SESSION['user_id']))
                          {
                            ?>
                            <br>
                            <a href="login" class="btn btn-info btn-sm">يجب تسجيل الدخول لاتمام عملية التققيم</a>
                            <?php
                          }
                          else
                          {
                            $num_check = 0;
                            foreach ($conn->getReference('ratings/')->getSnapshot()->getValue() as $ret_key => $ret)
                            {
                              if($vol_key == $ret['volunteer_id'] AND $ret['user_id'] == decrypt($_SESSION['user_id']))
                              {
                                echo "<br>";
                                echo "<span style='color:red'>لقد قمت بالتقييم مسبقًا</span>";
                                $num_check = 1;
                                break;
                              }
                            }
                            if($num_check == 0)
                            {
                              ?>
                              <br>
                              <input type="radio" name="rat_val" class="rating_val" value="5"> ممتاز
                              <input type="radio" name="rat_val" class="rating_val" value="4"> متجاوب
                              <input type="radio" name="rat_val" class="rating_val" value="3"> جيد
                              <input type="radio" name="rat_val" class="rating_val" value="2"> غير جيد
                              <input type="radio" name="rat_val" class="rating_val" value="1"> سيئ للغاية
                              <br>
                              <button class="btn btn-success btn-sm" onclick="rating_now('<?php echo $vol_key;?>')">
                                تقييم
                              </button>
                              <?php
                            }
                          }
                          ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "footer.php" ; ?>
  
