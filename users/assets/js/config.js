function rating_now(id)
{
  var val = $("input[name='rat_val']:checked").val();
  axios.get('http://localhost/ev/js', {
    params: {
      'rating':val,
      'volunteer_id':id
    }
  })
  .then(function (response) {
    swal("شكرًا لك", "تمّ التقييم بنجاح", "success");
    window.location.href = "http://localhost/ev/volunteers";
  });
}

function calc() {
  
    var e = document.getElementById("get_cal");
  axios.get('http://localhost/ev/js', {
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

  });
}
// function calc() {
//   var a =parseInt(document.querySelector("#value1").value);
//   var b =parseInt(document.querySelector("#value2").value);
//   var c =parseInt(document.querySelector("#value3").value);
//   var un =document.querySelector("#university").value;
//   var calculate;
//   if (un=="PSAU") {
//     calculate =((a/100*40)+ (b/100*40) + (c/100*20));

//   } else if (un=="KAU") {
//     calculate = ((a/100*40)+ (b/100*40) + (c/100*20));

//   } else if (un=="KSU") {
//     calculate = ((a/100*30)+ (b/100*60) + (c/100*10));

    
//   } else if (un=="QU") {
//     calculate = ((a/100*30)+ (b/100*50) + (c/100*20));

    
//   } else if (un=="NU") {
//     calculate = ((a/100*40)+ (b/100*50) + (c/100*10));

    
//   } else if (un=="SU") {
//     calculate = ((a/100*40)+ (b/100*50) + (c/100*10));

    
//   } 
//   document.querySelector("#result").innerHTML = calculate;
// }



$(document).ready(function(){
  $(".nav-item").click(function(){
    $(this).attr("class","nav-item active");
  });
});