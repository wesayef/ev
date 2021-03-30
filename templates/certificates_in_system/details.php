<div id="details_<?php echo $key; ?>" class="modal fade"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> تفاصيل أخرى عن الشهادة (<?php echo $certificates['name'];?>) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body with-padding">
        <?php echo decrypt($certificates['details']);?>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i> إغلاق النافذة</button>
      </div>
    </div>
  </div>
</div>
