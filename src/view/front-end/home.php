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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">



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
            <img src="../../../img/user.png" alt="profile picture" class="user-img">
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
                <a id="nav-setting">
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
                <div class="header-and-search-container">
                    <h1>To Do List</h1>
                    
                    <div class="search">
                        <input placeholder='&#x1F50E;&#xFE0E;    Search task name' id="search-name-input">
                    </div>
                
                </div>
                <button class="btn-style1" id="btn-add-task"> <i class="fa-solid fa-plus"></i> New Task </button>
            </div>

            <div class="task-table-wrapper">
                <table id="my-table" class="display" >
                
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th></th>
                            <th></th> 
                            <th></th>  
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

        <!-- All Modals -->
        <!-- Create -->
        <div id="add-modal" class="modal">
        
            <!-- Modal Content -->
            <div id="add-task-modal" class="modal-content">

                <div class="modal-header-success">
                    <span class="close" id="close-new-icon">&times;</span>
                    <h2>New Task</h2>
                </div>

                <div class="modal-body">
                    <!-- title -->
                    <div>
                        <span> Title :</span><br>
                        <input type="text" id="txt-task-title">  <!-- style="width: 100%;" -->
                    </div>

                    <!-- description -->
                    <div>
                        <span> Description :</span><br>
                        <textarea id="txt-task-desc"></textarea>
                    </div>

                    <!-- status -->
                    <div>
                        <span> Status :</span>
                        <select id="add_opt_task_status">
                            <option value="OPEN">Open</option>
                            <option value="PENDING">Pending</option>
                            <option value="COMPLETED">Completed</option>
                        </select>

                        <span> Priority :</span>
                        <select id="add-opt-task-prio">
                            <option value="LOW">Low</option>
                            <option value="MEDIUM">Medium</option>
                            <option value="HIGH">High</option>
                        </select>
                    </div>

                </div>
            
                <div class="modal-footer">
                    <!-- Create Button -->
                    <button type="submit" class="btn-primary" id='btn-modal-create-task'> CREATE </button>
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
                    <button class="btn-error" id="btn-modal-confirm-delete"> DELETE </button>             
                </div>

            </div>
        </div> 

        <!-- Edit -->
        <div id="edit-modal" class="modal">
        
            <!-- Modal Content -->
            <div id="edit-task-modal" class="modal-content">

                <div class="modal-header-primary">
                    <span class="close" id="close-edit-icon">&times;</span>
                    <h2>Edit Task</h2>
                </div>

                <div class="modal-body">
                    <!-- title -->
                    <div>
                        <span> Title :</span><br>
                        <input type="text" id="edit-txt-task-title">  <!-- style="width: 100%;" -->
                    </div>

                    <!-- description -->
                    <div>
                        <span> Description :</span><br>
                        <textarea id="edit-txt-task-desc"></textarea>
                    </div>

                    <!-- status -->
                    <div>
                        <span> Status :</span>
                        <select id="edit_opt_task_status">
                            <option value="OPEN">Open</option>
                            <option value="PENDING">Pending</option>
                            <option value="COMPLETED">Completed</option>
                        </select>

                        <span> Priority :</span>
                        <select id="edit-opt-task-prio">
                            <option value="LOW">Low</option>
                            <option value="MEDIUM">Medium</option>
                            <option value="HIGH">High</option>
                        </select>
                    </div>

                </div>
            
                <div class="modal-footer">
                    <!-- Create Button -->
                    <button type="submit" class="btn-primary" id='btn-modal-edit-task'> EDIT </button>
                </div>        

            </div>
        </div>

        <!-- View -->
        <div id="view-modal" class="modal">
        
            <!-- Modal Content -->
            <div id="view-task-modal" class="modal-content">

                <div class="modal-header-secondary">
                    <span class="close" id="close-view-icon">&times;</span>
                    <h2>View Task</h2>
                </div>

                <div class="modal-body">
                    <!-- title -->
                    <div>
                        <span> Title :</span><br>
                        <input type="text" id="view-task-title" disabled>  <!-- style="width: 100%;" -->
                    </div>

                    <!-- description -->
                    <div>
                        <span> Description :</span><br>
                        <textarea id="view-task-desc" disabled></textarea>
                    </div>

                    <!-- status -->
                    <div>
                        <span> Status :</span> <span id="view_opt_task_status"></span>
                        <span> Priority :</span> <span id="view-opt-task-prio"></span> 
                    </div>

                </div>
            
            </div>
        </div>  

        <!-- Success -->
        <div id="success-modal" class="modal">
            <!-- Modal Content -->
            <div id="sucess-task-modal" class="modal-content">
                <!-- Header -->
                <div class="modal-header-success">
                    <span class="close" id="close-success-icon">&times;</span>
                    <h2>Create Successfully</h2>
                </div>

                <!-- Body -->
                <div class="modal-body-warn">

                    <div>
                        <img src="../../../img/tick.png" alt="success create" class="modal-icon">
                    </div>
                    
                    <div>
                        <h2>
                           Task successfully create
                        </h2> 
                    </div> 
                </div>

            </div>
        </div> 


    <!-- End of Main Content -->
    </div>

</body>

<script type="text/javascript">
    //region Element ID

    // Sidebar
    var menuBtn = document.getElementById("btn");
    var sidebar = document.querySelector(".sidebar");
    var settingBtn = document.getElementById("nav-setting");

    // All Button
    var btnAddTask = document.getElementById("btn-add-task");
    var btnLogOut = document.getElementById("btn-logout");

    //region Module

    // Module Type 
    var newTaskModule = document.getElementById("add-modal");
    var deleteTaskModule = document.getElementById("delete-modal");
    var successTaskModule = document.getElementById("success-modal");
    var viewTaskModule = document.getElementById("view-modal");
    var editTaskModule = document.getElementById("edit-modal");

    // Module Button
    var btnModuleAddTask = document.getElementById("btn-modal-create-task");
    var btnModuleEditTask = document.getElementById("btn-modal-edit-task");
    var btnModuleDeleteTask = document.getElementById("btn-modal-confirm-delete");

    //endregion

    // Close icon
    var closeNewTaskIcon = document.getElementById("close-new-icon");
    var closeEditTaskIcon= document.getElementById("close-edit-icon");
    var closeViewTaskIcon = document.getElementById("close-view-icon");
    var closeDeletTaskIcon = document.getElementById("close-delete-icon");
    var closeSuccessTaskIcon = document.getElementById("close-success-icon");

    //endregion

    // Sidebar menu action
    menuBtn.addEventListener("click" , function (){
        // add "active" CSS class to show navigation bar
        sidebar.classList.toggle("active");
    });

    // Add Task module
    btnAddTask.addEventListener("click", function(){

        newTaskModule.style.display = "block";

        btnModuleAddTask.addEventListener("click", function(){

            // Get text input by ID 
            var txtTitle = document.getElementById("txt-task-title").value; 
            var txtDesc = document.getElementById("txt-task-desc").value;
            var curStatus = document.getElementById("add_opt_task_status").value;
            var curPrio = document.getElementById("add-opt-task-prio").value;
            var curdate = new Date(); 
            var curUser = <?php echo $id ?>

            // send data in object form
            var taskObj = {
                name : txtTitle,
                desc : txtDesc,
                date : curdate,
                status : curStatus,
                priority : curPrio,
                user : curUser,
            }
                
            if(txtTitle.length === 0){
                alert("Title can\'t be empty");
                return;
            }

            $.ajax({
                url : "../back-end/addTask.php",
                type: "POST",
                dataType : "json",
                data :JSON.stringify(taskObj), // Object is an associate array 
                contentType: "application/json; charset=utf-8", // Specify content type
                success: function (response){  
                    if(response.success){
                        alert(response.message);
                        newTaskModule.style.display = "none";
                        $('input[type="text"], textarea').val('');
                        $("#my-table").DataTable().ajax.reload();
                    }else{
                        prompt("Error : " + response.success);
                    }
                    
                }, 
                error : function(xhr, ajaxOptions, thrownError){
                    // Show What error
                    alert(xhr.status);
                    alert(thrownError);
                }
            })
             
        });

    });

    // Nav Setting 
    settingBtn.addEventListener("click", function(){
        alert("Sorry, current feature under maintenance");
        return;
    })

    // Nav Logout
    btnLogOut.addEventListener("click", function(){
        // Destory session from logout.php via user id
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

    //region Close Action Btn
    closeNewTaskIcon.addEventListener("click", function(){
        newTaskModule.style.display = "none";
    });

    closeDeletTaskIcon.addEventListener("click", function(){
        deleteTaskModule.style.display = "none";
    });

    closeSuccessTaskIcon.addEventListener("click", function(){
        successTaskModule.style.display = "none";
    });

    closeViewTaskIcon.addEventListener("click", function(){
        viewTaskModule.style.display = "none";
    });

    closeEditTaskIcon.addEventListener("click", function(){
        editTaskModule.style.display = "none";
    });
    //endregion
    

    function editData(rowData){
        // console.log(rowData);
        editTaskModule.style.display = "block";

        var txtTitle = document.getElementById("edit-txt-task-title");
        var txtDesc = document.getElementById("edit-txt-task-desc");
        var optStatus =  document.getElementById("edit_opt_task_status");
        var optPrio =  document.getElementById("edit-opt-task-prio");

        txtTitle.value = rowData.task_name;
        txtDesc.value = rowData.task_desc;
        optStatus.value = rowData.task_status;
        optPrio.value = rowData.task_prio;


        btnModuleEditTask.addEventListener("click", function(){

            var newTxtTitle = document.getElementById("edit-txt-task-title").value;
            var newTxtDesc = document.getElementById("edit-txt-task-desc").value;
            var newStatus =  document.getElementById("edit_opt_task_status").value;
            var newPrio = document.getElementById("edit-opt-task-prio").value;
            var newDate = new Date();
            var curUser = <?php echo $id ?>;

            var newtaskObj = {
                name : newTxtTitle,
                desc : newTxtDesc,
                date : newDate,
                status : newStatus,
                priority : newPrio,
                user : curUser,
            }

            $.ajax({
                type: "POST",
                url:"../back-end/updateTask.php",
                dataType : "json",
                contentType: "application/json; charset=utf-8", // Specify content type
                data: JSON.stringify(newtaskObj),
                success : function(response){
                    // your action after success is here    
                    if(response.success){
                        alert(response.message);
                        editTaskModule.style.display = "none";
                        // Set all value to empty
                        $('input[type="text"], textarea').val('');
                        $("#my-table").DataTable().ajax.reload();
                    }
                },
                error : function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                }
            })

        })

    };

    function deleteData(rowData) {

        deleteTaskModule.style.display = "block";
    
        btnModuleDeleteTask.addEventListener("click", function(){
            //console.log(rowData.task_id);

            $.ajax({
                type: "POST",
                url:"../back-end/deleteUser.php",
                dataType : "json",
                contentType: "application/json; charset=utf-8", // Specify content type
                data: JSON.stringify({
                    deleteId : rowData.task_id,
                }),
                success: function (response) {
                    // display out the data base assoc array 
                    if (response.success) {
                        alert(response.message);
                        deleteTaskModule.style.display = "none";
                        $("#my-table").DataTable().ajax.reload();

                    } else {
                        // show error
                        alert("Error: " + response.message);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // Show What error
                    alert(xhr.status);
                    alert(thrownError);
                },

            })

        });
    };

    function viewData(rowData) {

        // show view modal 
        viewTaskModule.style.display = "block";

        var txtTitle = document.getElementById('view-task-title');
        var txtDesc = document.getElementById("view-task-desc");
        var txtStatus = document.getElementById("view_opt_task_status");
        var txtPrio = document.getElementById("view-opt-task-prio");

        txtTitle.value = rowData.task_name;
        txtDesc.value = rowData.task_desc;
        txtStatus.innerHTML = rowData.task_status;
        txtPrio.innerHTML = rowData.task_prio;

        txtTitle.disabled = true;
        txtDesc.disabled = true;   

    };

    function customStringify(obj) {
        return JSON.stringify(obj, function (key, value) {
        if (typeof value === 'object' && value !== null) {
            // Exclude any properties you don't want in the JSON string
            return value;
        }
        return value;
    });

}
    
</script>

<!-- DataTable -->
<script type="module">
    
    // use jquery to perform add table 
    $(document).ready(function(){

        // Initializa Database
        var table = $("#my-table").DataTable({
            dom: 'rtip', // exclude f to hide searching input
            paging: true,
            info: true,
            searching: true, 
            ordering: true, 
            responsive: true,
            order: [5],
            ajax: {
                url : "../back-end/getTaskList.php",
                type : "POST",
                contentType: "application/json",
                dataSrc: "",
                dataType: "json", // Add this line to specify expected data type
                data : function(d){
                    d.userId = <?php echo json_encode($id); ?>;
                    return JSON.stringify(d);
                },
            },
            columnDefs:[
                { 
                    targets: 0,
                    data : "task_id" ,
                    orderable: false,
                    render: function (data, type, row){

                        if(row.task_status == "COMPLETED"){
                            return "<del>"+ data +"</del>";
                        }

                        return data;
                    }
                },
                {
                    targets: 1,
                    data : "task_name",
                    orderable: false,
                    render: function (data, type, row){

                        if(row.task_status == "COMPLETED"){
                            return "<del>"+ data +"</del>";
                        }

                        return data;

                    }
                },
                {
                    targets: 2,
                    data : "task_desc",
                    orderable: false,
                    visible : false
                },
                {
                    targets: 3,
                    data : "task_created_date",
                    orderable: false,
                    render : function (data, type, row){

                        if(row.task_status == "COMPLETED"){
                            return "<del>"+ getDateAfterSplite(data) +"</del>";
                        }
                        return getDateAfterSplite(data);
                        
                    }

                },
                {
                    targets: 4,
                    orderable: false,
                    data : "task_status"
                },
                {
                    targets: 5,
                    data : "task_prio",
                    type: "string",
                    render: function(data, type, row) {
                        return ['LOW', 'MEDIUM', 'HIGH'].indexOf(data);
                    },
                    orderData: [5],
                    
                },
                {
                    targets: 6,
                    orderable: false,
                    data: null, // Use null for the 'Actions' column
                    render: function (data, type, row) {
                        // Convert the row object to a JSON string using a custom function
                        var jsonString = customStringify(row);
                        return `<button class='btn-view' onclick='viewData(${jsonString})'><i class='fa-solid fa-magnifying-glass'></i> View </button>`;
                    }
                },
                {
                    targets: 7,
                    data: null, 
                    orderable: false,
                    render: function (data, type, row) {
                        var jsonString = customStringify(row);
                        return `<button class='btn-edit' onclick='editData(${jsonString})'><i class='fa-solid fa-pen-to-square'></i> Edit </button>`;
                    }
                },
                {
                    targets: 8,
                    orderable: false,
                    data: null,
                    render: function (data, type, row) {
                        var jsonString = customStringify(row);
                        return ` <button class='btn-remove' onclick='deleteData(${jsonString})'><i class='fa-solid fa-trash'></i> Delete </button>`;
                    }
                },         
            ],
            // Add Style class for Status and Priority
            rowCallback: function(row, data) {
                // console.log(row);

                // Status
                switch(data.task_status) {

                    case "OPEN":
                        // Create a div element
                        var divElement = $('<div>', {
                            'class': 'openTask',
                            'text': data.task_status // You can set the text content if needed
                        });

                        // Select the target column and append the div
                        $('td:eq(3)', row).empty().append(divElement);

                    break;
                        
                    case "PENDING":
                        // Create a div element
                        var divElement = $('<div>', {
                            'class': 'pendingTask',
                            'text': data.task_status // You can set the text content if needed
                        });

                        // Select the target column and append the div
                        $('td:eq(3)', row).empty().append(divElement);

                    break;

                    case "COMPLETED":
                        // Create a div element
                        var divElement = $('<div>', {
                            'class': 'completeTask',
                            'text': data.task_status // You can set the text content if needed
                        });

                        // Select the target column and append the div
                        $('td:eq(3)', row).empty().append(divElement);

                    break; 
                } 
                
                // Priority
                switch(data.task_prio) {

                    case "LOW":
                        // Create a div element
                        var divElement = $('<div>', {
                            'class': 'lowPrio',
                            'text': data.task_prio // You can set the text content if needed
                        });

                        // Select the target column and append the div
                        $('td:eq(4)', row).empty().append(divElement);

                    break;
                        
                    case "MEDIUM":
                        // Create a div element
                        var divElement = $('<div>', {
                            'class': 'mediumPrio',
                            'text': data.task_prio // You can set the text content if needed
                        });

                        // Select the target column and append the div
                        $('td:eq(4)', row).empty().append(divElement);

                    break;

                    case "HIGH":
                        // Create a div element
                        var divElement = $('<div>', {
                            'class': 'highPrio',
                            'text': data.task_prio // You can set the text content if needed
                        });

                        // Select the target column and append the div
                        $('td:eq(4)', row).empty().append(divElement);

                    break; 
                    } 
                
            },
   
        });
        
        $('#search-name-input').on('keyup', function () {
            table.search(this.value).draw();
        });
        
        function getDateAfterSplite(data){
            var date = data.split(" ");
            return date[0];
        };

    });

  
</script>


</html>