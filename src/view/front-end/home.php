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
                <p class="bold">Frank Lee</p>
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

    <!-- Main Content -->
    <div class="main-content">

        <div class="getCenter">

            <div class="main-container">
                <h1>To Do List</h1>

                <button class="btn-style1" id="btnAddTask"> <i class="fa-solid fa-plus"></i> New Task </button>
            </div>

            <div>
                <table id="myTable" class="display" style="width: 80%;">
                
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th></th> 
                            <th></th>  
                        </tr>
                    </thead>

                </table>
            </div>
        </div>


        <!-- All Modal -->
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
                        <input type="text" id="txt_task_title" >  <!-- style="width: 100%;" -->
                    </div>

                    <!-- description -->
                    <div>
                        <span> Description :</span><br>
                        <textarea id="txt_task_desc"></textarea>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <!-- Create Button -->
                    <button class="btn-primary" onclick='createNewTask();'> CREATE </button>
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
    var txtTitle = document.getElementById("txt_task_title").value; 
    var txtDesc = document.getElementById("txt_task_desc").value;

    // Moodule
    var newTaskModule = document.getElementById("add-modal");
    var deleteTaskModule = document.getElementById("delete-modal");

    // All button
    var btnAddTask = document.getElementById("btnAddTask");

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

    // Display Delete Task module
    function confirmDeleteModal() {
        deleteTaskModule.style.display = "block";
    }

    function createNewTask(){
        /*
        * 1. perform validation
        * 2. send data to PHP for saving in DB (Ajax)
        */

        if(txtTitle == null || txtTitle == ""){
            console.log("Error : tittle can't be empty empty");
            return
        }
        
    }
    

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
            "<button class='btn-edit'><i class='fa-solid fa-pen-to-square'></i> Edit </button>",
            "<button class='btn-remove' onclick='confirmDeleteModal()'><i class='fa-solid fa-trash '></i> Delete </button>"
        ],
        [
            "Garrett Winters",
            "Director",
            "Edinburgh",
            "8422",
            "<button class='btn-edit'><i class='fa-solid fa-pen-to-square'></i> Edit </button>",
            "<button class='btn-remove' onclick='confirmDeleteModal()' ><i class='fa-solid fa-trash '></i> Delete </button>"
        ]
    ]

    let table = new DataTable('#myTable', {
        data : data,
        paging : false,
        info : false,
        searching : false, // can use for priority
        ordering : false, // can use for name
        responsive: true,
        
    });


    
  
</script>


</html>