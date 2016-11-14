
<?php

include '../views/connection.php';
//session_start();
    $email=$_SESSION["email"];
    //echo "email is ".$email;
   // $date=$_POST['date'];
  //$email="neha.bakshi@gmail.com";  
    $name=$r->hget($email,'name');
    
//$check=$r->zrange($date.$email,0,-1);
//echo $check;
$check=$r->sMembers('notifications:'.$email);
//echo $check;
//var_dump($check);

foreach($check as $c)
    {
    

//echo $c;
echo "<br>";
//echo $c;

 
//print 'the task_id is'.$c;
//$task_id=$c;
    //$permission=$r->zscore('permissions:'.$task_id,$email);
$che=$r->hget('tasks:'.$c,'status');
if($che=='pending')
{
    $task_name=$r->hget('tasks:'.$c,'name');
    print 
    '<li class="list-group-item list-group-item-success">'.$task_name.'</li>';
    echo "<br>";
    
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



    
   ?>
      