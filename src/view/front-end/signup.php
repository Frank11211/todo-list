<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../../css/signup.css">
     
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font Aesome APi Key -->
    <script src="https://kit.fontawesome.com/5151fc54ff.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Login Container -->
    <div class="signup-container"> 

        <div class="signup-head">
            <h1>Sign Up</h1>
        </div>
        
        <div class="signup-body">

            <form action="../back-end/signupUser.php" method="POST">

           
                <div>
                    <label class="label-style">Account Username :</label><br>
                    <input type="text" id="txt-signup-username" >
                </div>

                
                
                <div>
                    <label class="label-style">Account Password :</label><br>
                    <input type="password" id="txt-signup-password">
                </div>

            </form>

        </div>

        <div class="signup-footer">
            <button type="button" class="btn btn-primary btn-lg btn-signup-style ">Sign Up </button>
            <div class="signup-login-link">
                <span> Already A User ? <a href="../../../login.php">Login Now</a></span>
            </div>
        </div>

       
         
    </div>
    
</body>
</html>