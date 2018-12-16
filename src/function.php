<?php
require 'infoDB.php';

function connectPDO(string $host, string $db_name, string $user, string $password)
{
    try {
        $dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
        return $dbh;
    } catch (PDOException $e) {
        die('Error' . $e->getMessage());
    }
}

function verifPseudo(PDO $pdo, string $pseudo)
{
    $Verify = $pdo->prepare('SELECT username FROM user WHERE username=:pseudo');
    $Verify->bindParam(':pseudo', $pseudo);
    $Verify->execute();
    $Verifpseudo = $Verify->fetch();
    if (!empty($Verifpseudoq)) {
        $pseudoExist = TRUE;
    } else {
        $pseudoExist = FALSE;
    }
    return (bool)$pseudoExist;
}

function insertUser(PDO $pdo, string $pseudo, string $password)
{
    $insert = $pdo->prepare('INSERT INTO user (username, password) VALUES (:pseudo, :password)');
    $insert->bindParam(':pseudo', $pseudo);
    $insert->bindParam(':password', $password);
    $insert->execute();

    $succes = 0;
    $succes = $insert->rowCount();
    if ($succes > 0) {

        $_SESSION['accountValidate'] = "<p style='color: #218eff; font-weight: bold;'>Votre compte a bien été crée.</p>";
        header("Location: connection.php");
        exit;
    }
}

function connectionUser(PDO $pdo, string $pseudo, string $password)
{
    $res = [];
    $request = $pdo->prepare(" SELECT * FROM user WHERE username = :pseudo ");
    $request->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->execute();
    $res = $request->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $res['password'])) {
        $_SESSION['pseudo'] = $res['username'];
        $_SESSION['id'] = $res['id'];
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['msgErr'] = "<p style='color: red; font-weight: bold;'>Pseudo ou Mot de passe incorrect</p>";
    }
}

function insertArticles(PDO $pdo, string $title, string $content, string $image, int $id)
{
    $insert = $pdo->prepare('INSERT INTO article (title, content, image, author) VALUES (:title, :content, :image, :id)');
    $insert->bindParam(':title', $title);
    $insert->bindParam(':content', $content);
    $insert->bindParam(':image', $image);
    $insert->bindParam(':id', $id, PDO::PARAM_INT);
    $insert->execute();
}

function uploadFile(array $nameFile)
{
    $dossier = "upload/";
    $fichier = uniqid() . '-' . $nameFile["name"];
    $type = $nameFile["type"];
    if ($type == 'image/png' || $type == 'image/jpg' || 'image/jpeg') {
        $temporary = $nameFile['tmp_name'];
        if (move_uploaded_file($temporary, $dossier . $fichier)) {
            $_SESSION['stateFile'] = "<div class='col-6 alert alert-success'>Fichier telecharger</div>";
            return $fichier;
        } else {
            $_SESSION['stateFile'] = "<div class='col-6 alert alert-danger'>Erreur</div>";
        }
    } else {
        $_SESSION['stateFile'] = "<div class='col-6 alert alert-danger'>Mauvais format</div>";
    }
}

function viewArtcile(PDO $pdo, int $limit, int $offset)
{
    $query = $pdo->prepare('SELECT * FROM article LIMIT :limit OFFSET :offset');
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetchAll();

    $count = $pdo->query("SELECT count(*) FROM article");
    $nbLines = $count->fetchColumn();


    return [
        'data' => $result,
        'nbrLines' => $nbLines,
    ];
}

function idAuthor(PDO $pdo, int $author)
{
    $queryUsername = $pdo->prepare(' SELECT username FROM user WHERE id = :author');
    $queryUsername->bindParam(':author', $author);
    $queryUsername->execute();
    $resultUsername = $queryUsername->fetchAll();

    return $resultUsername;
}

function viewMore(PDO $pdo, int $id)
{
    $query = $pdo->prepare('SELECT * FROM article WHERE id = :id');
    $query->bindParam(':id', $id);
    $query->execute();
    $resultViewmore = $query->fetchAll();

    return $resultViewmore;
}

function deleteArticle(PDO $pdo, int $id)
{
    $removeImages = $pdo->prepare("SELECT image FROM article WHERE id = :id");
    $removeImages->bindParam(':id', $id);
    $removeImages->execute();

    while ($data = $removeImages->fetch()) {
        $image = (string)$data['image'];
    }

    unlink("upload/" . $image);

    $deleteArticle = $pdo->prepare('DELETE FROM article WHERE id = :id');
    $deleteArticle->bindParam(':id', $id);
    $deleteArticle->execute();
}

function viewUserArticle(PDO $pdo, int $id)
{
    $queryUserArticle = $pdo->prepare('SELECT * FROM article WHERE id = :id');
    $queryUserArticle->bindParam(':id', $id);
    $queryUserArticle->execute();
    $userArticle = $queryUserArticle->fetchAll();

    return [
        'data' => $userArticle
    ];
}

function insertComment(PDO $pdo, string $content, string $username)
{
    $insert = $pdo->prepare('INSERT INTO comment (content, username) VALUES (:content, :username)');
    $insert->bindParam(':content', $content);
    $insert->bindParam(':username', $username);
    $insert->execute();
}

function viewComment(PDO $pdo,int $idArticle)
{
    $queryComment = $pdo->prepare('SELECT * FROM comment WHERE article = :idArticle');
    $queryComment->bindParam(':idArticle', $idArticle);
    $queryComment->execute();
    $userArticle = $queryComment->fetchAll();

//    var_dump($userArticle):

    return $userArticle;
}

function updateArticle()
{

}
