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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css">

    <script src="../script/script.js" defer></script>
    <title>Add code</title>
    <style>
        .inputfield {
            display: flex;
            justify-content: space-between;
        }

        #inputfields {
            background-color: #4F4557;
            outline: 0;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            color: white;
            /* Set the text color to white */

        }

        #inputfields::placeholder {
            color: white;
        }

        .codefield {
            padding: 30px;
            background-color: #4F4557;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .codefield textarea {
            width: 80%;
        }

        #button {
            background-color: #4F4557;
            color: white;
            width: 30%;
            padding: 10px;
        }

        .submit {
            display: flex;
            justify-content: center;
        }
    </style>
    <link id="lighttheme" rel="stylesheet" href="../style/stylelight.css">
</head>

<body>
    <?php
    include("../components/navbar.php")
    ?>
    <form method="post">

        <div class="   ">
            <div class="p-5 inputfield">
                <div class="inputfields">
                    <input placeholder="Title" type="text" name="title" id="inputfields">
                </div>
                <div class="inputfields">
                    <input placeholder="Your name" type="text" name="creator" id="inputfields">
                </div>
                <div class="inputfields">
                    <input placeholder="Short description" name="description" type="text" id="inputfields">
                </div>
                <div class="inputfields">
                    <select id="inputfields" name="language">
                        <?php
                        foreach ($programminglanguages as $language => $alias) {
                            echo "<option  value='{$alias}'>{$language}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="codefield">
                <textarea placeholder="code" name="code" id="inputfields" cols="180" rows="30"></textarea>
            </div>
            <p></p>
            <div class="submit">
                <button id="button" type="submit">Submit</button>
            </div>
        </div>
    </form>
    <?php require_once("../components/footer.php") ?>
</body>

</html>