<?php
    if(isset($_GET['views'])){
        $whiteList = ["home"];
        $page = explode("/", $_GET['views']);
        if(in_array($page[0], $whiteList)){
            require_once('./controllers/'.$page[0].'.controller.php');
        }else{
            require_once('./controllers/home.controller.php');
        }
    }else{
        require_once('./controllers/home.controller.php');
    }