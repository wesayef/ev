$j=jQuery.noConflict();
$j(document).ready(function(){
 $j('.select2').select2({width:'100%'});

$j('#get_city').change(function () {
  var e = document.getElementById("get_city");
  var option = "";
  axios.get('https://dkakeen.sa/wp-content/plugins/custom_fun/js_request.php', {
      headers: { 
         appsends: $j("input.id_now").val(),
        'Access-Control-Allow-Origin' : '*',
        'Access-Control-Allow-Methods' : 'GET,PUT,POST,DELETE,PATCH,OPTIONS',
    },
    params: { 
      'city': e.options[e.selectedIndex].value
    }
  })
  .then(function (response) {
    console.log(response);
                  console.log(response);
      for (var key in response.data) {
          if (response.data.hasOwnProperty(key)) {
          option += '<option value="'+response.data[key].id+'">'+response.data[key].name+'</option>';
        }
      }
    $j('.put_all_cities').html(option);
  })
});
});
function get_coupon(event) {
  axios.get('https://dkakeen.sa/wp-content/plugins/custom_fun/js_request.php', {
       headers: {
     appsends: $j("input.id_now").val(),
        'Access-Control-Allow-Origin' : '*',
        'Access-Control-Allow-Methods' : 'GET,PUT,POST,DELETE,PATCH,OPTIONS',
  },
    params: { 
      'coupon': event.target.value,
      'pkg': $j('#pkg_coupon').val()
    }
  })
  .then(function (response) {
      // if(response.status == 200){
    $j('.put_check').html(response.data);
    console.log(event.target.value);
    console.log($j('#pkg_coupon').val());
    console.log(response);
    //   }
  })
}


