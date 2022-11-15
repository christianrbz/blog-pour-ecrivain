<?php

// Page d'ACCUEIL qui se met si les autres conditions ne sont pas faites
function home()
{   
    $chapterManager = new ChaptersManager();

    // Compte le nombre de chapitres dans la table
    $nbChapter = $chapterManager->countChapters();
    $nbArt = $nbChapter;
    $perPage = 5;
    $nbPage = ceil($nbArt / $perPage);

    // Conditions pour la pagination : Si il y'a trop de chapitres sur 1 page
    if (isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPage) {
        $cPage = $_GET['p'];
    } else {
        $cPage = 1;
    }

    $perPage2 = (($cPage - 1) * $perPage);

    // Chapitres par page
    $chapters = $chapterManager->getChapterForPagination($perPage2, $perPage);

    ob_start();
    include('view/frontend/indexView.php');
    $content = ob_get_clean();
    require("view/frontend/template.php");
}

// La fonction gere les chapitres et les commentaires en frontend
function chapter()
{

    $chapterManager = new ChaptersManager(); 
    $chapter = $chapterManager->get($_GET['id']); 

    // Si l'id du chapitre n'existe pas => retour page d'accueil 
    if ($chapter == false) {
        header('Location: index.php?action=home');
    }

    // Creer un commentaire ajouté par l'utilisateur
    if (isset($_POST['pseudo']) && isset($_POST['comment']) && !empty($_POST['pseudo']) && !empty($_POST['comment'])) 
    {
        $comment = new Comments([
            $_GET['id'],
            $_POST['pseudo'],
            $_POST['comment'],
        ]);
        $commentChapter = new CommentsManager();
        $commentChapter->addComment($comment);

        $_SESSION['flash']['danger'] = 'Votre commentaire a bien été ajouté' . '<br/>'; 

    }


    $commentChapter = new CommentsManager();
    $commentedChapter = $commentChapter->getChapterComment($_GET['id']);
    

    // Ajout un signalement au commentaire dans la base de donnees
    if (isset($_GET['signaled'])) {
        // $_SESSION['flash']['danger'] = 'Ce commentaire a bien été signalé à l\'administrateur' . '<br/>';  

        $comments = new Comments(['id' => $_GET['idComment']]);

        $commentChapter->signalComment($comments);
        $_SESSION['flash']['danger'] = 'Ce commentaire a bien été signalé à l\'administrateur' . '<br/>';   
       
        // header('Location: index.php?action=chapter&id=' . $_GET['id']);

    }

    // Traitement de variables pour le chapterView
    $chapterId = $chapter->getId();
    $chapterTitle = $chapter->getTitle();
    $chapterContent = $chapter->getContent();
    

    ob_start();
    include('view/frontend/chapterView.php');
    $content = ob_get_clean();
    require("view/frontend/template.php");
}


// La fonction gere la connexion et l'affichage de la page login
function login()
{
    // Connexion à l'espace administrateur selon conditions
    if (!empty($_POST)) {
        $validation = false;
        $profil = new User(['email' => $_POST['email']]);

        $profilAcount = new UserManager();
        
        //Renvoie un User ou false (condition true ou false dans UserManager.php)
        $profilManager = $profilAcount->connectUser($profil); 

        if ($profilManager != false) {
            
            $emailVerify = $profilManager->getEmail();

            // Pour plus de securité le mdp d'origine est cripté en hash
            $hash = $profilManager->getPassword(); 

            // Compare si le mdp cripté est le meme que le mdp tapé par l'utilisateur
            if ($profil = $emailVerify && password_verify($_POST['password'], $hash)) {
                $validation = true;
            } else {
                $validation = false;
            }
           
            if ($validation === true) {
                $_SESSION['user'] = $profilManager->getId();
                $_SESSION['identifiant'] = $profilManager->getIdentifiant();
                $_SESSION['email'] = $profilManager->getEmail();
                $_SESSION['password'] = $profilManager->getPassword();

                header('Location: index.php?action=admin');
                exit();
            } else {
                $_SESSION['flash']['danger'] = "L'identifiant ou le mot de passe est incorrect." . '<br/>';
            }
        }else{
            $_SESSION['flash']['danger'] = "L'identifiant ou le mot de passe est incorrect." . '<br/>';
        }
       
    } 


    ob_start();
    include('view/frontend/loginView.php');  
    $content = ob_get_clean();
    require("view/frontend/template.php");
}


// Affichage de la page biographie de l'auteur 
function biography () {
    ob_start();
    include('view/frontend/biography.php');
    $content = ob_get_clean();
    require("view/frontend/template.php");
}

