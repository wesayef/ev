<a data-toggle="modal" role="button" href="#add_new_major" class="btn btn-right-icon btn-success"><i class="fa fa-plus"></i> إضافة تخصص جديد </a>
<div id="add_new_major" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> إضافة تخصص جديد </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <!-- Form inside modal -->
      <form method="post" class="form-horizontal" role="form">
        <div class="modal-body with-padding">


          <div class="form-group row">
            <label class="col-sm-2 col-form-label">اسم الجامعة</label>
            <div class="col-sm-10">
              <select name="university_id" class="form-control select2">
                <?php foreach ($conn->getReference('universities/')->getSnapshot()->getValue() as $uni_key => $uni){ ?>
                  <option value="<?php echo $uni_key;?>"> <?php echo $uni['name'].' - '.$uni['location'];?>
                  <?php }?>
              </select>
            </div>
          </div>

          <table class='table table-bordered tables_mobile add_major_items' id="tb2">
            <thead>
              <tr>
                <th class='text-center'>#</th>
                <th class='text-center'>التخصص</th>
                <th class='text-center'>الوصف</th>
                <th class="text-center">الإجـراءات</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for($i=1; $i < 4 ; $i++)
              {
                ?>
                <tr>
                  <td data-title="#" class="text-center"></td>
                  <td data-title="التخصص" class="text-center">
                    <input type="text" class="TextBox form-control" name="major_name[]">
                  </td>
                  <td data-title="الوصف" class="text-center">
                    <textarea class="form-control" name="major_describe[]"></textarea>
                  </td>
                    <td data-title="الإجـراءات" class="text-center">
                      <button type="button" class="btn btn-xs btn-danger remove_major_items"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                <?php  } ?>
              </tbody>
              <tr>
                <th class="text-center" colspan='4'>
                  <button type='button' class='add_major btn btn-xs btn-dark'> <i class='fa fa-plus'></i> </button>
                </th>
              </tr>
            </table>

          </div>
          <div class="modal-footer">
            <button type="submit" name="add_new_major" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة</button>
            <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
          </div>
        </form>
      </div>
    </div>
  </div>
