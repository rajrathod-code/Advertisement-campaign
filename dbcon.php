<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db ="test";

    $con = new PDO("mysql:host=$server;dbname=$db",$user,$password);
    if(!$con)
    {
        ?>
        <script>
            alert("Database is not Connected!!!");
        </script>
        <?php
    }
?>