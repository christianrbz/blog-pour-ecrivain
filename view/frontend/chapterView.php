       
<section class="chapters_header">
    <h1>Billet simple pour l'Alaska</h1>
    <h2>Jean Forteroche</h2>
</section>

<section class="edit_chapters">      
        <div class="chapters_published">                   
            <h3><?= htmlspecialchars($chapterTitle); ?></h3><br/>
            <?= $chapterContent; ?><br/>
            <hr>

            <p class="comments_publication" id="comm">Commentaires: </p>

             <?php if(isset($_SESSION)) { 
                include('view/flashMessages.php');
                } ?>

            <?php foreach ($commentedChapter as $cle => $elements) { ?>
                
                <p>[ <?= $elements['date_comment'] ?> ] Par <?= htmlspecialchars($elements['pseudo']) ?> (<a href="index.php?action=chapter&id=<?= $chapterId ?>&idComment=<?= $elements['id'] ?>&signaled#comm" class="signal">Signaler</a>): </p><br/> 
                <p class="comment_published"><?= htmlspecialchars($elements['comment']) ?><br />                                       
                <?php if (isset($_SESSION) AND isset($_GET['signaled']) AND $elements['signaled'] == 1)  {; 
                    } ?>   
                    
                <?php }    ?> 
               
        </div>

<div class="comments">
    <h4>Commentaires</h4>
    <form class="comments_form" action="index.php?action=chapter&id=<?= $_GET['id'] ?>#comm" method="post">
        <input class="pseudo" type="text" name="pseudo" placeholder="Pseudo" id="pseudo"><br/>
        <textarea class="comment" name="comment" placeholder="Votre commentaire" id="comment" cols="30" rows="10"></textarea><br/>
        <input class="submit" type="submit" name="submit" id="submit"><br/>
    </form>                
</div>

</section>