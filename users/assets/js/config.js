function rating_now(id)
{
  var val = $("input[name='rat_val']:checked").val();
  axios.get('../js', {
    params: {
      'rating':val,
      'volunteer_id':id
    }
  })
  .then(function (response) {
    swal("شكرًا لك", "تمّ التقييم بنجاح", "success");
    window.location.href = "../volunteers";
  });
}

function calc() {
  
    var e = document.getElementById("get_cal");
  axios.get('../js', {
    params: {
      'uni_key':e.options[e.selectedIndex].value
    }
  })
  .then(function (response) {
    var a =parseInt($("#high_school").val());
  var b =parseInt($("#general_aptitude").val());
   var c =parseInt($("#scholastic_chievement").val());

   calculate =((a/100*response.data.high_school)+ (b/100*response.data.general_aptitude) + (c/100*response.data.scholastic_chievement));
   // $('#result').html(calculate);
    swal("النسبة الموزونة", calculate+"%", "success");
    window.location.href = "../cal";

  });
}


$(document).ready(function(){
  $(".nav-item").click(function(){
    $(this).attr("class","nav-item active");
  });
});
