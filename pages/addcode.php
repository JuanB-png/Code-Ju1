<?php
$uploaddate = date('m/d/Y');
require_once("../database/dbconnect.php");
require_once("../components/functions.php");
AddCode($pdo, $_POST["title"] , $_POST["code"] , $uploaddate);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>

    <form method="post">
<input type="text" name="title">
<textarea name="code" id="" cols="30" rows="10"></textarea>
<button type="submit"></button>
    </form>

    
</body>
</html>