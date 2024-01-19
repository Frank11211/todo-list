<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../css/sidebar-style.css">

    <!-- fort awsome key -->
    <script src="https://kit.fontawesome.com/5151fc54ff.js" crossorigin="anonymous"></script>

</head>
<body>
   
    <div class="sidebar">
        <!-- TitleHeader -->
        <div class="top">
            <div class="logo">
                <span>To Do List</span>
            </div>
            
            <i class="fa-solid fa-bars" id="btn"></i>
        </div>

        <!-- User Account -->
        <div class="user">  
            <img src="../../../img/todoLogo.png" alt="profile picture" class="user-img">
            <div>
                <p class="bold">Frank Lee</p>
                <p> Admin </p>

            </div>
        </div>
        
        <!-- Navigation Item List -->
        <ul>   
            <!-- Dashbaord Only -->
            <li>
                <a href="#">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                
            </li>

            <!-- BONUS -->
            <!-- Setting -->
            <li>
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span class="nav-item">Settings</span>
                </a>
            </li>

            <!-- Log Out -->
            <li>
                <a href="#">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="nav-item">Logout</span>
                </a>
            </li>

        </ul>

    </div>

    <div class="main-content">
        <div class="main-container">
            <h1>This is Testing </h1>
            <h1>Right side</h1>
        </div>
    </div>
    
</body>

<script>
    // get element to perform toggle 
    var menuBtn = document.getElementById("btn");

    // get first class 
    var sidebar = document.querySelector(".sidebar");

    menuBtn.addEventListener("click" , function (){
        // show navigation bar
        sidebar.classList.toggle("active");
    });

  

    

</script>


</html>