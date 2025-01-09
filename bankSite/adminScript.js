

function adminLogin(){
   
//   var email =  document.getElementById("email");
//   var password = document.getElementById("password");

//   var f = new FormData();
//   f.append("email",email.value);
//   f.append("password",password.value);


//   var r  = new XMLHttpRequest();

//   r.onreadystatechange = function(){
//     if(r.readyState == 4){
//         var t = r.responseText;
//         if(t == "success"){
//             alert("Success");
//             window.location = "adminPanel.php";
//         }else{
//             alert(t);
//         }
//     }
//   }

//   r.open("POST","adminLoginProcess.php",true);
//   r.send(f);

window.location = "adminPanel.php";

}





const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})

function searchCustomerName(){

  var cusName =  document.getElementById("cusName").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        document.getElementById("loadTable1").innerHTML = t;
    }
  }


  r.open("GET","searchCustomerName.php?name="+cusName,true);
  r.send();

}


function searchOfficerId(){
  var officerId =  document.getElementById("oId").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4){
        var t = r.responseText;
        document.getElementById("loadTable1").innerHTML = t;
    }
  }


  r.open("GET","searchOfficerId.php?id="+officerId,true);
  r.send();

}



function findData(){
    var from = document.getElementById("fromD").value;
  var to = document.getElementById("toD").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
      document.getElementById("filterDate").innerHTML = t;
      // alert(t);
      
     
    }
  }

  r.open("GET","filterDateProcess.php?f="+from+"&t="+to,true);
  r.send();
}



function registerOfficer(){


 var brCode = document.getElementById("bcode");
 var firstName = document.getElementById("fname");
 var lastName = document.getElementById("lname");
 var mobile = document.getElementById("mobile");
 var email = document.getElementById("email");
 var username = document.getElementById("uname");
 var password = document.getElementById("password");





 var f = new FormData;
 f.append("bCode",brCode.value);
 f.append("fname",firstName.value);
 f.append("lname",lastName.value);
 f.append("mobile",mobile.value);
 f.append("email",email.value);
 f.append("un",username.value);
 f.append("password",password.value);



 var r = new XMLHttpRequest();

 r.onreadystatechange = function(){
  if(r.readyState == 4){
    var t = r.responseText;
    if(t == "success"){
      window.location.reload();
      alert("Officer Register Successfull");

    }else{
      alert(t);
    }
    
  }
 }

 r.open("POST","regiterOfficerProcess.php",true);
 r.send(f);







}



function registerCustomer(){

  var cCode = document.getElementById("code");
  var name = document.getElementById("name");
  var mobile = document.getElementById("mobile");
  var address = document.getElementById("address");


  var f = new FormData;
  f.append("code",cCode.value);
  f.append("name",name.value);
  f.append("mobile",mobile.value);
  f.append("address",address.value);


  var r = new XMLHttpRequest();

 r.onreadystatechange = function(){
  if(r.readyState == 4){
    var t = r.responseText;
    if(t == "success"){
      window.location.reload();

    }else{
      alert(t);
    }
    
  }
 }

 r.open("POST","regiterCustomerProcess.php",true);
 r.send(f);




}



function showPassword(){
  var i = document.getElementById("npi");
  var eye = document.getElementById("e1");


  if(i.type == "password"){
    i.type = "text";
    eye.className = "bi bi-eye-fill";
  }else{
    i.type = "password";
    eye.className = "bi bi-eye-slash";

  }

}


function updatePassword(){
  var password = document.getElementById("npi");

  var f = new FormData;
  f.append("pass",password.value);
 
  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
      if(t == "success"){
        window.location.reload();
        alert("Password Update Successfull");
      }else{
        alert(t);
      }
    }
  }

  r.open("POST","changeAdminPassword.php",true);
  r.send(f);
}



function recordfilterDate(email){

  var from = document.getElementById("RfromD").value;
  var to = document.getElementById("RtoD").value;


  alert(email);
  alert(from);
  alert(to);
 


  var f = new FormData;
  f.append("fDate",from);
  f.append("toDate",to);


  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4){
      var t = r.responseText;
      document.getElementById("DateFilterrecord").innerHTML = t;
      // alert(t);
      
     
    }
  }

  r.open("POST","recordsFilterDateProcess.php?e="+email,true);
  r.send(f);

}





function logout(){

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
   if(r.readyState == 4){
    var t = r.responseText;
     if(t == "success"){
 
         window.location = "adminLogin.php";           
     }else{
       alert(t);
 
     }
 
   }
  };

  r.open("GET","adminLogoutProcess.php",true);
  r.send()

  
}


var nicField = document.getElementById("code");

function selectCusRecords(nic){




  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t  = r.responseText;

      var obj = JSON.parse(t);

      // alert(obj["nic"]);
      // alert("harii"); 
// window.location.reload();
      var nic = obj["nic"];
      var name = obj["name"];
      var mobile = obj["mobile"];
      var address = obj["address"];


      document.getElementById("code").value = nic; 
      document.getElementById("name").value = name; 
      document.getElementById("mobile").value = mobile; 
      document.getElementById("address").value = address;
      
      document.getElementById("cusUpdate").disabled = false;
      document.getElementById("cusRegistrationBtn").disabled = true;
      document.getElementById("code").disabled = true;




    }
  }

  r.open("GET","selectCusRecord.php?nic="+nic,true);
  r.send();

}



function updateCustomer(){

 var nic = document.getElementById("code");
 var name = document.getElementById("name");
 var mobile = document.getElementById("mobile");
 var address = document.getElementById("address");

//  alert(nic.value);
//  alert(name.value);
//  alert(mobile.value);
//  alert(address.value);



 var f = new FormData();
 f.append("nic",nic.value);
 f.append("name",name.value);
 f.append("mobile",mobile.value);
 f.append("address",address.value);



 var r = new XMLHttpRequest();
 r.onreadystatechange = function(){
  if(r.readyState == 4){
    var t = r.responseText;

    if(t == "success"){
      window.location.reload();
    }else{
      alert(t);
    }
  }
 }

 r.open("POST","updateCustomerDetailsProcess.php",true);
 r.send(f);





}



function selectOfficerRecord(email){

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
    if(r.readyState == 4 && r.status == 200){
      var t  = r.responseText;

      var obj = JSON.parse(t);

      // alert(obj["nic"]);
      // alert("harii"); 
// window.location.reload();
      var email = obj["email"];
      var fname = obj["first_name"];
      var lname = obj["last_name"];
      var bCode = obj["b_code"];
      var password = obj["password"];
      var mobile = obj["mobile"];
      var username = obj["username"];



      document.getElementById("email").value = email; 
      document.getElementById("fname").value = fname; 
      document.getElementById("lname").value = lname; 
      document.getElementById("mobile").value = mobile;
      document.getElementById("bcode").value = bCode;
      document.getElementById("uname").value = username;
      document.getElementById("password").value = password;

      
      document.getElementById("offUpdate").disabled = false;
      document.getElementById("offregisterBtn").disabled = true;
      document.getElementById("email").disabled = true;




    }
  }

  r.open("GET","selectOfficerRecord.php?email="+email,true);
  r.send();


}


function UpdateOfficer(){

  var email = document.getElementById("email");
 var fname = document.getElementById("fname");
 var lname = document.getElementById("lname");
 var mobile = document.getElementById("mobile");
 var bcode = document.getElementById("bcode");
 var uname = document.getElementById("uname");
 var password = document.getElementById("password");


 var f = new FormData();
 f.append("email",email.value);
 f.append("fname",fname.value);
 f.append("lname",lname.value);
 f.append("mobile",mobile.value);
 f.append("bcode",bcode.value);
 f.append("uname",uname.value);
 f.append("password",password.value);



 var r = new XMLHttpRequest();
 r.onreadystatechange = function(){
  if(r.readyState == 4){
    var t = r.responseText;

    if(t == "success"){
      window.location.reload();
    }else{
      alert(t);
    }
  }
 }

 r.open("POST","updateOfficerDetailsProcess.php",true);
 r.send(f);


}


// function clearTxtField(){

//   alert("ok");

//   document.getElementById("RfromD").value = "0";

// }


function DownloadBtn(){
  var body = document.body.innerHTML;
  var table = document.getElementById("loadTable1").innerHTML;
  document.body.innerHTML = table;
  window.print();
  document.body.innerHTML = body;
}