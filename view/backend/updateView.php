<section class="header_admin">
    <a class="nav_home_update" href="index.php?action=admin">Admin</a>
    <a class="nav_chapters" href="index.php?action=admin_chapters">Chapitres</a>
</section>
<section class="header_admin">
	<h1>Modifier un chapitre</h1>
</section>

<section class="change_chapter">
    <form class="chapter_form_update" action="index.php?action=update&id=<?= $_GET['id'] ?>" method="post">

        <input class="title" type="text" name="title" placeholder="Titre du chapitre" id="title" value="<?= $chapterTitleUpdate ?>"><br/>
        <textarea class="chapter" id="mytextarea" name="content" id="content" cols="30" rows="10" ><?= $chapterContentUpdate ?></textarea><br/>
        <input class="submit" type="submit" name="published" placeholder="Publier" id="published"><br/> 
    </form>  
</section>