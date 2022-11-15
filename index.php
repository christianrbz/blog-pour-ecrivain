<?php


session_start();


require("model/Manager.php");
require("model/ChaptersManager.php");
require("model/CommentsManager.php");
require("model/UserManager.php");

require("class/User.php");
require("class/Chapters.php");
require("class/Comments.php");


require("controller/controllerFront.php");
require("controller/controllerAdmin.php");

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        home();
    } elseif ($_GET['action'] == 'chapter') {
        chapter();
    } elseif ($_GET['action'] == 'biography') {
        biography();
    } elseif ($_GET['action'] == 'login') {
        login();
    } elseif ($_GET['action'] == 'admin') {
        admin(); 
    } elseif ($_GET['action'] == 'admin_chapters') {
        admin_chapters();
    } elseif ($_GET['action'] == 'admin_comments') {
        admin_comments();
    } elseif ($_GET['action'] == 'logout') {
        logout();
    } elseif ($_GET['action'] == 'update') {
        update();
    }else{
        home();
    }
} else {
    home();
}
      
