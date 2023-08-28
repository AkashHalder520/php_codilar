<?php
$email = '';
$password = '';
if (isset($_POST["email"])) {
    $email = $_POST['email'];
}
if (isset($_POST["password"])) {
    $password = $_POST['password'];
}
if ($email == "akash@gmail.com" && $password == "1234") {
    setcookie("email", "akash Halder", time() + 10);
    header("Location:./page2.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="">Email</label>
        <input type="text" name="email" id="">
        <label for="">password</label>
        <input type="password" name="password" id="">
        <button type="submit">submit</button>
    </form>
</body>

</html>