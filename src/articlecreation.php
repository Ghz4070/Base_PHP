<?php
require 'connectDB.php';
//var_dump($_SESSION);
//var_dump($_POST);
//var_dump($_FILES);

if (!empty($_POST['validate'])) {
    $id = $_SESSION['id'];
    $title = htmlentities($_POST['title']);
    $content = htmlentities($_POST['content']);
    $image = uploadFile($_FILES['file-1']);
    insertArticles($pdo, $title, $content, $image, $id);
    header("Location: articlecreation.php");
    exit;
}

if (isset($_SESSION['pseudo'])) {
    require("header.php");
    ?>
    <div align="center" class="container pt-5 mt-5">
        <h2>
            <?php if (isset($_SESSION['accountValidate'])) {
                echo $_SESSION['accountValidate'];
                unset($_SESSION['accountValidate']);
            } ?>
        </h2>
        <?php if (isset($_SESSION['stateFile'])) {
            echo $_SESSION['stateFile'];
            unset($_SESSION['stateFile']);
        } ?>
        <div id="Div" class="col-sm-6">
            <form method='post' enctype="multipart/form-data" class="form-horizontal">
                <legend class="pt-2">Créer ton article</legend>

                <div class="form-group col-md-10">
                    <input id="title" name="title" type="text" placeholder="Titre article"
                           class="form-control input-md">
                </div>

                <div class="form-group col-md-10">
                    <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                </div>

                <div>
                    <input hidden type="file" name="file-1" id="file-1" class="inputfile inputfile-1"
                           data-multiple-caption="{count} files selected" multiple/>
                    <label for="file-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                        </svg>
                        <span>Choisir un fichier&hellip;</span></label>
                </div>

                <div class="mt-2 pb-3 form-group">
                    <button id="validate" name="validate" class="btn col-4 btn-success" value="1">Valider</button>
                </div>
            </form>
        </div>
    </div>

    <script src="css/CustomFileInputs/js/custom-file-input.js"></script>
    <!--    <script src="css/CustomFileInputs/js/jquery-v1.min.js"></script>-->
    <!--    <script src="css/CustomFileInputs/js/jquery.custom-file-input.js"></script>-->

    </body>
    </html>

    <?php
} else {
    header("Location: index.php");
    exit;
}
?>
