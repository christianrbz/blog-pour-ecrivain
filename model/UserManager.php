<?php

class UserManager extends Manager
{
    
    public function connectUser(User $profil)
    {
        $req = $this->_db->prepare('SELECT * FROM user WHERE email= :email');
        $req->execute(['email' => $profil->getEmail()]);
        $data = $req->fetch();
        
        if ($data) {
            return new User($data);    
        } else {
            return false;
        }
    }

}