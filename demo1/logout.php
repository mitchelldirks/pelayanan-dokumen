<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    header("Location:http://localhost/pelayanandokumenonlinerw024/");

    
