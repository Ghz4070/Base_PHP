<?php
require 'connectDB.php';

if ($_SESSION['pseudo'] == "Ilies") {

    $result = viewArtcile($pdo, 5, isset($_GET['page']) ? $_GET['page'] : 1);

    if (isset($_GET['id'])) {
        deleteArticle($pdo, $_GET['id']);
        header("Location: dashboardAdmin.php");
        exit;
    }

    require 'header.php';
    ?>

    <?php
    foreach ($result['data'] as $value) {
        $resultID = idAuthor($pdo, $value['author']);
        foreach ($resultID as $author) {
            if ($value['id'] % 2 == 0) {
                ?>
                <div class="container mt-5">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <img class="card-img-right flex-auto d-none d-md-block"
                             style="width: 580px; height: 380px;"
                             src="upload/<?php echo $value['image']; ?>"
                             data-holder-rendered="true">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h3 class="mb-0">
                                <a class="text-dark"><?php echo $value['title']; ?></a>
                            </h3>
                            <p class="card-text mb-auto"><?php echo $value['content']; ?></p>
                            <a class="ml-auto text-dark"><?php echo $author['username']; ?></a>
                            <div class="ml-auto">
                                <a style="color: red;" class="mr-3"
                                   href="dashboardAdmin.php?id=<?php echo $value['id'] ?>">Supprimer</a>
                                <a style="color: green;"
                                   href="updateArticle.php?id=<?php echo $value['id'] ?>">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
                ?>
                <div class="container mt-5">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h3 class="mb-0">
                                <a class="text-dark"><?php echo $value['title']; ?></a>
                            </h3>
                            <p class="card-text mb-auto"><?php echo $value['content']; ?></p>
                            <a class="mr-auto text-dark"><?php echo $author['username']; ?></a>
                            <div class="mr-auto">
                                <a style="color: red;" class="mr-3"
                                   href="dashboardAdmin.php?id=<?php echo $value['id'] ?>">Supprimer</a>
                                <a style="color: green;"
                                   href="updateArticle.php?id=<?php echo $value['id'] ?>">Modifier</a>
                            </div>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block"
                             style="width: 580px; height: 380px;"
                             src="upload/<?php echo $value['image']; ?>"
                             data-holder-rendered="true">
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="<?php ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php ?>
            <li class="page-item"><a class="page-link" href="dashboardAdmin.php?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="dashboardAdmin.php?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="dashboardAdmin.php?page=3">3</a></li>
            <?php ?>
            <li class="page-item">
                <a class="page-link" href="<?php ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

    <?php
}
?>

</body>
</html>
