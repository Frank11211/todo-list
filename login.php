<?php 
    include "src/database/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
     
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font Aesome APi Key -->
    <script src="https://kit.fontawesome.com/5151fc54ff.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Container -->
    <div class="login_cont shadow-lg p-3 mb-5 rounded"> 

        <!-- Logo -->
        <img src="img/todoLogo.png" alt="testing" >

        <div class="input-icons">
            <!-- Tittle -->
            <h2  class="login_input_mdl">MyWare - TO DO LIST</h2> <!-- Title -->
            
            <!-- submit to loginValidate -->
            <form action="src/view/back-end/loginValidate.php" method="post">

                <!-- Username -->
                <div class="login_input_mdl">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" class="form-control input-field" placeholder="Username" aria-label="Username" id="login_username">
                </div>
                
                <!-- Passwod  -->
                <div  class="login_input_mdl">
                    <i class="fa-solid fa-key icon"></i>
                    <input type="password" class="form-control input-field" placeholder="Password" aria-label="Username" id="login_password">
                </div>
                
                <!-- Button Group -->
                <div  class=" get_space">
                    <button type="button" class="btn btn-link"><a href="#"> Forget Password ?</a></button>
                    <button type="button" class="btn btn-primary" id="login_submit">login</button>
                </div>

            </form>
            
        </div>
    </div>
    
</body>
</html>