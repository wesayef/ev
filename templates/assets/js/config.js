
$(".NumBox").on("keypress", function(event) {
  var englishAlphabetAndWhiteSpace = /[0-9-]/g;
  var key = String.fromCharCode(event.which);
  if (englishAlphabetAndWhiteSpace.test(key)) {
    return true;
  }
  return false;
});

// $('.NumBox').on("paste",function(e)
// {
//   e.preventDefault();
// });
// window.addEventListener('contextmenu', function (e) {
//   e.preventDefault();
// }, false);
$('document').ready(function(){


  $('textarea.form-control').each(function(){
    $(this).val($(this).val().trim());
  });

  $("#select_all").change(function(){
    $(".select_all").prop("checked", $(this).prop("checked"));
  });
  $(".add_select_all").change(function(){
    $(".select_all").prop("checked", $(this).prop("checked"));
  });
  $('.select2').select2();
 $('.selectpicker').selectpicker();
  //$('.date-time').datetimepicker();


});


$('.add_major').click(function() {
  var data = $(".add_major_items tr:eq(1)").clone(true).appendTo(".add_major_items");
  data.find("input").val('');
  data.find("textarea").val('');
});
$('.remove_major_items').click(function() {
  var trIndex = $(this).closest("tr").index();
  if(trIndex>0) {
    $(this).closest("tr").remove();
  }
});

$('#get_uni_major1').change(function() {
  var e = document.getElementById("get_uni_major1");
  axios.get('http://localhost/ev/js_request', {
    params: {
      'uni_key':e.options[e.selectedIndex].value
    }
  })
  .then(function (response) {
    $('#put_uni_major1').html(response.data);
  });
});
$('#get_uni_major2').change(function() {
  var e = document.getElementById("get_uni_major2");
  axios.get('http://localhost/ev/js_request', {
    params: {
      'uni_key':e.options[e.selectedIndex].value
    }
  })
  .then(function (response) {
    $('#put_uni_major2').html(response.data);
  });
});
$('.add_property').click(function() {
  var data = $(".add_product_property tr:eq(1)").clone(true).appendTo(".add_product_property");
  data.find("input").val('');
});
$('.remove_property').click(function() {
  var trIndex = $(this).closest("tr").index();
  if(trIndex>0) {
    $(this).closest("tr").remove();
  }
});


                $(document).ready(function() {
                  // Basic
                  $('.dropify').dropify();

                  // Translated
                  $('.dropify-fr').dropify({
                    messages: {
                      default: 'Glissez-déposez un fichier ici ou cliquez',
                      replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                      remove: 'Supprimer',
                      error: 'Désolé, le fichier trop volumineux'
                    }
                  });

                  // Used events
                  var drEvent = $('#input-file-events').dropify();

                  drEvent.on('dropify.beforeClear', function(event, element) {
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                  });

                  drEvent.on('dropify.afterClear', function(event, element) {
                    alert('File deleted');
                  });

                  drEvent.on('dropify.errors', function(event, element) {
                    console.log('Has Errors');
                  });

                  var drDestroy = $('#input-file-to-destroy').dropify();
                  drDestroy = drDestroy.data('dropify')
                  $('#toggleDropify').on('click', function(e) {
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                      drDestroy.destroy();
                    } else {
                      drDestroy.init();
                    }
                  })
                });
                $('.dates').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                    });
                // $('.date_time').daterangepicker({
                //     timePicker: true,
                //     timePickerIncrement: 1,
                //     timePicker24Hour: true,
                //     timePickerSeconds: true,
                //     locale: {
                //         format: 'YYYY-MM-DD h:mm:ss'
                //     }
                // });
                // $('.dates').daterangepicker({
                //     timePicker: true,
                //     timePickerIncrement: 1,
                //     timePicker24Hour: true,
                //     timePickerSeconds: true,
                //     locale: {
                //         format: 'YYYY-MM-DD'
                //     }
                // });
