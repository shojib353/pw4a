<?php 
include("pdo.php");

session_start();


if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$salt='XyZzy12*_';
if(isset($_POST['submit'])){
    
$check = hash('md5', $salt.$_POST['pass']);

$stmt = $pdo->prepare("SELECT user_id, name FROM users

    WHERE email = :em AND password = :pw");

$stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));

$row = $stmt->fetch(PDO::FETCH_ASSOC);



if ( $row !== false ) {

   $_SESSION['name'] = $row['name'];

   $_SESSION['user_id'] = $row['user_id'];

   // Redirect the browser to index.php

   header("Location:index.php");

}
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shojib login</title>
</head>
<body>
<div>

<form method="POST">
<label for="email">User Name</label>
<input type="text" name="email" id="email"><br/>
<label for="pass">Password</label>
<input type="text" name="pass" id="pass"><br/>
<input type="submit" onclick="doValidate()" name="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>

</div>


<script>
function doValidate() {
    console.log('Validating...');
    try {
        addr = document.getElementById('email').value;
        pw = document.getElementById('pass').value;
        console.log("Validating addr="+addr+" pw="+pw);
        if (addr == null || addr == "" || pw == null || pw == "") {
            alert("Both fields must be filled out");
            return false;
        }
        if ( addr.indexOf('@') == -1 ) {
            alert("Invalid email address");
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>

</body>
</html>