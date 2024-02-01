<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../../css/signup.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
     
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
            <div class="alert alert-warning even-line" role="alert">
                Your password must be have at least:-
                <ul>
                    <li>MIN <b>6</b> characters long.</li>
                    <li>MIN <b>1</b> number or symbol.</li>
                    <li>MIN <b>1</b> uppercase & <b>1</b> lowercase character.</li>
                </ul>
            </div>
        </div>
        
        <div class="signup-body">

            <div>
                <label class="label-style">Account Username :</label><br>
                <input type="text" id="txt-signup-username" >
            </div>

            <div class="alert alert-danger hide" id="error-signup-username" role="alert"></div>
            
            <div>
                <label class="label-style">Account Password :</label><br>
                <input type="password" id="txt-signup-password">
            </div>     
            
            <div class="alert alert-danger hide" id="error-signup-password" role="alert"></div>

        </div>

        <div class="signup-footer">
            <button type="submit" value="submit" id="submitBtn" class="btn btn-primary btn-lg btn-signup-style ">Sign Up </button>
            <div class="signup-login-link">
                <span> Already A User ? <a href="../../../login.php">Login Now</a></span>
            </div>
        </div>
         
    </div>

    <script type="text/javascript">
    
        $(document).ready(function(){

            $("#submitBtn").on('click', function(){
                var errorList = [];
                
                var txtSignUpName = $("#txt-signup-username").val();
                var txtSignUpPass = $("#txt-signup-password").val();

                if (txtSignUpName === null || !/^[a-zA-Z0-9][a-zA-Z0-9\s]*$/.test(txtSignUpName)) {
                    $("#error-signup-username").css("display", "block").text("Name must not be null and should not contain special characters.");
                    return;
                }else{
                    $("#error-signup-username").css("display", "none");
                }

                // Check each condition and add errors to the list
                if (!/^.{6,}$/.test(txtSignUpPass)) {
                    errorList.push("Password must be at least 6 characters long.");
                }

                if (!/\d|[^A-Za-z0-9]/.test(txtSignUpPass)) {
                    errorList.push("Password must contain at least 1 number or symbol.");
                }

                if (!/[A-Z]/.test(txtSignUpPass) || !/[a-z]/.test(txtSignUpPass)) {
                    errorList.push("Password must contain at least 1 uppercase and 1 lowercase character.");
                }
                
                if (errorList.length > 0) {

                    // Display the error messages to the user
                    var errorHtml = "<ul>";
                    errorList.forEach(function(error) {
                        errorHtml += "<li>" + error + "</li>";
                    });
                    errorHtml += "</ul>";

                    $('#error-signup-password').removeClass("hide");
                    $("#error-signup-password").html(errorHtml);
                    return;
                }else{
                    $('#error-signup-password').addClass("hide");
                }

                var userObj = {
                    username : txtSignUpName,
                    password : txtSignUpPass
                }

                $.ajax({
                    url : "../back-end/signupUser.php",
                    type: "POST",
                    dataType : "json",
                    data :JSON.stringify(userObj), // Object is an associate array 
                    contentType: "application/json; charset=utf-8", // Specify content type
                    success: function (response){  
                        if(response.success){
                            alert(response.message);
                            window.location.href = "../../../login.php";    

                        }else{
                            alert("Error : " + response.success);
                            alert(response.message);
                        }
                        
                    }, 
                    error : function(xhr, ajaxOptions, thrownError){
                        // Show What error
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });
            })

        
        });
    
    </script>
      
</body>
</html>