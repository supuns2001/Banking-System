

function login(){
    var uname = document.getElementById("uname");
    var password = document.getElementById("password");

    // alert(uname.value);
    // alert(password.value);


    var f = new FormData();
    f.append("un",uname.value);
    f.append("password",password.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                window.location = "index.php";
            }else{

                alert(t);

            }
            
        }
    }

    r.open("POST","loginProcess.php",true);
    r.send(f);


}



function savedata(){



    var location = document.getElementById('location').innerHTML;

    var accuracy = document.getElementById('accuracy').innerHTML;
    var date = document.getElementById('date').innerHTML;
    var Time = document.getElementById('Time').innerHTML;
    var amount = document.getElementById('amount').value;
    var customerId = document.getElementById("result2").innerHTML

    // alert(location);
    // alert(accuracy);
    // alert(date);
    // alert(Time);
    // alert(customerId); 


    var f = new FormData();
    f.append("loc",location);
    f.append("accu",accuracy);
    f.append("date",date);
    f.append("time",Time);
    f.append("amount",amount);
    f.append("cuID",customerId);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Valid qr"){
                window.location.reload();
            }else{
                alert(t);
            }
            
        }
    }

    r.open("POST","dataAddProcess.php",true);
    r.send(f);





}

var r_num;

function deleteRecorsNum(id){

    r_num = id;

}



function deleteRecors(){
    // alert("ok");
    // alert(r_num);


    var r = new XMLHttpRequest();


    r.onreadystatechange = function(){
        if(r.readyState == 4){
          var t = r.responseText;
          if(t == "success"){
            // alert("success");
            window.location.reload();
          }else{
            alert(t);
          }
          
        }
      }
    
      r.open("GET","deleteCusRecordProcess.php?id="+r_num,true);
      r.send();

}