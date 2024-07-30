<?php
require_once "pdo.php";
session_start();

echo (isset($_SESSION['name'])?$_SESSION['name']:"no");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shojib index</title>
</head>
<body>

<header>
Shojib Resume Registry
</header>
<?php

//unset($_SESSION['name']);


if(isset($_SESSION['name'])){
    include "view.php";
    echo("<p>Note: Your implementation should retain data across multiple logout/login sessions. This sample implementation clears all its data periodically - which you should not do in your implementation.</p>
");
}else{
echo ('<div>
<p><a href="login.php"> login </a></p>
</div>
<div>
</div>');
}

?>





    
</body>
</html>