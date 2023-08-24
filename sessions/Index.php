<?php 
    session_start();
    if(isset($_POST['sm']))
    {
        $emailId=$_POST['emailId'];
        $password=$_POST['password'];
        if($emailId==="prithwijit98@gmail.com" and $password==="12345")
        {
                $_SESSION['emailId']=$emailId;
                $_SESSION['password']=$password;
                header("location:./page2.php");
                die();
        }
        else{
            echo "<br>Invalid Credentials</br>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session login....</title>
</head>
<body>
    <form method='post'>
        <div>
            <label>email:</label>
            <input type='email' placeholder='Enter Your Email Id' name='emailId'>
        </div> 
        <div>
            <label>password:</label>
            <input type='password' placeholder='Enter Your Password' name='password'>
        </div>   
        <div>
            <input type='submit' name='sm' value='login' />
        </div>     
    </form>    
</body>
</html>