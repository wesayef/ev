function calc() {
    var a =parseInt(document.querySelector("#value1").value);
    var b =parseInt(document.querySelector("#value2").value);
    var c =parseInt(document.querySelector("#value3").value);
    var un =document.querySelector("#university").value;
    var calculate;
    if (un=="PSAU") {
      calculate =((a/100*40)+ (b/100*40) + (c/100*20));

    } else if (un=="KAU") {
      calculate = ((a/100*40)+ (b/100*40) + (c/100*20));

    } else if (un=="KSU") {
      calculate = ((a/100*30)+ (b/100*60) + (c/100*10));

      
    } else if (un=="QU") {
      calculate = ((a/100*30)+ (b/100*50) + (c/100*20));

      
    } else if (un=="NU") {
      calculate = ((a/100*40)+ (b/100*50) + (c/100*10));

      
    } else if (un=="SU") {
      calculate = ((a/100*40)+ (b/100*50) + (c/100*10));

      
    } 
    document.querySelector("#result").innerHTML = calculate;
  }


