<?php
    require_once("./core/core.php");
    // RECIVE LAS PETICIONES AJAX ENVIADAS DESDE JAVASCRIPT Y SE LAS ENVIA AL CONTROLADOR
    $seleccion = isset($_GET['go'])? $_GET['go']: null;
    switch($seleccion){
      case 'home':
        require 'controllers/home.controller.php';
        break;
    }