<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminLoginStyle.css"/>
    <title>Admin Login</title>
</head>
<body>

<div class="parent clearfix">
    <div class="bg-illustration">
      <div class=" logDiv" >
        <!-- <div class="loginlogoDiv"></div> -->
      <!-- <img src="img/logoGCB.jpg" alt="logo"> -->
      </div>
      

      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    
    <div class="login">
      <div class="container">
        <h1>Login to access to<br />your account</h1>
    
        <div class="login-form">
          <form action="adminLoginProcess.php" method="POST">
            <input id="email" type="email" name="email" class="input1" placeholder="E-mail Address">
            <input id="password" type="password" name="password" class="input1" placeholder="Password">

            <div class="remember-form">
              <input type="checkbox">
              <span>Remember me</span>
            </div>
            <div class="forget-pass">
              <a href="#">Forgot Password ?</a>
            </div>

            <button type="submit" >LOG-IN</button>

          </form>
        </div>
    
      </div>
      </div>
  </div>
  <script src="adminScript.js"></script>
</body>
</html>