<div id="edit_major_<?php echo $major_key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> تحرير التخصص (<?php echo $major['name'];?>) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
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

            <table class='table table-bordered tables_mobile'>
              <thead>
                <tr>
                  <th class='text-center'>التخصص</th>
                  <th class='text-center'>الوصف</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-title="التخصص" class="text-center">
                    <input type="text" class="TextBox form-control" name="major_name" value="<?php echo $major['name'];?>">
                  </td>
                  <td data-title="الوصف" class="text-center">
                    <textarea class="form-control" name="major_describe"><<?php echo $major['describe'];?></textarea>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="modal-footer">
            <button type="submit" name="save_changes_major" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التغييرات</button>
            <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
            <input type="hidden" name="id" value="<?php echo $major_key; ?>">
          </div>
        </form>
      </div>
    </div>
  </div>
