<?php
    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT userID, Type, Description, Claimed FROM Listings");
    $stmt->execute();
    $stmt->bind_result($userID, $Type, $Description, $Claimed);
    $stmt->store_result();
?>

