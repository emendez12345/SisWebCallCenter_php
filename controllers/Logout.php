<?php
    include 'Session_Controller.php';

    $session_Controller = new Session_Controller();
    $session_Controller->CloseSession();
    header("Location: ../Index.php");