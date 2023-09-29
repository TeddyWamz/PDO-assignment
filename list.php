<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Users list</title>
</head>

<?php

require_once 'const/dbconn.php';

try {
    
    $dbConnection = new dbconn();
    $conn = $dbConnection->connect();

    
    $sql = "SELECT firstname, secondname, email, username FROM entries";

   
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    
    $enlistedUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
    if (count($enlistedUsers) > 0) {
        echo "<h2>List of Users:</h2>";
        echo "<table class='tab' border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Username</th></tr>";

        $rowNumber = 1;

        foreach ($enlistedUsers as $user) {
            echo "<tr>";
            echo "<td class = 'row-number'>" . $rowNumber . "</td>";
            echo "<td>" . $user['firstname'] . " " . $user['secondname'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['username'] . "</td>";
            echo "</tr>";

            $rowNumber++;
        }
        echo "</table>";
    } else {
        echo "No one has enlisted yet.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
