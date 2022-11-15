<?php 

class CommentsManager extends Manager
{
    public function getList() 
    {
        $list = [];

        $req = $this->_db->prepare('SELECT id_chapter, pseudo, comment, date_comment FROM comments ORDER BY date_comment DESC');
        $req->execute();

        $req_join = $this->_db->prepare('SELECT * FROM chapters, comments WHERE chapters.id=comments.id_chapter ORDER BY date_comment DESC');
        $req_join->execute();

        $data = $req->fetchAll();        
        $data = $req_join->fetchAll();           
  
      return $data;
    }

    public function addComment($comment)
    {
        $req = $this->_db->prepare('INSERT INTO comments (id_chapter, pseudo, comment, date_comment, signaled) VALUES (?, ?, ?, NOW(), 0)');
        $req->execute([
            $_GET['id'], 
            $_POST['pseudo'],
            $_POST['comment']
        ]); 
    }

    public function signalComment($comments)
    {
        $req_signal = $this->_db->prepare('UPDATE comments SET signaled =signaled+1 WHERE id = :idChapter');
        $req_signal->execute(['idChapter' => $comments->getId()]);
    } 

    public function deleteSignal($comments)
    {
        $req_signal = $this->_db->prepare('UPDATE comments SET signaled = 0 WHERE id = :idChapter');
        $req_signal->execute(['idChapter' => $comments->getId()]);
    } 


    public function deleteComment($commentsDelete)
    {
        $req_delete = $this->_db->prepare('DELETE FROM comments WHERE id = :id');
        $req_delete->execute(['id' => $commentsDelete->getId()]);
    }


    // Afficher la liste des signalements de commentaires
    public function getListSignaled()
    {
        $list = [];

        $req = $this->_db->prepare('SELECT id_chapter, pseudo, comment, date_comment FROM comments WHERE signaled >= 1 ORDER BY date_comment DESC');
        $req->execute();

        $req_join = $this->_db->prepare('SELECT * FROM chapters, comments WHERE chapters.id=comments.id_chapter AND signaled >= 1 ORDER BY date_comment DESC');
        $req_join->execute();

        $data = $req->fetchAll();        
        
        $data = $req_join->fetchAll();           
         
        return $data;
    }

    public function getChapterComment()
    {
        $list = [];

        $req = $this->_db->prepare('SELECT id, pseudo, comment, date_comment, signaled FROM comments WHERE id_chapter= ? ORDER BY date_comment DESC LIMIT 0, 5');
        $req->execute(array($_GET['id']));
        $data = $req->fetchAll();

        
        return $data;
    }
}