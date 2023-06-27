<?php

if (isset($_POST['search'])) {
    $_SESSION['search'] = $_POST['search'];
    header('location: /');
    exit();
}

?>
<div style="background-color: #393646;width: 94%;margin: auto;">
    <div>
        <nav class="d-flex justify-content-between align-items-center">
            <h1 style="color: white;">codeju1</h1>
            <form method="post" style="background-color: #393646;">
                <input placeholder="Search" value="<?php if (isset($_SESSION['search'])) echo $_SESSION['search']; ?>" name="search" type="text">
            </form>
        </nav>
        <?php
        if ($true_or_flase) { ?>
            <div class="d-flex align-items-start flex-row" style="width: 97%; margin: auto;">
                <p>filters:</p>
                <select style="background-color: #393646; color: aliceblue; border: none;">
                    <option value="" disabled="disabled" selected="selected">language</option>
                    <option value="1">PHP</option>
                    <option value="2">HTML</option>
                </select>
                <select style="background-color: #393646; color: aliceblue; border: none;">
                    <option value="" disabled="disabled" selected="selected">Date</option>
                    <option value="1">2023</option>
                    <option value="2">2022</option>
                </select>
            </div>
        <?php } else {
        } ?>
    </div>
</div>