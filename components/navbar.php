<?php

if (isset($_POST['search'])) {
    $_SESSION['search'] = $_POST['search'];
    header('location: /');
    exit();
}

?>
<div class="navbody">
    <div>
        <nav class="d-flex justify-content-between align-items-center flex-row navwidth">
            <a href="/" class="homeknop"><h1 style="color: white;">codeju1</h1></a>
            <form method="post">
                <input placeholder="Search:" value="<?php if (isset($_SESSION['search'])) echo $_SESSION['search']; ?>" name="search" type="text" class="ellemant-coller-navbar">
            </form>
            <img id="theme" onclick="ChangeTheme()" src="/images/light-on.png" width="5%">
            <input id="themevalue" hidden value="0" type="text">
        </nav>
        <?php
        if ($true_or_flase) { ?>
            <div class="selectbody">
                <div class="d-flex flex-row navwidth">
                    <div class="d-flex flex-row navwidth align-items-start">
                        <p>filters:</p>
                        <select class="ellemant-coller-navbar">
                            <option value="" disabled="disabled" selected="selected">language</option>
                            <option value="1">PHP</option>
                            <option value="2">HTML</option>
                        </select>
                        <select class="ellemant-coller-navbar">
                            <option value="" disabled="disabled" selected="selected">Date</option>
                            <?php

                            for ($i = 2023; $i > -1; $i--) {
                                echo "<option value=" . $i . ">" . $i . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-flex align-items-start flex-row-reverse navwidth">
                        <a href="pages/addcode.php">Add code</a>
                    </div>

                </div>
            <?php } else {
        } ?>
            </div>
    </div>
</div>