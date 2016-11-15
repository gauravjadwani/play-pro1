<?php 
if(!empty($_POST['date']))

            {
include '../views/connection.php';
session_start();
    $email=$_SESSION["email"];
    
    $name=$r->hget($email,'name');
    
    $name_project=$_POST['name_of_the_project'];
    $name_group=$_POST['name_of_group'];
    $date=$_POST['date'];
    $decription=$_POST['desc'];
    //$priority=$_POST['priority'];
   
    
    $r->setnx('group_id',1);
    $r->setnx('project_id',1);
    $group_id=$r->get('group_id');
    $project_id=$r->get('project_id');
    $current_date= date("Y/m/d");
    //$time=time();
    
    
    $r->hMset('group:'.$group_id, array('name' => $name_group,'created_on'=>$date,'status'=>'live'));
    $r->hMset('project:'.$project_id, array('name' => $name_project,'created_on'=>$date,'description'=>$decription,'status'=>'pending'));
     
    
    $list_modify=$_POST['list_members_modify'];
    $list_readonly=$_POST['list_members_readonly'];
//$val =$_POST['permissionsM'];
    if(!empty($list_modify))
    {
$iparr= split(",",$list_modify); 
    
for($i=0;$i<sizeof($iparr);$i++)
{
    
   $r->sadd("group_members:".$group_id,$iparr[$i]);
 $r->sadd("project:".$iparr[$i],$project_id); 
   $r->zadd("permissions:".$group_id,'2',$iparr[$i]);
    
    
}
    }
    if(!empty($list_readonly))
    {
    
$iparr= split(",",$list_readonly); 
    
for($i=0;$i<sizeof($iparr);$i++)
{
    
   $r->sadd("GROUP_MEMBERS:".$group_id,$iparr[$i]);
 $r->sadd("project:".$iparr[$i],$project_id);
   $r->zadd("permissions:".$group_id,'3',$iparr[$i]);
    
    
}
    }
    
    
    
    $r->incr('group_id');
    $r->incr('project_id');
//$check=$r->rpush("list_of_dates".$email,$date);    
///if($check==1)
        //echo "inserted";



}


        
        
        
        
        
        
        ?>