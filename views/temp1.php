
<html>
    <body>
        
        <select>
            
        <?php
        
   include '../views/connection.php';
    session_start();
        $email=$_SESSION["email"];

        $name=$r->hget($email,'name');
        //echo $name;

$projects=$r->smembers('project:'.$email);


foreach($projects as $c)
    {
    
$emails=$r->zrangebyscore('permissions:'.$c,'2','3');
foreach($emails as $c2)
{
if($c2==$email)
{   
        ?>
        
            <option value=""><?php echo $c;?></option>
  
        
<?php
}

}
    }

?>
            </select>
        <?php
        //echo var_dump($projects);?>
            </body>
    </html>

        