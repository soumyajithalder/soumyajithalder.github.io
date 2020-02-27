<?php
    require_once 'vendor/autoload.php';

    $uri=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    //var_dump($uri);
    //include (__DIR__."/View/blog.php");
//    if('/soumyajithalder.github.io/BlogWebsiteMVC/index.php' == $uri){
//        require 'View/blog.php';
//    }

//    if('/soumyajithalder.github.io/BlogWebsiteMVC/index.php' == $uri){
//        require 'View/my_post.php';
//    }

        if (isset($_GET['page'])) {
            $requested_page = $_GET['page'];
        }
        else {
            $requested_page = 'home';
        }
        switch($requested_page) {
            case "login":
                require_once 'Controller/login.php';
                break;
            case "signup":
                require_once 'Controller/signup.php';
                break;
            case "home":
                require_once 'Controller/home.php';
                break;
            case "my_post":
                require_once 'Controller/mypost.php';
                break;
            case "read":
                require_once 'Controller/readpost.php';
                break;
            case "add":
                require_once 'Controller/addpost.php';
                break;
            case "edit":
                require_once 'Controller/editpost.php';
                break;
            case "delete":
                require_once 'Controller/deletepost.php';
                break;
            default:
                include(__DIR__."/404.php");
        }
?>