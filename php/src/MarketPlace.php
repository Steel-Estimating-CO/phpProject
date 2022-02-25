<?php
    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT  FROM Listings");
    $stmt->execute();
   // $stmt->bind_result($);
    $stmt->store_result();
    $numRows = $stmt->num_rows;
?>
