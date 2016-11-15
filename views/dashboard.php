<!DOCTYPE html>
<?php
include '../views/connection.php';
session_start();
    $email=$_SESSION["email"];
    
    $name=$r->hget($email,'name');



?>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<script src="https://use.fontawesome.com/9d774c759d.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">play-BETA</a>
    </div   >
      
      
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="notifications.php"><span class="glyphicon glyphicon-user"></span><?php echo $name; ?></a></li>
      
    <li><a href="../controllers/add_task.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
    <li><a href="../views/add_project_view.php"><span class="glyphicon glyphicon-log-in"></span>ADD PROJECT</a></li>
    <li><a href="view_as_date.php"><span class="glyphicon glyphicon-log-in"></span>VIEW TASK AS DATE</a></li>
        
    <li><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>    
</nav>
  
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
            <h1>NOTIFICATIONS</h1>
            <hr>
                <?php
                 
                include 'notifications.php';
                
                ?>
                </ul>
            </div>
            
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-9">
                    <h1>ON BOARD TASKS</h1>
                    <hr>
                   
                <div class="col-md-12">
                    
  
  <ul class="list-group">

            <?php
            //if(!empty($_POST['date']))
            require_once 'view_task.php';
            ?>
      </ul>
                 </div>     
            </div>
                 
</div>
        </div>
    </div>
    </div>

</body>
</html>

