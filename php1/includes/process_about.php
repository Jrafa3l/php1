<?php
    require_once("connect.php");

    if(isset($_POST["txtContent"]))
    {
        $title = htmlspecialchars(trim($_POST["txtTitle"]));
        $content = htmlspecialchars(trim($_POST["txtContent"]));

        $title = filter_var($title, FILTER_SANITIZE_URL);
        $content = filter_var($content, FILTER_SANITIZE_URL);
        
        echo "{$title} - {$content}";

        try {
            $sql = "INSERT INTO aboutus (atitle, acontent) VALUES(?, ?)";
            $data = array($title, $content);
            $stmt = $con->prepare($sql);
            $stmt->execute($data);
            header("location: ../aboutus.php");
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    else
    {
        if(isset($_GET['delid']))
        {
            $delSql = "DELETE FROM aboutus WHERE aboutid=?";
            $data=array($_GET['delid']);

            try {
                $stmtDel = $con->prepare($delSql);
                $stmtDel->execute($data);
                header("location: ../aboutus.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }
?>