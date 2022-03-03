<?php

/**
 * Public's Menu 
 */
$sections = theSectionSelectAllNav($db);

/**
 * Public Connexion
 */


if (isset($_GET['connect'])) {
    if (isset($_POST["theuserLogin"]) && isset($_POST["theuserPwd"])) {
        if (connectionVerify($_POST["theuserLogin"], $_POST["theuserPwd"], ADMIN_LOG, ADMIN_PWD)) {
            header("Location: ./");
        } else {
            $error = "Mot de passe ou login invalid!";
            require_once "../view/publicView/publicConnectView.php";
        }
    } else {
        require_once "../view/publicView/publicConnectView.php";
    }

    /**
     * publicDetailArticle
     * 
     */
} elseif (isset($_GET['idarticle'])) {
    require_once "../view/publicView/publicDetailArticle.php";

    /**
     * Author
     * 
     */
} elseif (isset($_GET['idauteur'])) {
    $id = (int) $_GET['idauteur'];
    $articles = thearticleSelectAllByIduser($db, $id, 200);

    require_once "../view/publicView/publicDetailAuteurView.php";



    /**
     * Public Homepage
     */
} elseif (isset($_GET['idsection'])) {
    $sectionSelected = thesectionSelectOneById($db, $_GET['idsection']);
    $articleForSection = thearticleSelectAllByIdthesection($db, $_GET['idsection']);
    require_once "../view/publicView/publicDetailSection.php";
} else {
    $articles = thearticleSelectAll($db);
    require_once "../view/publicView/publicHomepageView.php";
}
