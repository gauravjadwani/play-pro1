<?php
include '../views/connection.php';

//$name=$_POST['name'];
    //$mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $c=$r->exists($email);
    $password=$_POST['passwd'];
    if($c==1)
    {
        
        
        
    //$hashed_password=sha1($password);
     $check_hash=$r->hget($email,'password_hash');
    //echo var_dump($check_hash);
     if (password_verify($password,$check_hash)) 
                {
session_start();
            $_SESSION["email"]=$email;
            header("Location: ../views/dashboard.php");
} else {
    echo "wrong password";
   $alert="wrong password"; 
   include 'error.php';
        
}
     
     
       }
    ?>




