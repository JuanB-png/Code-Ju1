<?php
$uploaddate = date('Y-m-d');
require_once("../database/dbconnect.php");
require_once("../components/functions.php");
$true_or_flase = false;
if (isset($_POST["title"])) {
    if (!empty($_POST["code"]) && !empty($_POST["title"]) && !empty($_POST['language']) && !empty($_POST['description']) && !empty($_POST['creator']))
        AddCode($pdo, $_POST["title"], $_POST['creator'], $_POST["code"], $uploaddate, $_POST['language'], $_POST['description']);
    header("location: ../");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add code</title>

    <style>
  
    .inputfield {
        display: flex;
        justify-content: space-between;
    }

    .inputfields {
        background-color: #DBE2EF;
        border: none;
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .codefield {
        padding: 30px;
        background-color: #DBE2EF;
    }

</style>
</head>

<body>
    <form method="post">

        <div class=" d-flex justify-content-center  ">
            <div class="inputfield">
                <div class="inputfields">
                    <input placeholder="Title" type="text" name="title" id="inputfields">
                </div>
                <div class="inputfields">
                    <input placeholder="Your name" type="text" name="creator">
                </div>
                <div class="inputfields">
                    <input placeholder="Short description" name="description" type="text">
                </div>
                <div class="inputfields">
                    <select name="language">
                        <?php
                        foreach ($programminglanguages as $language => $alias) {
                            echo "<option value='{$alias}'>{$language}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="codefield">
                <textarea placeholder="code" name="code" id="" cols="200" rows="30"></textarea>
            </div>
            <button type="submit">Upload code</button>
        </div>
    </form>
    <a href="../">Home</a>
</body>

</html>