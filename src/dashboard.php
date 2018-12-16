<?php
require 'connectDB.php';

if (isset($_SESSION['pseudo'])) {

    $viewArticle = viewUserArticle($pdo, $_SESSION['id']);
//    var_dump($viewArticle['data']);

    require 'header.php';
    ?>
    <?php
    foreach ($viewArticle['data'] as $value) {
        $resultID = idAuthor($pdo, $value['author']);
        foreach ($resultID as $author) {
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
                            <button class="btn btn-success">Modifier</button>
                            <button class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="dashboard.php?page=1">1</a></li>
                <li class="page-item"><a class="page-link" href="dashboard.php?page=2">2</a></li>
                <li class="page-item"><a class="page-link" href="dashboard.php?page=3">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
    }
}
?>

</body>
</html>