<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Font Aesome APi Key -->
    <script src="https://kit.fontawesome.com/5151fc54ff.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Login Container -->
    <div class="login_cont shadow-lg p-3 mb-5 rounded"> 

        <img src="img/todoLogo.png" alt="testing" >

        <div class="input-icons">
            <!-- Tittle -->
            <h2  class="login_input_mdl">MyWare - TO DO LIST</h2>

            <div class="alert alert-danger hide" id="error-login" role="alert"></div>

            <!-- Username -->
            <div class="login_input_mdl">
                <i class="fa-solid fa-user icon"></i>
                <input type="text" class="form-control input-field" placeholder="Username" aria-label="Username" id="login-username">
            </div>
            
            <!-- Passwod  -->
            <div  class="login_input_mdl">
                <i class="fa-solid fa-key icon"></i>
                <input type="password" class="form-control input-field" placeholder="Password" aria-label="Password" id="login-password">

                <span class="recover-pass-link" id="pass-rec-link"> <a href="#">Forget Password ?</a></span> 
            </div>
            
            <!-- Button Group get_space-->
            <div class="login-footer">
                <button type="button" class="btn btn-primary" id="login-submit">Login</button>
                <span> No account ? <a href="src/view/front-end/signup.php"> Sign Up Now</a></span> 
            </div>
            
        </div>
    </div>
    
    <script type="text/javascript">
        
        $(document).ready(function(){
            // Future feature
            $('#pass-rec-link').on('click', function(){
                alert("Sorry, current feature under maintenance");
            });

            $("#login-submit").on("click", function(){
                
                //Input
                var loginUsername = $('#login-username').val();
                var loginPassword = $('#login-password').val();
 
                //Error Modal 
                var errModal = $("#error-login")

                var userObj = {
                    username : loginUsername,
                    password : loginPassword
                }

                $.ajax({
                    url : "src/view/back-end/loginValidate.php",
                    type : "POST",
                    dataType : "json",
                    data :JSON.stringify(userObj), // Object is an associate array 
                    contentType: "application/json; charset=utf-8", // Specify content type
                    success: function(response){
                        if(response.success){
                            // direct it to homepage.
                            window.location.replace("src/view/front-end/home.php");

                        }else{
                            errModal.removeClass("hide").text(response.message );
                        }
                    },
                    error : function(xhr, jsonOption, thrownError){
                        alert("Error: " + xhr );
                        console.log(thrownError);
                    }
                })
           
            });
            
        })
        
    </script>
</body>
</html>