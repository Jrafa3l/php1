<?php
    $host = "localhost";
    $database = "dbbuaron";
    $user = "root";
    $password = "";
    $dsn = "mysql:host={$host};dbname={$database};";

    try
    {
        $con = new PDO($dsn, $user, $password);
        // if ($con) echo "Successfully connected to database.";
    }
    catch (PDOException $th)
    {
        echo $th->getMessage();
    }
?>