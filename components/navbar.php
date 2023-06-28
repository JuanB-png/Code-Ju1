<?php

if (isset($_POST['search'])) {
    $_SESSION['search'] = $_POST['search'];
    header('location: /');
    exit();
}

?>
<div style="background-color: #393646; width: 95%;margin: auto;">
    <div>
        <nav class="d-flex justify-content-between align-items-center flex-row" style=" width: 99%;margin: auto;">
            <h1 style="color: white;">codeju1</h1>
            <form method="post" style="background-color: #393646;">
                <input placeholder="Search" value="<?php if (isset($_SESSION['search'])) echo $_SESSION['search']; ?>" name="search" type="text" style="background-color: #4F4557;">
            </form>
            <img id="theme" onclick="ChangeTheme()" src="/images/light-on.png" width="5%">
            <input id="themevalue" hidden value="0" type="text">
        </nav>
        <?php
        if ($true_or_flase) { ?>
            <div style="width: 100%; margin: auto; background-color: #4F4557;">
                <div class="d-flex align-items-start flex-row" style="width: 99%; margin: auto;">
                    <p>filters:</p>
                    <select style="background-color: #4F4557; color: aliceblue; border: none;">
                        <option value="" disabled="disabled" selected="selected">language</option>
                        <option value="1">PHP</option>
                        <option value="2">HTML</option>
                    </select>
                    <select style="background-color: #4F4557; color: aliceblue; border: none;">
                        <option value="" disabled="disabled" selected="selected">Date</option>
                        <?php

                        for ($i = 2023; $i > -1; $i--) {
                            echo "<option value=" . $i . ">" . $i . "</option>";
                        }
                        ?>
                    </select>
                </div>
            <?php } else {
        } ?>
            </div>
    </div>
</div>