<?php

    $db = new mysqli('localhost','root','','appsalon');

    if (!$db) {
        echo "Error: No se pudo conectar";
        echo "errno de depuracion: ".mysqli_connect_errno();
        echo "errno de depuracion: ".mysqli_connect_error();
        exit;
    }
