<?php

function getChats($conn){
    $sql = "SELECT * FROM messages
            ORDER BY date_publication ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        return $stmt->fetchAll();
    } else {
        return [];
    }
}

?>
