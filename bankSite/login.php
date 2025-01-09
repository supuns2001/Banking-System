
<?php

require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyle.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <title>Officer Login</title>
</head>

<body>

    <!-- partial:index.partial.html -->
    <div id="bg"></div>

    <div>
        <div class="rowBox">

            <div class="lgogmainBox">
                <div class="logoBox">
                    <!-- <div class="logoImg"></div> -->
                </div>
            </div>

            <div class="formBox">
                <form>
                    <div class="form-field">
                        <input id="uname" type="email" placeholder="Username"  />
                    </div>

                    <div class="form-field">
                        <input id="password" type="password" placeholder="Password"  /> 
                        <!-- required -->
                    </div>

                    <div class="form-field">
                        <button class="btn" type="submit" onclick="login();">Log in</button>
                    </div>
                </form>
            </div>

        </div>
    </div>






    <!-- partial -->


    
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <script>
            $(window).on("load",function(){
                $(".loader-wrapper").fadeOut("slow");
            });
        </script>


<script src="script.js"></script>

</body>

</html>