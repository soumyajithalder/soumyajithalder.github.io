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
                require 'View/login_view.php';
                break;
            case "signup":
                require 'View/signup_view.php';
                break;
            case "home":
                require 'View/blog.php';
                break;
            case "my_post":
                require 'View/my_post.php';
                break;
            case "read":
                require 'View/read_post.php';
                break;
            case "add":
                require 'View/add_post.php';
                break;
            case "edit":
                require 'View/edit_post.php';
                break;
            case "delete":
                require 'Controller/deletepost.php';
                break;
            default:
                include(__DIR__."/404.php");
        }
?>