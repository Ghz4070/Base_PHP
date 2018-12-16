<?php
require 'connectDB.php';


if (!isset($_SESSION['pseudo'])) {
    require("header.php");
    ?>
    <div align="center" class="container pt-5 mt-5">
        <h2>
            <?php if (isset($_SESSION['accountValidate'])) {
                echo $_SESSION['accountValidate'];
                unset($_SESSION['accountValidate']);
            } ?>
        </h2>
        <div id="Div" class="col-sm-6">
            <form method="post">
                <div style="color: #0a6375; text-shadow: 2px 2px 20px black;" class="col mt-2 mb-4">
                    <h3 class="pt-3">
                        <span>CONNEXION</span>
                    </h3>
                </div>
                <div class="row col-md-offset col-md-8 form-group">
                    <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Pseudo"
                           required>
                </div>
                <div class="row col-md-offset col-md-8 form-group">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe"
                           required>
                </div>
                <div class="row col-md-offset col-md-4 form-group">
                    <button class="form-control btn btn-outline-secondary mb-3" name="connection">Connexion</button>
                </div>
                <?php if (isset($_SESSION['msgErr'])) {
                    echo $_SESSION['msgErr'];
                    unset($_SESSION['msgErr']);
                } ?>
            </form>
        </div>
    </div>

    </body>
    </html>

    <?php
} else {
    header("Location: index.php");
    exit;
}
?>