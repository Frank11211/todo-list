<?php
    // Start the session
    session_start();

    $id   = $_SESSION["userId"] ;
    $name = $_SESSION["userName"]; 
    $pass = $_SESSION["userPass"] ;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../../css/sidebar-style.css">

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- DataTable Button -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <!-- Font Awsome CDN -->
    <script src="https://kit.fontawesome.com/5151fc54ff.js" crossorigin="anonymous"></script>

    <!-- Select CDN  -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">


</head>
<body>
    
    <!-- Side Navigation Bar -->
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
                <p class="bold"><?php echo $name ?></p>
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
                    <span class="nav-item" id="btn-logout">Logout</span>
                    
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <div class="align-center">

            <div class="main-container">
                <h1>To Do List</h1>

                <button class="btn-style1" id="btn-add-task"> <i class="fa-solid fa-plus"></i> New Task </button>
            </div>

            <div>
                <table id="my-table" class="display" style="width: 80%;">
                
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th></th>
                            <th></th> 
                            <th></th>  
                        </tr>
                    </thead>

                </table>
            </div>
        </div>


        <!-- Modals -->
        <!-- Create + Edit -->
        <div id="add-modal" class="modal">
        
            <!-- Modal Content -->
            <div id="add-task-modal" class="modal-content">

                <div class="modal-header-success">
                    <span class="close" id="close-new-icon">&times;</span>
                    <h2>New Task</h2>
                </div>

                <!-- Form create task-->
                <div class="modal-body">

                    <!-- title -->
                    <div>
                        <span> Title :</span><br>
                        <input type="text" id="txt-task-title" >  <!-- style="width: 100%;" -->
                    </div>

                    <!-- description -->
                    <div>
                        <span> Description :</span><br>
                        <textarea id="txt-task-desc"></textarea>
                    </div>

                    <!-- status -->
                    <div>
                        <span> Status :</span><br>
                        <select name="task_status_group" id="opt_task_status">
                            <option value="OPEN">Open</option>
                            <option value="IN PROGRESS">In Progress</option>
                            <option value="COMPLETED">Completed</option>
                        </select>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <!-- Create Button -->
                    <button class="btn-primary" id='btn-create-task'> CREATE </button>
                </div>   

            </div>
        </div>
        
        <!-- Delete -->
        <div id="delete-modal" class="modal">
            <!-- Modal Content -->
            <div id="delete-task-modal" class="modal-content">
                <!-- Header -->
                <div class="modal-header-warning">
                    <span class="close" id="close-delete-icon">&times;</span>
                    <h2>Delete Task</h2>
                </div>

                <!-- Body -->
                <div class="modal-body-warn">

                    <div>
                        <img src="../../../img/red-warn.png" alt="delete warning" class="modal-icon">
                    </div>
                    
                    <div>
                        <h2>
                            Delete task permanently? <br> Action cannot be undone after proceed
                        </h2> 
                    </div> 
                </div>

                <!-- Button Group -->
                <div class="modal-footer">
                    <button  class="btn-error"> DELETE </button>             
                </div>

            </div>
        </div> 


    <!-- End of Main Content -->
    </div>

</body>

<script>
    var menuBtn = document.getElementById("btn");
    var sidebar = document.querySelector(".sidebar");

    // Get text input by ID 
    var txtTitle = document.getElementById("txt-task-title").value; 
    var txtDesc = document.getElementById("txt-task-desc").value;

    // Moodule
    var newTaskModule = document.getElementById("add-modal");
    var deleteTaskModule = document.getElementById("delete-modal");

    // All button
    var btnAddTask = document.getElementById("btn-add-task");
    var btnLogOut = document.getElementById("btn-logout");
   
    // Close icon
    var closeNewTaskIcon = document.getElementById("close-new-icon");
    var closeDeletTaskIcon = document.getElementById("close-delete-icon");

    //  Sidebar menu action
    menuBtn.addEventListener("click" , function (){
        // add "active" CSS class to show navigation bar
        sidebar.classList.toggle("active");
    });
    
    closeNewTaskIcon.addEventListener("click", function(){
        newTaskModule.style.display = "none";
    });

    closeDeletTaskIcon.addEventListener("click", function(){
        deleteTaskModule.style.display = "none";
    });

    // Display New Task module
    btnAddTask.addEventListener("click", function(){
        newTaskModule.style.display = "block";
    });

    // Fetch data from logout.php
    btnLogOut.addEventListener("click", function(){
        fetch('../back-end/logout.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if(response.ok){
                window.location = "../../../login.php";
            }else{
                console.error('Error:', response.status);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Display Delete Task module
    function confirmDeleteModal() {
        deleteTaskModule.style.display = "block";
    };

    
</script>

<!-- DataTable -->
<script type="module">
    // Data form can be Object, array or instance 

    var data = [
        [
            "Tiger Nixon",
            "System Architect",
            "Edinburgh",
            "5421", 
            "<button class='btn-view'><i class='fa-solid fa-magnifying-glass'></i> View </button>",
            "<button class='btn-edit'><i class='fa-solid fa-pen-to-square'></i> Edit </button>",
            "<button class='btn-remove' onclick='confirmDeleteModal()'><i class='fa-solid fa-trash '></i> Delete </button>"
        ],
        [
            "Garrett Winters",
            "Director",
            "Edinburgh",
            "8422",
            "<button class='btn-view'><i class='fa-solid fa-magnifying-glass'></i> View </button>",
            "<button class='btn-edit'><i class='fa-solid fa-pen-to-square'></i> Edit </button>",
            "<button class='btn-remove' onclick='confirmDeleteModal()' ><i class='fa-solid fa-trash '></i> Delete </button>"
        ],
        [
            "Garrett Winters",
            "Director",
            "Edinburgh",
            "8422",
            "<button class='btn-view'><i class='fa-solid fa-magnifying-glass'></i> View </button>",
            "<button class='btn-edit'><i class='fa-solid fa-pen-to-square'></i> Edit </button>",
            "<button class='btn-remove' onclick='confirmDeleteModal()' ><i class='fa-solid fa-trash '></i> Delete </button>"
        ]
    ]

 
    // use jquery to perform add table 
    $(document).ready(function(){

        var btnCreateTask = document.getElementById("btn-create-task");

        // Initializa Database
       var table =  $("#my-table").DataTable({
            data : data,
            paging : false,
            info : false,
            searching : false, // can use for priority
            ordering : false, // can use for name
            responsive: true,
            select: true, // default single
            // ajax : { perform ajax
               
            // },
            // columns : {
                
            // },
            rowCallBack: function(row , data){
                
            },
       })

       btnCreateTask.addEventListener("click", function(){
            table.row.add([
                "Garrett Winters",
                "Director",
                "Edinburgh",
                "8422",
                "<button class='btn-view'><i class='fa-solid fa-magnifying-glass'></i> View </button>",
                "<button class='btn-edit'><i class='fa-solid fa-pen-to-square'></i> Edit </button>",
                "<button class='btn-remove' onclick='confirmDeleteModal()' ><i class='fa-solid fa-trash '></i> Delete </button>"
            ]).draw();

        })

    });



    
  
</script>


</html>