<?php
include '../views/connection.php';
session_start();
    $email=$_SESSION["email"];
    
    $name=$r->hget($email,'name');



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">play-BETA</a>
    </div>
      
      
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span><?php echo $name; ?></a></li>
      
    <li><a href="../controllers/add_task.php"><span class="glyphicon glyphicon-log-in"></span> ADD_TASK</a></li>
    
        
    <li><a href="../controllers/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
    
    </ul>
      
    
  </div>    
</nav>

    
    
    
    <div class="container">
<div class="row">
    <div class="col-md-6">
        <div class="well">
    <form action="" method="POST">
<input type="date" name="date">
<input type="submit">
</form>
</div>
        </div>
    <div class="col-md-6">
        
 
  
  <ul class="list-group">

<?php
include '../views/connection.php';
if(!empty($_POST['date']))
{

//session_start();
    $email=$_SESSION["email"];
    $date=$_POST['date'];
    
    //$name=$r->hget($email,'name');
    
//$check=$r->zrange($date.$email,0,-1);
//echo $check;
$check=$r->sMembers('notifications:'.$email);
//echo $check;

foreach($check as $c)
    {
    

//echo $c;
echo "<br>";

 
//print 'the task_id is'.$c;
//$task_id=$c;
    //$permission=$r->zscore('permissions:'.$task_id,$email);
$che=$r->hget('tasks:'.$c,'status');
if($che=='pending')
{
    $date_assinged=$r->hget('tasks:'.$c,'assinged_for');
    if($date_assinged==$date)
    {
        //echo "t";
    $task_name=$r->hget('tasks:'.$c,'name');
    $task_priority=$r->hget('tasks:'.$c,'priority');
    print 
    
    '<form action="" method="post"><input type="hidden" name="hidden" value="'.$c.'"><li class="list-group-item list-group-item-success">'.$task_name.'&nbsp&nbsp&nbsppriority is&nbsp&nbsp&nbsp'.$task_priority.'<input type="submit"></li></form>';
    echo "<br>";
    }
}
    }
    
 /*   
    
foreach($check as $c)
    {
//echo $c;
echo "<br>";

print 
    '<li class="list-group-item list-group-item-success">'.$c.'</li>';
    
  
*/



    }
   

   
if(!empty($_POST['hidden']))
{
    $t_id=$_POST['hidden'];
    $r->hset('tasks:'.$t_id,'status','completed');
}

    
?>
      </ul>
    </div>

    
    
      </div>
    </div>

  
  
  
</body>
</html>

