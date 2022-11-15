
<header class="index_header">
    <ul>
    <li><a href="index.php?action=home">Accueil</a></li>
    <li><a href="index.php?action=logout">Déconnexion</a></li>
    <ul>
</header>

<section class="header_admin">
    <a class="nav_home_comments" href="index.php?action=admin">Admin</a>
    <a class="nav_chapters" href="index.php?action=admin_chapters">Chapitres</a>
</section>

<section class="header_admin">
    <h1>Gérer les commentaires</h1>
</section>

<section class="admin_comments">
    <div class="show_all_comments">
        <h2>Tous les commentaires</h2>
        <!-- Message de succès quand le commentaire a été supprimé -->
         <?php if(isset($_SESSION)) { 
            include('view/flashMessages.php');
        } ?>
        
        <?php if (!empty($comment))
            { foreach ($comment as $cle => $elements)
                { ?>
                    <p class="title_ref"><?= htmlspecialchars($elements['title']) ?></p><br>
                    <p>[ <?= $elements['date_comment'] ?> ] Par : <?= htmlspecialchars($elements['pseudo']) ?></p><br>
                    <p class="show_comment"><?= htmlspecialchars($elements['comment']) ?></p><br>
                    <a href="index.php?action=admin_comments&id=<?= $elements['id'] ?>&delete">Supprimer le commentaire <i class="fas fa-times"></i></a><br>

                    <hr class="inser_comment"><br>
                <?php }
            } ?>
    </div>
    
    <div class="comments_signal">
        <h2>Commentaires signalés</h2>
        
        <?php if (!empty($commentSignaled))
            { foreach ($commentSignaled as $cle => $elements)
                { ?>
            <p class="title_ref"><?= htmlspecialchars($elements['title']) ?></p><br>
            <p>[ <?= $elements['date_comment'] ?> ] Par <?= htmlspecialchars($elements['pseudo']) ?>:
            </p><br/>
            <p class="show_comment"><?= htmlspecialchars($elements['comment']) ?><br>

            <p> Nombre de signalement : <?= $elements['signaled'] ?></p><br>

            <a href="index.php?action=admin_comments&id=<?= $elements['id'] ?>&deleteSignal"> Enlever les signalements <i class="fas fa-minus-square"></i></a><br/>
            <a href="index.php?action=admin_comments&id=<?= $elements['id'] ?>&delete">Supprimer le commentaire <i class="fas fa-times"></i></a><br>

            <hr class="inser_comment">
            <?php } 
        } ?>
    </div>

</section>