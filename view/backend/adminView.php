<section class="header_admin">
        <h1>Bonjour <?= $_SESSION['identifiant'] ?>,<br/> bienvenue dans votre espace</h1>
    </section>
    
        <div class="navigation_title">
            <a class="chapters_link_title" href="index.php?action=admin_chapters">Ecrire un nouveau chapitre</a>
            <a class="comments_link_title" href="index.php?action=admin_comments">Gérer les commentaires</a>
            <a class="comments_link_title" href="index.php?action=admin_chapters#editChapters_backend">Editer ou supprimer un chapitre</a>
        </div>
</section>