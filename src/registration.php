<?php
require 'connectDB.php';

if (isset($_POST['validate'])) {
    $options = ['cost' => 12];
    $pseudo = htmlentities($_POST['pseudo']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
    $registrERR = verifPseudo($pdo, $pseudo);

    if (!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['password'])) {
        if ($registrERR == FALSE) {
            if ($_POST['password'] == $_POST['password2']) {

                insertUser($pdo, $pseudo, $password);
            } else {
                $passErr3 = "Mots de passe non identiques!";
            }
        } else {
            $pseudoErr2 = "Pseudo déjà existant!";
        }

    } elseif (empty($_POST['pseudo'])) $pseudoErr = "Pseudo requis!";
    elseif (empty($_POST['password'])) $passErr = "Mot de passe requis!";
    elseif (empty($_POST['password2'])) $passErr2 = "Vérification requise!";
}

if (!isset($_SESSION['pseudo'])) {
    require("header.php");
    ?>
    <div align="center" class="container pt-5 mt-5">
        <div id="Div" class="col-sm-6">
            <form method="post">
                <div style="color: #0a6375; text-shadow: 2px 2px 20px black;" class="col mt-2 mb-4">
                    <h3 class="pt-3">
                        <span>INSCRIPTION</span>
                    </h3>
                </div>
                <div class="row col-md-offset col-md-8 form-group">
                    <input class="form-control" type="text" id="pseudo" name="pseudo" placeholder="Pseudo"
                           required>
                    <span style='color: #ff1934;' class="error">* <?php if (isset($pseudoErr)) {
                            echo $pseudoErr;
                        } else if (isset($pseudoErr2)) {
                            echo $pseudoErr2;
                        } ?></span>
                </div>
                <div class="row col-md-offset col-md-8 form-group">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe"
                           required>
                    <span style='color: #ff1934;' class="error">* <?php if (isset($passErr)) {
                            echo $passErr;
                        } else if (isset($passErr3)) {
                            echo $passErr3;
                        } ?></span>
                </div>
                <div class="row col-md-offset col-md-8 form-group">
                    <input class="form-control" type="password" id="password2" name="password2"
                           placeholder="Confirmation du mot de passe"
                           required>
                    <span style='color: #ff1934;' class="error">* <?php if (isset($passErr2)) {
                            echo $passErr2;
                        } else if (isset($passErr3)) {
                            echo $passErr3;
                        } ?></span>
                </div>
                <div class="row col-md-offset col-md-4 form-group">
                    <button class="form-control btn btn-outline-success mb-3" name="validate">Valider</button>
                </div>
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