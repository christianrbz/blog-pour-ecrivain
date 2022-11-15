<?php

class ChaptersManager extends Manager
{
   public function get($id) 
    {
        $req = $this->_db->prepare('SELECT * FROM chapters WHERE id = ?');
        $req->execute([$id]);
        $chapter = $req->fetch(); 
        
        if ($chapter){
        return new Chapters($chapter);  
    } else {
        return false;
        }
    }

    public function getList()
    {
        $list = [];

        $req = $this->_db->prepare('SELECT * FROM chapters ORDER BY id');
        $data = $req->execute();
        
        $data = $req->fetchAll();
   
        return $data;
    }

    public function addChapter(Chapters $chapter) 
    {
        $req = $this->_db->prepare('INSERT INTO chapters (title, content) VALUES ( ?, ?)');
        $req->execute([
            $chapter->getTitle(),
            $chapter->getContent(),
        ]);
    }

    public function updateChapter(Chapters $chapter)
    {
        $req_modif = $this->_db->prepare('UPDATE chapters SET title = :title, content = :content  WHERE id = :id');
        $req_modif->execute([
            'id' => $chapter->getId(),
            'title'  => $chapter->getTitle(),
            'content' => $chapter->getContent()     
        ]);
    }

    public function deleteChapter($chapterDelete)
    {
        $req_delete = $this->_db->prepare('DELETE FROM chapters WHERE id= :id');
        $req_delete->execute(['id' => $chapterDelete->getId()], );

    }

    public function countChapters()
    {
        $req = $this->_db->prepare('SELECT COUNT(id) as nbArt FROM chapters');
        $req->execute();
        $data = $req->fetch();

        return $data['nbArt'];
    }

    public function getChapterForPagination($perPage2, $perPage)
    {
        $list = [];

        $req = $this->_db->prepare('SELECT * FROM chapters LIMIT '.$perPage2.', '.$perPage.'');
        $req->execute();

        $data = $req->fetchAll();
    
        
        return $data;
    }
}