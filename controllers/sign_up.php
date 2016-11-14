<?php
include '../views/connection.php';

    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $password=$_POST['passwd'];
    $hashed_password=password_hash($password,PASSWORD_DEFAULT);
    
    //$h1=
   // $r->set("in",1);
   //$in=$r->get('in');
    $check=$r->hMset($email, array('name' => $name, 'mobile' =>$mobile,'email'=>$email,'password_hash'=>$hashed_password,'date_list'=>'date'.$email)); 
    //$r->incr("in");
   if($check==1)
    { //header("Location: login.php");
    echo "e";
    header("location: ../views/login.html");
    }
    else 
        echo "non-comit";

?>
