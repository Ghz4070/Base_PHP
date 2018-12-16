<?php
require 'connectDB.php';

$viewMore = viewMore($pdo, $_GET['id']);
//var_dump($z);

if (!empty($_POST['poster'])) {
    $username = htmlentities($_POST['username']);
    $content = htmlentities($_POST['comment']);
    insertComment($pdo, $content, $username);
}

$comment = viewComment($pdo, $_GET['id']);


require 'header.php';
?>
<form method="post">
    <?php
    foreach ($viewMore as $vm) {
        $resultID = idAuthor($pdo, $vm['author']);
        foreach ($resultID as $author) { ?>
            <div class="container mt-5">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <img class="card-img-right flex-auto d-none d-md-block"
                         style="width: 580px; height: 380px;"
                         src="upload/<?php echo $vm['image']; ?>"
                         data-holder-rendered="true">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="text-dark mb-0">
                            <?php echo $vm['title']; ?>
                        </h3>
                        <p class="card-text mb-auto"><?php echo $vm['content']; ?></p>
                        <a class="ml-auto text-dark"><?php echo $author['username']; ?></a>
                        <input class="form-control mb-2" type="text" name="username" id="username" placeholder="Votre nom"/>
                        <textarea class="form-control" rows="1" id="comment" name="comment"
                                  placeholder="Commentaire"></textarea>
                        <button class="mt-2 btn btn-success ml-auto" name="poster" id="poster">Poster</button>
                        <a href="index.php">Retour en arriere</a>
                    </div>
                </div>
            </div>
        <?php }
    } ?>
</form>

</body>
</html>
